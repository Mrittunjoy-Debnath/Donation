<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PreviousWork;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class PreviousworkController extends Controller
{
    public function addWork()
    {
        return view('admin.p_work.addwork');
    }

    public function saveWork(Request $request)
    {
        $this->validate($request,[

            'work_name' => 'required',
            'long_description' => 'required',
            'work_image' => 'required',
            'publication_status' => 'required',

        ]);

        $work = new PreviousWork();

        $image = $request->file('work_image');
        $slug = Str::slug($request->work_image);
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


        $work->name = $request->work_name;
        $work->long_description = $request->long_description;
        $work->publication_status = $request->publication_status;
        $work->work_image = $imagename;
        $work->save();
        return redirect()->route('add-work')->with('success','Work added successfully');
    }

    public function manageWork()
    {
        $work = PreviousWork::all();
        return view('admin.p_work.managework',[
            'work' => $work,
        ]);
    }

    public function publishedWork($id)
    {
        $work = PreviousWork::find($id);
        $work->publication_status = 1;
        $work->save();

        return redirect()->back()->with('success','Work published successfully');
    }

    public function unpublishedWork($id)
    {
        $work = PreviousWork::find($id);
        $work->publication_status = 0;
        $work->save();

        return redirect()->back()->with('success','Work unpublished successfully');
    }

    public function editWork($id)
    {

        $work = PreviousWork::find($id);

        return view('admin.p_work.editwork',[
            'work' => $work,
        ]);
    }

    public function updateWork(Request $request,$id)
    {
        $this->validate($request,[
            'work_name' => 'required',
            'long_description' => 'required',
//            'about_image' => 'required',
            'publication_status' => 'required',

        ]);
        $work = PreviousWork::find($id);
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
        $image = $request->file('work_image');
        $slug = Str::slug($request->work_image);
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
            $imageOld = PreviousWork::find($id);
            $imagename = $imageOld->work_image;
        }

        $work->name = $request->work_name;
        $work->long_description = $request->long_description;
        $work->publication_status = $request->publication_status;
        $work->work_image = $imagename;
        $work->save();
        return redirect()->route('manage-work')->with('success','Work Updated successfully');
    }

    public function deleteWork($id)
    {
        $work = PreviousWork::find($id);
        $work->delete();

        return redirect()->route('manage-work')->with('success','Work  delete successfully');
    }
}
