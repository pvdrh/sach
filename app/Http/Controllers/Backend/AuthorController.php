<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use phpDocumentor\Reflection\DocBlock\Tags\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::simplePaginate(15);
        return view('backend.authors.index')->with([
           'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $author = new Author();
        if ($user->can('create', $author)) return view('backend.authors.create');
        else return view('backend.includes.incompetent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = new Author();
        $author->name = $request->name;
        $author->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $author->products_count = 0;
        $author->save();
        return redirect()->route('backend.authors.index');
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
        $author = Author::find($id);
        return view('backend.authors.edit')->with([
            'author' => $author
        ]);
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
        $user = Auth::user();
        $author = Author::find($id);
        if ($user->can('delete', $author)) $author->delete();
        return back();
    }

    public function showProducts($author_id)
    {
        $author = Author::find($author_id);
        dd($author);
        $products = $author->products()->get();
        foreach ($products as $product) {
            echo $product . '<br>';
        }
    }
}
