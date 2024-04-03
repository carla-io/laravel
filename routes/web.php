<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user_template.layouts.template');
// });

Route::controller(HomeController::class)->group(function (){
   Route::get('/', 'Index')->name('Home');
});

Route::controller(ClientController::class)->group(function(){
  Route::get('/category/{id}/', 'CategoryPage')->name('category');
  Route::get('/product-details/{id}/', 'SingleProduct')->name('singleproduct');
  

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware(['auth', 'role:user'])->group(function(){
  Route::controller(ClientController::class)->group(function(){
    Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
    Route::post('/add-product-to-cart', 'AddProductToCart')->name('addproducttocart');
    Route::get('/shipping-address', 'GetShippingAddress')->name('shippingaddress');
    Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/custom-service', 'CustomService')->name('customservice');
    Route::get('/user-profile', 'UserProfile')->name('userprofile');
    Route::get('/user-profile/pending-orders', 'PendingOrders')->name('pendingorders');
    Route::get('remove-cart-item/{id}', 'RemoveCartItem')->name('removeitem');
  });
});

Route::middleware(['auth', 'role:admin'])->group(function(){
   Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
        
   });

   Route::controller(ProductController::class)->group(function(){
    Route::get('/admin/all-product', 'Index')->name('allproduct');
    Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
    Route::post('/admin/store-product','StoreProduct')->name('storeproduct');
    Route::get('/admin/edit-product-img/{id}', 'EditProductImg')->name('editproductimg');
    Route::post('/admin/update-product-img', 'UpdateProductImg')->name('updateproductimg');
    Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
    Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
    Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
  });


  Route::controller(CategoryController::class)->group(function(){
    Route::get('/admin/all-category', 'Index')->name('allcategory');
    Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
    Route::post('admin/store-category', 'StoreCategory')->name('storecategory');
    route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
    Route::post('admin/update-category', 'UpdateCategory')->name('updatecategory');
    route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');

  });


  Route::controller(CustomerController::class)->group(function(){
    Route::get('/admin/customer', 'Index')->name('customer');
  });


  Route::controller(OrderController::class)->group(function(){
    Route::get('/admin/order', 'Index')->name('order');
  });


  Route::controller(FeedbackController::class)->group(function(){
    Route::get('/admin/feedback', 'Index')->name('feedback');
  });

});

require __DIR__.'/auth.php';
