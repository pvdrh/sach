<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::content();
        return view('frontend.cart.list')->with([
            'items' => $items
        ]);
    }
    public function add($id)
    {
        $product = Product::find($id);
        Cart::add($product->id, $product->name, 1, $product->sale_price, 0, [
            'image' => $product->image,
            'discount_percent' => $product->discount_percent,
            'origin_price' => $product->origin_price
        ]);
        return redirect()->route('frontend.cart.index');
    }

    public function update(Request $data, $id)
    {
        try {
            $success =  Cart::update($id, $data->qty);
            if ($success) {
                return response()->json([
                    'error'=>false,
                    'message'=>"Cập nhật thành công!",
                ]);
            }
        }catch (\Exception $exception){
            $message = "Cập nhật không thành công";
            return response()->json([
            'error'=>true,
            'message'=>$exception->getMessage(),
            ]);
        }
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('frontend.cart.index');
    }

    public function checkout()
    {
        $items = Cart::content();
        return view('frontend.checkout')->with([
            'items' => $items
        ]);
    }
}
