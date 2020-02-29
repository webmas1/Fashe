<?php

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

//Route::get('/', function () {
//    return view('content.home');
//});

// -----HOME------- //
Route::get('/', 'PagesController@GetHome');

// -----SUBSCRIBE------ //
Route::get('/subscribe', 'PagesController@Subscribe');
Route::get('/unsubscribe', 'PagesController@Unsubscribe');



// -----CATEGORIES------- //
Route::prefix('categories')->group(function(){
    Route::get('/', 'PagesController@GetCategories');
    Route::get('/{cat_url}', 'PagesController@GetAllProducts');
    Route::get('/{cat_url}/{product_url}', 'PagesController@GetProduct');
});

// -----CART------- //
Route::get('/add_to_cart', 'PagesController@AddToCart');
Route::get('/checkout', 'PagesController@GetCheckout');
Route::get('/update_cart', 'PagesController@UpdateCart');
Route::get('/delete_cart', 'PagesController@DeleteCart');
Route::get('/save_order', 'PagesController@SaveOrder');

// -----USER------- //
Route::prefix('user')->group(function(){
    Route::get('/signin', 'PagesController@SignIn');
    Route::post('/signin', 'PagesController@SignInRequest');
    Route::get('/logout', 'PagesController@LogOut');
    Route::get('/signup', 'PagesController@SignUp');
    Route::post('/signup', 'PagesController@SignUpRequest');
});

// -----CMS------- //
Route::middleware(['cmsguard'])->group(function(){
    Route::prefix('cms')->group(function(){
        Route::get('dashboard', 'CmsController@GetDashboard');
        Route::resource('categories', 'CategorieController');
        Route::resource('products', 'ProductController');
        Route::resource('pages', 'PageController');
        Route::resource('users', 'UserController');
        Route::resource('orders', 'OrderController');
    });
});



// Must stay last !

// -----PAGES------- //
Route::get('/{page}', 'PagesController@GetPage');


