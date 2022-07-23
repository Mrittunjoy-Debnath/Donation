<?php

namespace App\Http\Controllers\Admin;

use App\Aboutus;
use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AboutusController extends Controller
{
    public function index(){
        return view('admin.aboutus.addaboutus');
    }

    public function saveAboutus(Request $request)
    {
        $this->validate($request,[

            'about_name' => 'required',
            'long_description' => 'required',
            'about_image' => 'required',
            'publication_status' => 'required',

        ]);

        $about = new Aboutus();

        $image = $request->file('about_image');
        $slug = Str::slug($request->about_image);
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


        $about->name = $request->about_name;
        $about->long_description = $request->long_description;
        $about->publication_status = $request->publication_status;
        $about->aboutus_image = $imagename;
        $about->save();
        return redirect()->route('about-us')->with('success','About added successfully');
    }

    public function manageAbout()
    {
        $aboutus = Aboutus::all();
        return view('admin.aboutus.manageaboutus',[
            'aboutus' => $aboutus,
        ]);
    }

    public function publishedAbout($id)
    {
        $about = Aboutus::find($id);
        $about->publication_status = 1;
        $about->save();

        return redirect()->back()->with('success','About published successfully');
    }

    public function unpublishedAbout($id)
    {
        $about = Aboutus::find($id);
        $about->publication_status = 0;
        $about->save();

        return redirect()->back()->with('success','About unpublished successfully');
    }

    public function editAbout($id)
    {

        $aboutus = Aboutus::find($id);

        return view('admin.aboutus.editaboutus',[
            'aboutus' => $aboutus,
        ]);
    }

    public function updateAbout(Request $request,$id)
    {
        $this->validate($request,[
            'about_name' => 'required',
            'long_description' => 'required',
//            'about_image' => 'required',
            'publication_status' => 'required',

        ]);
        $about = Aboutus::find($id);
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
        $image = $request->file('about_image');
        $slug = Str::slug($request->about_image);
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
            $imageOld = Aboutus::find($id);
            $imagename = $imageOld->aboutus_image;
        }

        $about->name = $request->about_name;
        $about->long_description = $request->long_description;
        $about->publication_status = $request->publication_status;
        $about->aboutus_image = $imagename;
        $about->save();
        return redirect()->route('about-us')->with('success','Aboutus Updated successfully');
    }

    public function deleteAbout($id)
    {
        $about = Aboutus::find($id);
        $about->delete();

        return redirect()->route('manage-about')->with('success','Aboutus  delete successfully');
    }
}
