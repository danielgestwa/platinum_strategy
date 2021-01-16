<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Auth;

class ProductController extends Controller
{
    /**
     * Products (Expenses) for User
     */

    /**
     * Show all user products
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'product.index', 
            ['products' => Auth::user()->products()->orderBy('bought_at', 'desc')->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create', ['categories' => Auth::user()->categories()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'comment' => 'max:255',
            'bought_at' => 'required|date'
        ]);

        $productData['user_id'] = Auth::user()->id;
        Product::create($productData);

        return redirect('products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Auth::user()->products()->where('id', $id)->firstOrFail();
        return view(
            'product.create', 
            [
                'productValue' => $product,
                'categories' => Auth::user()->categories()->get()
            ]
        );
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
        $productData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'comment' => 'max:255',
            'bought_at' => 'required|date'
        ]);
        $product = Auth::user()->products()->findOrFail($id);
        $product->update($productData);
        
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Auth::user()->products()->findOrFail($id);
        $product->delete();

        return redirect('products');
    }
}
