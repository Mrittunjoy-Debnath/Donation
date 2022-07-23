<?php

namespace App\Http\Controllers\Admin;

use App\Aboutus;
use App\Carousel;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CarouselController extends Controller
{
    public function addCarousel()
    {
        return view('admin.carousel.addcarousel');

    }

    public function saveCarousel(Request $request)
    {
        $this->validate($request,[

            'carousel_name' => 'required',
//            'long_description' => 'required',
            'carousel_image' => 'required',
            'publication_status' => 'required',

        ]);

        $carousel = new Carousel();

        $image = $request->file('carousel_image');
        $slug = Str::slug($request->carousel_image);
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


        $carousel->name = $request->carousel_name;
        $carousel->publication_status = $request->publication_status;
        $carousel->carousel_image = $imagename;
        $carousel->save();
        return redirect()->route('add-carousel')->with('success','Carousel added successfully');
    }

    public function manageCarousel()
    {
        $carousel = Carousel::all();
        return view('admin.carousel.managecarousel',[
            'carousel' => $carousel,
        ]);
    }

    public function publishedCarousel($id)
    {
        $carousel = Carousel::find($id);
        $carousel->publication_status = 1;
        $carousel->save();

        return redirect()->back()->with('success','Carousel published successfully');
    }

    public function unpublishedCarousel($id)
    {
        $carousel = Carousel::find($id);
        $carousel->publication_status = 0;
        $carousel->save();

        return redirect()->back()->with('success','Carousel unpublished successfully');
    }

    public function editCarousel($id)
    {

        $carousel = Carousel::find($id);

        return view('admin.carousel.editcarousel',[
            'carousel' => $carousel,
        ]);
    }

    public function updateCarousel(Request $request,$id)
    {
        $this->validate($request,[
            'carousel_name' => 'required',
//            'long_description' => 'required',
//            'about_image' => 'required',
            'publication_status' => 'required',

        ]);
        $carousel = Carousel::find($id);
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
        $image = $request->file('carousel_image');
        $slug = Str::slug($request->carousel_image);
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
            $imageOld = Carousel::find($id);
            $imagename = $imageOld->carousel_image;
        }

        $carousel->name = $request->carousel_name;
        $carousel->publication_status = $request->publication_status;
        $carousel->carousel_image = $imagename;
        $carousel->save();
        return redirect()->route('manage-carousel')->with('success','Carousel Updated successfully');
    }

    public function deleteCarousel($id)
    {
        $carousel = Carousel::find($id);
        $carousel->delete();

        return redirect()->route('manage-carousel')->with('success','Carousel  delete successfully');
    }

}
