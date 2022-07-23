<?php

namespace App\Http\Controllers\Admin;

use App\House;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class HouseController extends Controller
{
    public function index(){
        return view('admin.service.house.addhouse');
    }

    public function saveHouse(Request $request)
    {
        $this->validate($request,[

            'house_name' => 'required',
            'long_description' => 'required',
            'house_image' => 'required',
            'publication_status' => 'required',

        ]);

        $about = new House();

        $image = $request->file('house_image');
        $slug = Str::slug($request->house_image);
        if (isset($image))
        {
            //            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            //            check category dir is exists
            if (!Storage::disk('public')->exists('img'))
            {
                Storage::disk('public')->makeDirectory('img');
            }
            $category = Image::make($image)->resize(400,400)->save($imagename);
            Storage::disk('public')->put('img/'.$imagename,$category);

            // if (!Storage::disk('public')->exists('about/slider'))
            // {
            //     Storage::disk('public')->makeDirectory('about/slider');
            // }
            // //            resize image for category slider and upload
            // $slider = Image::make($image)->resize(1600,791)->save($imagename);
            // Storage::disk('public')->put('about/slider/'.$imagename,$slider);
        }
        else {
            $imagename = "default.png";
        }


        $about->name = $request->house_name;
        $about->long_description = $request->long_description;
        $about->publication_status = $request->publication_status;
        $about->house_image = $imagename;
        $about->save();
        return redirect()->route('house-us')->with('success','House added successfully');
    }

    public function manageHouse()
    {
        $house = House::all();
        return view('admin.service.house.managehouse',[
            'house' => $house,
        ]);
    }

    public function publishedHouse($id)
    {
        $house = House::find($id);
        $house->publication_status = 1;
        $house->save();

        return redirect()->back()->with('success','House published successfully');
    }

    public function unpublishedHouse($id)
    {
        $house = House::find($id);
        $house->publication_status = 0;
        $house->save();

        return redirect()->back()->with('success','House unpublished successfully');
    }

    public function editHouse($id)
    {

        $house = House::find($id);

        return view('admin.service.house.edithouse',[
            'house' => $house,
        ]);
    }

    public function updateHouse(Request $request,$id)
    {
        $this->validate($request,[
            'house_name' => 'required',
            'long_description' => 'required',
//            'about_image' => 'required',
            'publication_status' => 'required',

        ]);
        $house = House::find($id);
        // $product_image = $request->file('product_image');

        // if($product_image)
        // {
        //     unlink($product->product_image);
        //     $imageName = $product_image->getClientOriginalName();

        //     $directory = 'backend/product-images/';
        //     $imageUrl = $directory.$imageName;
        //     $product_image->move($directory,$imageName);

        //     $product->product_image=$imageUrl;
        //                 // $product = new Product();
        //     $product->category_id = $request->category_id;
        //     $product->brand_id = $request->brand_id;
        //     $product->product_name = $request->product_name;
        //     $product->product_price = $request->product_price;
        //     $product->product_quantity = $request->product_quantity;
        //     $product->short_description = $request->short_description;
        //     $product->long_description = $request->long_description;
        //     // $product->product_image = $request->product_image;
        //     $product->publication_status = $request->publication_status;
        //     $product->save();
        // }
        // else
        // {
        //     // $product = new Product();
        //     $product->category_id = $request->category_id;
        //     $product->brand_id = $request->brand_id;
        //     $product->product_name = $request->product_name;
        //     $product->product_price = $request->product_price;
        //     $product->product_quantity = $request->product_quantity;
        //     $product->short_description = $request->short_description;
        //     $product->long_description = $request->long_description;
        //     // $product->product_image = $request->product_image;
        //     $product->publication_status = $request->publication_status;
        //     $product->save();
        // }

        //handle image
        $image = $request->file('house_image');
        $slug = Str::slug($request->house_image);
        if (isset($image))
        {
            //            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            //            check category dir is exists
            if (!Storage::disk('public')->exists('img'))
            {
                Storage::disk('public')->makeDirectory('img');
            }
            $category = Image::make($image)->resize(400,400)->save($imagename);
            Storage::disk('public')->put('img/'.$imagename,$category);

            // if (!Storage::disk('public')->exists('about/slider'))
            // {
            //     Storage::disk('public')->makeDirectory('about/slider');
            // }
            // //            resize image for category slider and upload
            // $slider = Image::make($image)->resize(1600,791)->save($imagename);
            // Storage::disk('public')->put('about/slider/'.$imagename,$slider);
        }
        else {
            $imageOld = House::find($id);
            $imagename = $imageOld->house_image;
        }

        $house->name = $request->house_name;
        $house->long_description = $request->long_description;
        $house->publication_status = $request->publication_status;
        $house->aboutus_image = $imagename;
        $house->save();
        return redirect()->route('house-us')->with('success','House Updated successfully');
    }

    public function deleteHouse($id)
    {
        $house = House::find($id);
        $house->delete();

        return redirect()->route('manage-house')->with('success','House  delete successfully');
    }
}
