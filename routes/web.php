<?php

use Gloudemans\Shoppingcart\Facades\Cart;

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
//test
Route::get('/testing', 'LandingPageController@test')->name('test');
// Route::get('/algolia-search/{searchKey}', 'LandingPageController@demoSearch')->name('algolia.search');
Route::get('/check-general', function () {
    return view('emails.user.general');
})->name('check.general');

//basic pages
Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::get('/about', 'LandingPageController@about')->name('about');
Route::get('/contact', 'LandingPageController@contact')->name('contact');
Route::get('/faq', 'LandingPageController@faq')->name('faq');
Route::get('/privacy-policy', 'LandingPageController@policy')->name('policy');
Route::get('/terms-and-conditions', 'LandingPageController@tandc')->name('tandc');

//route for weekend sales
Route::get('/Weeked-sales', 'LandingPageController@weekend')->name('weekend.sales');

//how tos
Route::get('/how-to-be-a-seller', 'LandingPageController@howSeller')->name('how.seller');
Route::get('/how-to-be-an-agent', 'LandingPageController@howAgent')->name('how.Agent');

//shop routes
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/{product}/shop', 'ShopController@show')->name('shop.show');
Route::get('/brand/{name}', 'SellersController@brand')->name('brand.name');

//cart routes
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

//Wishlist routes
Route::post('/cart/wishlist/{product}', 'CartController@wishlist')->name('cart.wishlist');
Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index');
Route::delete('/wishlist/{product}', 'WishlistController@destroy')->name('wishlist.destroy');
Route::post('/switchToCart/{product}', 'WishlistController@switchToCart')->name('wishlist.switchToCart');

//compare routes
Route::get('/compare', 'CompareController@index')->name('compare.index');
Route::post('/compare', 'CompareController@store')->name('compare.store');
Route::delete('/compare/{product}', 'CompareController@destroy')->name('compare.destroy');
Route::post('/compare/switchToCart/{product}', 'CompareController@switchToCart')->name('compare.switchToCart');

//checkout route
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

//checkout confirmation
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

//payment route
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

//coupons route
Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');


Route::get('/empty/wishlist', function() {
    Cart::instance('wishlist')->destroy();
})->name('wishlist.empty');

//this is for contating us
Route::post('/contact-us/ziksales', 'ContactController@store')->name('contact.store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//this is the route for blog
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/{blog}/single', 'BlogController@show')->name('blog.show');
Route::post('/my-comment', 'BlogController@store')->name('blog.store');

// routes for socilite
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

//this is the route for rating
Route::get('/rating/{token}', 'ReviewsController@create')->name('rating.create');
Route::post('/my-review', 'ReviewsController@store')->name('review.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mailable', function(){
	$order = App\Order::find(1);

	return new App\Mail\OrderPlaced($order);
});

Route::get('/search', 'ShopController@search')->name('search');

//route for authenticted functions
Route::middleware('auth')->group(function () {

	//route for my profile
	Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
	Route::patch('/my-profile', 'UsersController@update')->name('users.update');

	//route for orders
	Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
	Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');

	
	//this isthe route for cashout
	Route::get('/my-cashout', 'CashOutController@store')->name('cashout.store');
	
	//this is for sellers portal
	Route::get('/register-seller', 'SellersController@register')->name('seller.register');

	Route::post('/registered-seller', 'SellersController@registered')->name('seller.registered');

	Route::get('/my-portal', 'SellersController@index')->name('seller.index');

	Route::get('/sell-product', 'SellersController@create')->name('sell.product');

	Route::post('/dynamic_dependent/fetch', 'SellersController@fetch')->name('dynamicdependent.fetch');

	Route::post('/product-store', 'SellersController@store')->name('product.store');

	Route::delete('/delete-product/{id}', 'SellersController@destroy')->name('product.destroy');

	Route::get('/view-product/{product}', 'SellersController@show')->name('view.product');

	Route::get('/update-product/{product}', 'SellersController@edit')->name('update.product');

	Route::post('/product-update/{id}', 'SellersController@update')->name('product.update');
	Route::get('/branding', 'SellersController@branding')->name('seller.brand');
	Route::post('/branding-store', 'SellersController@brandingStore')->name('brand.store');
	Route::post('/branding-update', 'SellersController@brandingUpdate')->name('brand.update');
	

	//these are routes for agent portal
	Route::get('/agent/get-started', 'AgentsController@create')->name('get.started');
	Route::get('/agent-dashboard', 'AgentsController@index')->name('agent.index');
	Route::get('/agent-register', 'AgentsController@store')->name('agent.store');
	Route::get('/agent-orders', 'AgentsController@orders')->name('agent.orders');
	Route::get('/agent-wallet', 'AgentsController@wallet')->name('agent.wallet');
	Route::post('/agent-withdraw', 'AgentsController@withdraw')->name('agent.withdraw');
	Route::get('/agent-bank', 'AgentsController@bank')->name('agent.bank');
	Route::post('/store-agent-bank', 'AgentsController@storeBank')->name('agentBank.store');
	Route::post('/update-agent-bank', 'AgentsController@bankUpdate')->name('agentBank.update');

	//sending general mail
	Route::get('/admin-general-mail/{password}', 'LandingPageController@generalMail')->name('general.mail');

});

