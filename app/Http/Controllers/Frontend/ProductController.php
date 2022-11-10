<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        return view('frontend.products')->with([
            'products' => $products
        ]);
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
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.productpage')->with([
            'product' => $product
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
        //
    }

    public function author($id)
    {
        $products = Product::where('author_id', $id)->paginate(12);
        return view('frontend.products')->with([
            'products' => $products
        ]);
    }

    public function category($id)
    {
        $products = Product::where('category_id', $id)->paginate(12);
        return view('frontend.products')->with([
            'products' => $products
        ]);
    }

    public function hot()
    {
        $products = Product::orderBy('sold', 'DESC')->paginate(12);
        return view('frontend.products')->with([
            'products' => $products
        ]);
    }

    public function sale()
    {
        $products = Product::where('discount_percent', '>', 0)->orderBy('sold', 'DESC')->paginate(12);
        return view('frontend.products')->with([
            'products' => $products
        ]);
    }

    public function new()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        return view('frontend.products')->with([
            'products' => $products
        ]);
    }

    public function publishing($id)
    {
        $products = Product::where('publishing_company_id', $id)->orderBy('sold', 'DESC')->paginate(12);
        return view('frontend.products')->with([
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {
        return redirect()->route('frontend.product.result', $request->search);
    }

    public function result($key)
    {
        $products = Product::where('name', 'LIKE', '%' . $key . '%')->orderBy('sold', 'DESC')->paginate(12);
        return view('frontend.products')->with([
            'products' => $products
        ]);
    }
}
