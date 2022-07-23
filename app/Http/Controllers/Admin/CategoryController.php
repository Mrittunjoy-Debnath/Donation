<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('admin.category.addcategory');
    }
    public function saveCategory(Request $request)
    {
        $this->validate($request,[
            'category_name' => 'required',
            'category_description' => 'required',
            'publication_status' => 'required',

        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();

        // $category->create($request->all());
        // return view('admin.category.addcategory');
        return redirect()->route('add-category')->with('success','Category info save successfully');
    }

    public function manageCategory()
    {
        $categories = Category::all();

        return view('admin.category.managecategory',[
            'categories' => $categories
        ]);
    }

    public function publishedCategory($id)
    {
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();

        return redirect()->back()->with('success','Category published successfully');
    }

    public function unpublishedCategory($id)
    {
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();

        return redirect()->back()->with('success','Category unpublished successfully');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);

        return view('admin.category.editcategory',[
            'category' => $category
        ]);
    }

    public function updateCategory(Request $request,$id)
    {
        $this->validate($request,[
            'category_name' => 'required',
            'category_description' => 'required',
            'publication_status' => 'required',

        ]);

        $category = Category::find($id);

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();

        return redirect()->route('manage-category')->with('success','Category edited info save successfully');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('manage-category')->with('success','Category  delete successfully');
    }
}
