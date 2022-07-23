<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',function(){
//     return view('front-end.home.home');
// });

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
//register
Route::get('/new/register','RegisterController@register')->name('new-register');


//category
Route::get('/category/products/{id}', 'HomeController@category')->name('category');
//product
Route::get('/product/details/{id}','HomeController@productDetails')->name('product-details');
//contact
Route::get('/contact','ContactController@contact')->name('contact');
Route::get('/aboutus','AboutusController@aboutus')->name('aboutus');
Route::get('/previouswork','PreviousworkController@previousWork')->name('previous-work');
Route::get('/detailswork/{id}','PreviousworkController@detailsWork')->name('details-work');

Route::post('/savecontact','ContactController@saveContact')->name('save-contact');
Route::get('/donateperson','ContactController@donatePerson')->name('donate-person');
//service
Route::get('/house','ServiceController@house')->name('house');
Route::get('/foods','ServiceController@foods')->name('foods');
Route::get('/tubewell','ServiceController@tubewell')->name('tubewell');

Route::group(['middleware' =>'auth'],function(){
    //cart
    Route::post('/addtocart','CartController@addToCart')->name('add-to-cart');
    Route::get('/cart/show','CartController@showCart')->name('show-cart');
    Route::get('/cart/delete/{id}','CartController@deleteCart')->name('delete-cart-item');
    Route::post('/cart/update','CartController@updateCart')->name('update-cart');
    Route::get('/clearcart','CartController@clearCart')->name('clear-cart');
    //checkout
    Route::get('/checkout','CheckoutController@index')->name('checkout');
    Route::post('/newshipping','CheckoutController@newShipping')->name('new-shipping');
    Route::get('/checkout/payment','CheckoutController@checkoutPayment')->name('checkout-payment');
    Route::post('/checkout/order','CheckoutController@newOrder')->name('new-order');
    Route::get('/complete/order','CheckoutController@orderComplete')->name('order-complete');

    Route::post('/savepayment','PaymentController@savePayment')->name('save-payment');
});

//admin
Route::group(['prefix'=>'admin','middleware' =>'is_admin'],function(){
    Route::get('/home', 'HomeController@adminIndex')->name('admin.home')->middleware('is_admin');
    //Category
    Route::get('/addcategory','Admin\CategoryController@addCategory')->name('add-category');
    Route::post('/savecategory','Admin\CategoryController@saveCategory')->name('save-category');
    Route::get('/managecategory','Admin\CategoryController@manageCategory')->name('manage-category');
    Route::get('/unpublishedcategory/{id}','Admin\CategoryController@unpublishedCategory')->name('unpublished-category');
    Route::get('/publishedcategory/{id}','Admin\CategoryController@publishedCategory')->name('published-category');
    Route::get('/editcategory/{id}','Admin\CategoryController@editCategory')->name('edit-category');
    Route::post('/updatecategory/{id}','Admin\CategoryController@updateCategory')->name('update-category');
    Route::get('/deletecategory/{id}','Admin\CategoryController@deleteCategory')->name('delete-category');
    //Brand
    Route::get('/addbrand','Admin\BrandController@addBrand')->name('add-brand');
    Route::post('/savebrand','Admin\BrandController@saveBrand')->name('save-brand');
    Route::get('/managebrand','Admin\BrandController@manageBrand')->name('manage-brand');
    Route::get('/unpublishedbrand/{id}','Admin\BrandController@unpublishedBrand')->name('unpublished-brand');
    Route::get('/publishedbrand/{id}','Admin\BrandController@publishedBrand')->name('published-brand');
    Route::get('/editbrand/{id}','Admin\BrandController@editBrand')->name('edit-brand');
    Route::post('/updatebrand/{id}','Admin\BrandController@updateBrand')->name('update-brand');
    Route::get('/deletebrand/{id}','Admin\BrandController@deleteBrand')->name('delete-brand');
    //Product
    Route::get('/addproduct','Admin\ProductController@addProduct')->name('add-product');
    Route::post('/saveproduct','Admin\ProductController@saveProduct')->name('save-product');
    Route::get('/manageproduct','Admin\ProductController@manageProduct')->name('manage-product');
    Route::get('/unpublishedproduct/{id}','Admin\ProductController@unpublishedProduct')->name('unpublished-product');
    Route::get('/publishedproduct/{id}','Admin\ProductController@publishedProduct')->name('published-product');
    Route::get('/editproduct/{id}','Admin\ProductController@editProduct')->name('edit-product');
    Route::post('/updateproduct/{id}','Admin\ProductController@updateProduct')->name('update-product');
    Route::get('/deleteproduct/{id}','Admin\ProductController@deleteProduct')->name('delete-product');

    //Register
    Route::get('/manageregister','Admin\RegisterController@manageRegister')->name('manage-register');
    Route::get('/manageadmin','Admin\RegisterController@manageAdmin')->name('manage-admin');

        //Order
        Route::get('/showorders','Admin\OrderController@showOrders')->name('show-orders');
        Route::get('/orderdone/{order_id}/{customer_id}','Admin\OrderController@orderDone')->name('order-done');
        Route::get('/downloadpdf/{order_id}/{customer_id}','Admin\OrderController@downloadPdf')->name('download-pdf');
        // Route::get('/ordermovedownloadpdf/{phone}','Admin\OrderController@orderMoveDownloadPdf')->name('order-move-download-pdf');
        Route::get('/ordermove/{order_id}/{customer_id}','Admin\OrderController@orderMove')->name('order-move');
        Route::get('/doneorder','Admin\OrderController@doneOrder')->name('done-order');
        // Route::get('/ordermovedone/{phone}','Admin\OrderController@orderMoveDone')->name('order-move-done');
        // Route::get('/ordermovedelete/{phone}','Admin\OrderController@orderMoveDelete')->name('order-move-delete');

        //search
        Route::post('/search','Admin\SearchController@search')->name('search');

        //message
        Route::get('/showmessage','Admin\MessageController@showMessage')->name('show-message');
        Route::get('/deletemessage/{id}','Admin\MessageController@deleteMessage')->name('delete-message');

        //about
        Route::get('/aboutus','Admin\AboutusController@index')->name('about-us');
        Route::post('/saveaboutus','Admin\AboutusController@saveAboutus')->name('save-aboutus');
        Route::get('/manageabout','Admin\AboutusController@manageAbout')->name('manage-about');
        Route::get('/unpublishedabout/{id}','Admin\AboutusController@unpublishedAbout')->name('unpublished-about');
        Route::get('/publishedabout/{id}','Admin\AboutusController@publishedAbout')->name('published-about');
        Route::get('/editabout/{id}','Admin\AboutusController@editAbout')->name('edit-about');
        Route::post('/updateabout/{id}','Admin\AboutusController@updateAbout')->name('update-about');
        Route::get('/deleteabout/{id}','Admin\AboutusController@deleteAbout')->name('delete-about');

        //house
        Route::get('/house','Admin\HouseController@index')->name('house-us');
        Route::post('/savehouse','Admin\HouseController@saveHouse')->name('save-house');
        Route::get('/managehouse','Admin\HouseController@manageHouse')->name('manage-house');
        Route::get('/unpublishedhouse/{id}','Admin\HouseController@unpublishedHouse')->name('unpublished-house');
        Route::get('/publishedhouse/{id}','Admin\HouseController@publishedHouse')->name('published-house');
        Route::get('/edithouse/{id}','Admin\HouseController@editHouse')->name('edit-house');
        Route::post('/updatehouse/{id}','Admin\HouseController@updateHouse')->name('update-house');
        Route::get('/deletehouse/{id}','Admin\HouseController@deleteHouse')->name('delete-house');

        //carousel
        Route::get('/addcarousel','Admin\CarouselController@addCarousel')->name('add-carousel');
        Route::post('/savecarousel','Admin\CarouselController@saveCarousel')->name('save-carousel');
        Route::get('/managecarousel','Admin\CarouselController@manageCarousel')->name('manage-carousel');
        Route::get('/unpublishedcarousel/{id}','Admin\CarouselController@unpublishedCarousel')->name('unpublished-carousel');
        Route::get('/publishedcarousel/{id}','Admin\CarouselController@publishedCarousel')->name('published-carousel');
        Route::get('/editcarousel/{id}','Admin\CarouselController@editCarousel')->name('edit-carousel');
        Route::post('/updatecarousel/{id}','Admin\CarouselController@updateCarousel')->name('update-carousel');
        Route::get('/deletecarousel/{id}','Admin\CarouselController@deleteCarousel')->name('delete-carousel');

        //previous work
        Route::get('/addwork','Admin\PreviousworkController@addWork')->name('add-work');
        Route::post('/savework','Admin\PreviousworkController@saveWork')->name('save-work');
        Route::get('/managework','Admin\PreviousworkController@manageWork')->name('manage-work');
        Route::get('/unpublishedwork/{id}','Admin\PreviousworkController@unpublishedWork')->name('unpublished-work');
        Route::get('/publishedwork/{id}','Admin\PreviousworkController@publishedWork')->name('published-work');
        Route::get('/editwork/{id}','Admin\PreviousworkController@editWork')->name('edit-work');
        Route::post('/updatework/{id}','Admin\PreviousworkController@updateWork')->name('update-work');
        Route::get('/deletework/{id}','Admin\PreviousworkController@deleteWork')->name('delete-work');

        //payment
        Route::get('/payment','Admin\PaymentController@showPayment')->name('show-payment');
        Route::get('/deletepayment/{id}','Admin\PaymentController@deletePayment')->name('delete-payment');
});
