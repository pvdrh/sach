<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Publishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use mysql_xdevapi\Exception;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $product = new Product();
        if ($user->can('create', $product)) {
            $categories = Category::get();
            $authors = Author::get();
            $publishings = Publishing::get();
            return view('backend.products.create')->with([
                'categories' => $categories,
                'authors' => $authors,
                'publishings' => $publishings
            ]);
        } else {
            return view('backend.includes.incompetent');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->author_id = $request->get('author_id');
        $product->publishing_company_id = $request->get('publishing_company_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        if ($request->get('discount_percent')) $product->discount_percent = $request->get('discount_percent');
        else $product->discount_percent = 0;
        $product->content = $request->get('content');
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $path = Storage::disk('public')->putFileAs('images', $image, $image->getClientOriginalName());
            $product->image = $path;
        }
        $product->status = $request->get('status');
        $product->pages_count = '0';
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $product->save();
        if ($request->hasFile('images')){
            $files = $request->file('images');
            foreach ($files as $file) {
                $path = Storage::disk('public')
                    ->putFileAs('images', $file, $file->getClientOriginalName());
                $image = new Image();
                $image->name = $file->getClientOriginalName();
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            }
        }
        Alert::success('Tạo mới thành công!', 'Sản phẩm đã được thêm vào hệ thống!');
        return redirect()->route('backend.product.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        if ($user->can('view', $product)) {
            return view('backend.products.detail')->with([
                'product' => $product
            ]);
        } else {
            return view('backend.includes.incompetent');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $user = Auth::user();
        if ($user->can('update', $product)) {
            $categories = Category::get();
            $authors = Author::get();
            $publishings = Publishing::get();
            return view('backend.products.edit')->with([
                'product' => $product,
                'categories' => $categories,
                'authors' => $authors,
                'publishings' => $publishings
            ]);
        } else {
            return view('backend.includes.incompetent');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->author_id = $request->get('author_id');
        $product->publishing_company_id = $request->get('publishing_company_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->discount_percent = $request->get('discount_percent');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->pages_count = '0';
        $product->status = $request->get('status');
        $product->save();
        $publishing = Publishing::find($request->get('publishing_company_id'));
        $publishing->products_count += 1;
        dd($publishing);
        $publishing->save();
        $author = Author::find($request->get('author_id'));
        $author->products_count += 1;
        $author->save();
        Alert::success('Thành công!', 'Sản phẩm đã được cập nhật');
        return redirect()->route('backend.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        if ($user->can('delete', $product)) {
            try {
                $success = $product->delete();
                if ($success) {
                    return response()->json([
                        'error'=>false,
                        'message'=>"Gỡ sản phẩm thành công!",
                    ]);
                }
            } catch (\Exception $exception) {
                $message = "Không thành công!";
                return response()->json([
                    'error'=>true,
                    'message'=>$exception->getMessage(),
                ]);
            }
        } else {
            return view('backend.includes.incompetent');
        }
    }

    public function hardDelete($id)
    {
        $user = Auth::user();
        $product = Product::onlyTrashed()->find($id);;
        if ($user->can('delete', $product)) {
            $product->forceDelete();
            return back();
        } else {
            Alert::error('Thất bại!', 'Bạn không có quyền thực hiện thao tác này!');
            return back();
        }
    }

    public function onlyTrashed()
    {
        $products = Product::onlyTrashed()->get();
        return view('backend.products.onlyTrashed')->with([
            'products' => $products
        ]);
    }

    public function restore($id)
    {
        $products = Product::withTrashed()->find($id)->restore();
        return back();
    }


    public function getData()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return DataTables::of($products)
            ->editColumn('category_id', function ($product) {
                return $product->category->name;
            })
            ->editColumn('image', function ($product) {
                return '<center><img src="/' .  $product->image . '" style="width: 150px"></center>';
            })
            ->editColumn('name', function ($product) {
                return '<a href="http://thanhdev.com:8080/product-page/' . $product->slug . '">' . $product->name . '</a>';
            })
            ->addColumn('action', function ($product) {
                return '<a href="http://thanhdev.com:8080/admin/products/'. $product->id .'/show" class="btn btn-primary">Chi tiêt</a>
                        <a href="http://thanhdev.com:8080/admin/products/'. $product->id .'/edit" class="btn btn-warning">Sửa</a>
                        <button class="btn btn-danger btn-delete" data-id="'. $product->id . '">Gỡ</button>';
            })
//            ->addIndexColumn()
            ->rawColumns(['action', 'image', 'category_id', 'name'])
            ->make(true);
    }
}
