<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order();
        $order->user_id = 0;
        $order->customer_name = $request->name;
        $order->customer_email = $request->email;
        $order->customer_phone = $request->phone;
        $order->customer_address = $request->address;
        $order->shipping = $request->shipping;
        $order->pay = $request->payments;
        $order->products_count = Cart::count();
        $order->money = intval(Cart::total());
        $order->status = 1;
        $order->save();
        $order_product = Order::find($order->id);
        foreach (Cart::content() as $item) {
            $order_product->products()->attach($item->id);
            $product = Product::find($item->id);
            $product->sold += $item->qty;
            $product->save();
        }
        Cart::destroy();
        alert()->success('Đặt hàng thành công!', 'Đơn hàng của bạn sẽ được giao trong thời gian sớm nhất');
        return redirect()->route('frontend.home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        return view('backend.orders.detail')->with([
            'order' => $order,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        try {
            $success = $order->delete();
            if ($success) {
                return response()->json([
                    'error'=>false,
                    'message'=>"Xóa nhận thành công!",
                ]);
            }
        } catch (\Exception $exception) {
            $message = "Không thành công!";
            return response()->json([
                'error'=>true,
                'message'=>$exception->getMessage(),
            ]);
        }
    }

    public function getData()
    {
        $orders = Order::where('status', 2)->get();
        return DataTables::of($orders)
            ->addColumn('shipping', function ($order) {
                if ($order->shipping == 'shipping1') return 'Free ship';
                elseif ($order->shipping == 'shipping2') return 'Giao hàng nhanh';
            })
            ->addColumn('money', function ($order) {
                return $order->money . ',000đ';
            })
            ->addColumn('action', function ($order) {
                return '<a href="http://thanhdev.com:8080/orders/'. $order->id .'/show" class="btn btn-primary">Chi tiêt</a>
                        <button class="btn btn-danger order-delete" data-id="'. $order->id . '">Xóa</button>
                        <button class="btn btn-success order-success" data-id="'. $order->id . '">Đã giao</button>';
            })
            ->rawColumns(['shipping', 'money', 'action'])
            ->make(true);

    }

    public function nonAcceptList()
    {
        return view('backend.orders.nonAccept');
    }

    public function successList()
    {
        return view('backend.orders.success');
    }

    public function nonAccept()
    {
        $orders = Order::where('status', 1)->get();
        return DataTables::of($orders)
            ->addColumn('shipping', function ($order) {
                if ($order->shipping == 'shipping1') return 'Free ship';
                elseif ($order->shipping == 'shipping2') return 'Giao hàng nhanh';
            })
            ->addColumn('money', function ($order) {
                return $order->money . ',000đ';
            })
            ->addColumn('action', function ($order) {
                return '<a href="http://thanhdev.com:8080/orders/'. $order->id .'/show" class="btn btn-primary">Chi tiêt</a>
                        <button class="btn btn-success order-accept" data-id="'. $order->id .'">Xác nhận</button>
                        <button class="btn btn-danger order-delete" data-id="'. $order->id . '">Xóa</button>';
            })
            ->rawColumns(['shipping', 'money', 'action'])
            ->make(true);
    }

    public function getSuccess()
    {
        $orders = Order::where('status', 3)->get();
        return DataTables::of($orders)
            ->addColumn('shipping', function ($order) {
                if ($order->shipping == 'shipping1') return 'Free ship';
                elseif ($order->shipping == 'shipping2') return 'Giao hàng nhanh';
            })
            ->addColumn('money', function ($order) {
                return $order->money . ',000đ';
            })
            ->addColumn('action', function ($order) {
                return '<a href="http://thanhdev.com:8080/orders/'. $order->id .'/show" class="btn btn-primary">Chi tiêt</a>';
            })
            ->rawColumns(['shipping', 'money', 'action'])
            ->make(true);

    }

    public function accept($id)
    {
        $order = Order::find($id);
        try {
            $order->status = 2;
            $order->user_id = Auth::user()->id;
            $success = $order->save();
            if ($success) {
                return response()->json([
                    'error'=>false,
                    'message'=>"Xác nhận thành công!",
                ]);
            }
        } catch (\Exception $exception) {
            $message = "Không thành công!";
            return response()->json([
                'error'=>true,
                'message'=>$exception->getMessage(),
            ]);
        }
    }

    public function success($id)
    {
        $order = Order::find($id);
        try {
            $order->status = 3;
            $success = $order->save();
            if ($success) {
                return response()->json([
                    'error'=>false,
                    'message'=>"Xác nhận thành công!",
                ]);
            }
        } catch (\Exception $exception) {
            $message = "Không thành công!";
            return response()->json([
                'error'=>true,
                'message'=>$exception->getMessage(),
            ]);
        }
    }
}
