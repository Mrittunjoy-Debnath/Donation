<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Carousel;
use App\Category;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carousels = Carousel::where('publication_status',1)
                                ->take(4)
                                ->get();

        // $categories =Category::where('publication_status',1)->get();
        $firstProducts =Product::where('publication_status',1)
                                ->take(4)
                                ->get();

        $secondProducts =Product::where('publication_status',1)
                                ->skip(4)
                                ->take(4)
                                ->get();

        $newProducts =Product::where('publication_status',1)
                                ->orderBy('id','DESC')
                                ->take(4)
                                ->get();

        $randomProducts =Product::where('publication_status',1)
                                ->inRandomOrder()
                                ->take(4)
                                ->get();
        return view('front-end.home.home',[
            // 'categories'=>$categories,
            'firstProducts' =>$firstProducts,
            'secondProducts'=>$secondProducts,
            'newProducts' =>$newProducts,
            'randomProducts'=>$randomProducts,
            'carousels' => $carousels,
        ]);
    }

    public function category($id)
    {
        $categories = Category::all();

        $categoryProducts = Product::where('category_id',$id)
                                    ->where('publication_status',1)
                                    ->take(3)
                                    ->get();
        $category2Products = Product::where('category_id',$id)
                                    ->where('publication_status',1)
                                    ->orderBy('id','DESC')
                                    ->take(3)
                                    ->get();
        $categoryNewProducts = Product::where('category_id',$id)
                                    ->inRandomOrder()
                                    ->where('publication_status',1)
                                    ->take(3)
                                    ->get();

        $bestSellers = Product::where('category_id',$id)
                                    ->inRandomOrder()
                                    ->where('publication_status',1)
                                    ->take(4)
                                    ->get();

        return view('front-end.category.category-products',[
            'categoryProducts'=>$categoryProducts,
            'category2Products'=>$category2Products,
            'categoryNewProducts'=>$categoryNewProducts,
            'categories'=>$categories,
            'bestSellers'=>$bestSellers,
        ]);
    }

    public function productDetails($id)
    {
        $categories = Category::all();
        $productDetails = Product::find($id);

        $categoryNewProducts = Product::where('publication_status',1)
        ->inRandomOrder()
        ->take(6)
        ->get();

        $bestSellers = Product::where('category_id',$id)
                                    ->where('publication_status',1)
                                    ->inRandomOrder()
                                    ->take(4)
                                    ->get();

        return view('front-end.product.productdetails',[
            'productDetails'=>$productDetails,
            'categoryNewProducts'=>$categoryNewProducts,
            'categories' => $categories,
            'bestSellers' =>$bestSellers,
        ]);
    }
    public function adminIndex()
    {
        $totalCategory = Category::count();
        $publishCategory = Category::where('publication_status',1)
                                        ->count();
        $totalBrand = Brand::count();
        $publishBrand = Brand::where('publication_status',1)
                                        ->count();

        $totalProduct = Product::count();
        $publishProduct = Product::where('publication_status',1)
                                        ->count();

        $totalOrder = Order::count();
        $totalUser = User::count();
        $totalAdmin = User::where('is_admin',1)
                            ->count();
        return view('admin.home.adminhome',[
            'totalCategory' => $totalCategory,
            'publishCategory' =>$publishCategory,
            'totalBrand' => $totalBrand,
            'publishBrand' => $publishBrand,
            'totalProduct' => $totalProduct,
            'publishProduct' =>$publishProduct,
            'totalUser' => $totalUser,
            'totalAdmin' => $totalAdmin,
            'totalOrder' => $totalOrder,
        ]);
    }
}
