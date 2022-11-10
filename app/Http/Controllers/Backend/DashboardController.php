<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_users = Cache::remember('count_users', 60*60, function () {
           $count_users = User::count();
           return $count_users;
        });
        $count_products = Cache::remember('count_products', 60*60, function () {
           $count_products = Product::count();
           return $count_products;
        });
        $count_orders = Cache::remember('count_orders', 60*60, function () {
            $count_orders = Order::count();
            return $count_orders;
        });
        $orders = Order::all();
        $money = 0;
        foreach ($orders as $order) {
            $money += $order->money;
        }
        return view('backend.dashboard')->with([
            'count_users' => $count_users,
            'count_products' => $count_products,
            'count_orders' => $count_orders,
            'money' => $money
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function test()
    {
//        Storage::disk('public')->put('file.txt', 'Contents');
//        Storage::disk('local2')->put('file.txt', 'Contents');
//        $contents = Storage::get('file.txt');
//        $exists = Storage::disk('local')->exists('file.txt');
//        return Storage::download('file.txt');
//        $url = Storage::disk('public')->url('file.txt');
//        Storage::copy('file.txt', 'new/file1.txt');
//        Storage::move('file3.txt', 'new/file2.txt');
        Storage::delete(['new/file1.txt', 'new/file2.txt']);
//        dd($url);
    }

    public function incompetent() {
        return view('backend.includes.incompetent');
    }
}
