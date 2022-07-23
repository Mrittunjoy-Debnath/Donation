<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status',1)->get();

        return view('admin.product.addproduct',[
            'categories'=>$categories,
            'brands' =>$brands,
        ]);
    }
    public function saveProduct(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_image' => 'required',
            'publication_status' => 'required',

        ]);

        $product = new Product();

        // $product->product_image = $request->product_image;



        // $product_image = $request->file('product_image');


        // // return $product_image;


        // $imageName = $product_image->getClientOriginalName();

        // $directory = 'backend/product-images/';
        // $imageUrl = $directory.$imageName;
        // $product_image->move($directory,$imageName);

        // $product->product_image=$imageUrl;

        //handle image
        $image = $request->file('product_image');
        $slug = Str::slug($request->product_image);
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

        // $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imagename;
        $product->publication_status = $request->publication_status;
        $product->save();
        return redirect()->route('add-product')->with('success','Product added successfully');
    }

    public function manageproduct()
    {
        $products = DB::table('products')
                        ->join('categories','products.category_id','=','categories.id')
                        ->join('brands','products.brand_id','=','brands.id')
                        ->select('products.*','categories.category_name','brands.brand_name')
                        ->get();

        return view('admin.product.manageproduct',[
            'products' =>$products,
        ]);
    }

    public function publishedProduct($id)
    {
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();

        return redirect()->back()->with('success','Product published successfully');
    }

    public function unpublishedProduct($id)
    {
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();

        return redirect()->back()->with('success','Product unpublished successfully');
    }

    public function editProduct($id)
    {

        $products = Product::find($id);
        $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status',1)->get();

        return view('admin.product.editproduct',[
            'products' => $products,
            'categories'=>$categories,
            'brands'=>$brands,
        ]);
    }

    public function updateProduct(Request $request,$id)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            // 'product_image' => 'required',
            'publication_status' => 'required',

        ]);
        $product = Product::find($id);
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
                $image = $request->file('product_image');
                $slug = Str::slug($request->product_name);
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
                    $imageOld = Product::find($id);
                    $imagename = $imageOld->product_image;
                }

                $product->category_id = $request->category_id;
                $product->brand_id = $request->brand_id;
                $product->product_name = $request->product_name;
                $product->product_price = $request->product_price;
                $product->product_quantity = $request->product_quantity;
                $product->short_description = $request->short_description;
                $product->long_description = $request->long_description;
                $product->product_image = $imagename;
                $product->publication_status = $request->publication_status;
                $product->save();
                // return redirect()->route('add-product')->with('success','Product added successfully');

                return redirect()->route('manage-product')->with('success','Product edited successfully');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('manage-product')->with('success','Product  delete successfully');
    }
}
