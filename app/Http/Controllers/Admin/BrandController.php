<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand()
    {

        return view('admin.brand.addbrand');
    }
    public function saveBrand(Request $request)
    {
        $this->validate($request,[
            'brand_name' => 'required',
            'brand_description' => 'required',
            'publication_status' => 'required',

        ]);
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect()->route('add-brand')->with('success','Brand added successfully');
    }

    public function manageBrand()
    {
        $brands = Brand::all();

        return view('admin.brand.managebrand',[
            'brands'=>$brands,
        ]);
    }

    public function publishedBrand($id)
    {
        $brand = Brand::find($id);
        $brand->publication_status = 1;
        $brand->save();

        return redirect()->back()->with('success','Brand published successfully');
    }

    public function unpublishedBrand($id)
    {
        $brand = Brand::find($id);
        $brand->publication_status = 0;
        $brand->save();

        return redirect()->back()->with('success','Brand unpublished successfully');
    }

    public function editBrand($id)
    {

        $brand = Brand::find($id);

        return view('admin.brand.editbrand',[
            'brand' => $brand
        ]);
    }

    public function updateBrand(Request $request,$id)
    {
        $this->validate($request,[
            'brand_name' => 'required',
            'brand_description' => 'required',
            'publication_status' => 'required',

        ]);
        $brand = Brand::find($id);

        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();

        return redirect()->route('manage-brand')->with('success','Brand edited info save successfully');
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->route('manage-brand')->with('success','Brand  delete successfully');
    }
}
