<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Categories. Each Product (Expense) belongs to a Category
     */

    /**
     * Show list of categories
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'category.index', 
            ['categories' => Auth::user()->categories()->orderBy('id', 'desc')->get()]
        );
    }

    /**
     * Show the form for creating new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryData = $request->validate([
            'name' => [
                'required',
                'max:100',
                Rule::unique('categories', 'name')->where(function ($query) {
                    $query->where('user_id', Auth::user()->id);
                }),
            ]
        ]);

        $categoryData['user_id'] = Auth::user()->id;
        $category = Category::create($categoryData);
        return redirect('categories');
    }

    /**
     * Show the form for editing the specified cateogry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Auth::user()->categories()->where('id', $id)->firstOrFail();
        return view('category.create', ['categoryValue' => $category]);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoryData = $request->validate([
            'name' => [
                'required',
                'max:100',
                Rule::unique('categories', 'name')->ignore($id)->where(function ($query) {
                    $query->where('user_id', Auth::user()->id);
                })
            ]
        ]);
        $category = Auth::user()->categories()->findOrFail($id);
        $category->update($categoryData);
        
        return redirect('categories');
    }

    /**
     * Remove the specified category from storage.
     * Category could be only deleted if is not connected to any product
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Auth::user()->categories()->findOrFail($id);
        if($category->products->isEmpty()) {
            $category->delete();
        }

        return redirect('categories');
    }
}
