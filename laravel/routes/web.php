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
Route::get('/index', 'SiteController@index')->name('index');
Route::get('/', 'SiteController@index')->name('index');
Route::get('/home', 'SiteController@index')->name('home');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store')->name('login');

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/logout', 'SessionController@destroy')->name('logout');
Route::post('/logout', 'SessionController@destroy')->name('logout');

Route::get('/register', 'RegisterController@create')->name('register');
Route::post('/register', 'RegisterController@store')->name('register');

Route::get('/verify/{user}', 'RegisterController@verify')->name('verify');

Route::get('/forgotpassword', 'ForgotPasswordController@showPasswordResetForm')->name('password.email');
Route::post('/forgotpassword', 'ForgotPasswordController@sendResetPassword')->name('password.email');
Route::get('/newpassword', 'ForgotPasswordController@newpassword')->name('password.reset');
Route::post('/newpassword', 'ForgotPasswordController@resetpassword')->name('password.reset');

Route::get('/redirect/{driver}', 'SocialAuthController@redirectToProvider');
Route::get('/callback/{driver}', 'SocialAuthController@handleProviderCallback');

Route::get('/training/detail/{training}', 'TrainingsController@detail')->name('training_detail');


Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/detail/{id}', 'ProductController@detail')->name('products_detail');
Route::post('/products/review/', 'ProductController@createReview')->name('createReview');
Route::get('/products/addtowishlist/{product}', 'WishlistController@store')->name('createWishlist');
Route::get('/products/viewlist', 'WishlistController@viewlist')->name('viewlist');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/product/{product}', 'CartController@addProductAndShowCart')->name('addProductAndShowCart');
Route::get('/cart/add/{product}', 'CartController@addProductAndReturn')->name('addProductAndReturn');
Route::get('/cart/remove/{id}', 'CartController@removeProductAndShowCart')->name('removeProductAndShowCart');
Route::get('/cart/clear', 'CartController@clear')->name('cart.clear');

Route::get('/shipping', 'ShippingController@addShippingAddress')->name('load_shipping_address');
Route::post('/shipping', 'ShippingController@store')->name('store_shipping_address');

Route::get('/payment-info', 'PaymentInfoController@index')->name('payment_info');
Route::post('/payment/process', 'PaymentsController@process')->name('payment.process');
Route::post('/payment/process/bitcoin', 'PaymentsController@coingateProcess')->name('payment.coingateProcess');
Route::get('/payment/process/success', 'PaymentsController@coingateSuccess')->name('payment.coingatesuccess');

Route::post('/payment-info/training', 'PaymentInfoController@trainings')->name('training_payment_info');
Route::post('/payment/process/training', 'TrainingPaymentsController@process')->name('training_payment.process');
Route::post('/payment/training/bitcoin', 'TrainingPaymentsController@coingateProcess')->name('training_payment.coingateProcess');
Route::get('/payment/training/bitcoin/success', 'TrainingPaymentsController@coingateSuccess')->name('training_payment.coingatesuccess');
Route::get('/subscription/training/success', 'TrainingPaymentController@orderSuccess')->name('training_payment.success');


Route::get('/membership', 'MembershipController@index')->name('membership.index');
Route::post('/payment-info/membership/{membership}', 'PaymentInfoController@membership')->name('membership_payment_info');
Route::post('/payment/process/membership', 'MembershipPaymentController@process')->name('membership_payment.process');
Route::get('/payment/membership/bitcoin', 'MembershipPaymentController@coingateProcess')->name('membership_payment.coingateProcess');
Route::get('/payment/membership/bitcoin/success', 'MembershipPaymentController@coingateProcess')->name('membership_payment.coingateProcess');

Route::get('/subscription/membership/success', 'MembershipPaymentController@orderSuccess')->name('membership_payment.success');

Route::get('/order/success', 'PaymentsController@orderSuccess')->name('payment.success');
Route::get('/order/cancel/{order}', 'OrdersController@requestCancel')->name('order.cancel_request');
Route::post('/order/cancel/{order}', 'OrdersController@confirmCancel')->name('order.confirm_cancel');


Route::get('/orders', 'OrdersController@index')->name('orders');
Route::get('/welcome', 'WelcomeController@index')->name('welcome');

Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::post('/profile', 'ProfileController@update')->name('profile.update');


Route::get('/bookings', 'BookingsController@index')->name('bookings.index');

Route::post('/bookings/time', 'BookingsController@calendarTest')->name('bookings.chooseTime');
Route::post('/bookings/service', 'BookingsController@serviceOrder')->name('bookings.bookService');
Route::get('/bookings/details', 'BookingsController@loadBookingDetails')->name('bookings.bookingDetails');
Route::post('/bookings/details', 'BookingsController@saveBookingDetails')->name('bookings.saveBookingDetails');
Route::get('/payment-info/bookings/', 'PaymentInfoController@bookings')->name('bookings_payment_info');
Route::post('/payment/process/bookings', 'BookingsPaymentController@process')->name('bookings_payment.process');

//Route::get('/bookings/calendar', 'BookingsController@calendarTest')->name('bookings.calendarTest');
//Route::post('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/test', function () {
    return view('test.booking_time');
});

//Admin Module
Route::get('/admin','Admin\SessionController@index')->name('admin');
Route::post('/admin-login','Admin\SessionController@store')->name('admin-login');
Route::get('/admin-logout','Admin\SessionController@destroy')->name('admin-logout');

//Forgot Password
Route::get('/admin-forgot','Admin\ForgotPasswordController@index');
Route::post('/forgotpassword','Admin\ForgotPasswordController@sendResetPassword');
Route::get('/adminpassword','Admin\ForgotPasswordController@newpassword');
Route::post('/adminpassword','Admin\ForgotPasswordController@resetpassword');

//Admin Dashboard
Route::get('/admin-dashboard','Admin\DashboardController@index')->name('admin-dashboard');

//Admin Profile
Route::get('/settings/{id}','Admin\SettingsController@index')->name('settings');
Route::post('/settings','Admin\SettingsController@update');
//Route::post('profile','Admin\UserController@update')->name('profile');
//Route::get('/adduser','Admin\UserController@show')->name('adduser');
//Route::post('/createadmin','Admin\UserController@create')->name('createuser');

//Admin Category
Route::get('/admin_categories','Admin\CategoryController@index')->name('category');
Route::get('/addcategory','Admin\CategoryController@create')->name('addcategory');
Route::post('addcategory','Admin\CategoryController@store')->name('addcategory');
Route::get('/editcategory/{id}','Admin\CategoryController@show')->name('editcategory');
Route::post('/editcategory','Admin\CategoryController@update')->name('editcategory');
Route::get('/deletecategory','Admin\CategoryController@destroy')->name('delete');

//search category
Route::get('/search_category','Admin\SearchController@result')->name('category_search');


//Admin Users
Route::get('/admin-users','Admin\UserController@index')->name('profile');


//Product mgt.
Route::get('/admin-products','Admin\ProductController@index')->name('product');
Route::get('/addproduct','Admin\ProductController@create')->name('addproduct');
Route::post('/addproduct','Admin\ProductController@store')->name('addproduct');
Route::get('/productsearch','Admin\ProductController@result');
Route::get('/editproduct/{id}','Admin\ProductController@edit')->name('editproduct');
Route::post('/editproduct','Admin\ProductController@update')->name('editproduct');
Route::get('/deleteproduct','Admin\ProductController@destroy')->name('deleteproduct');
Route::get('/productnumber','Admin\ProductController@paginate');

//Services Mgt.
Route::get('/services','Admin\ServiceController@index')->name('services');
Route::get('/addservice','Admin\ServiceController@create')->name('addservice');
Route::post('/addservice','Admin\ServiceController@store')->name('addservice');
Route::get('/editservice/{id}','Admin\ServiceController@show')->name('editservice');
Route::post('/editservice','Admin\ServiceController@update')->name('editservice');
Route::get('/deleteservice','Admin\ServiceController@destroy')->name('deleteservice');
Route::get('/servicesearch','Admin\ServiceController@results')->name('servicesearch');
Route::get('/servicenumber','Admin\ServiceController@paginate');

//Orders Mgt.
Route::get('/admin-productorderz','Admin\ProductOrderController@index')->name('admin.orders');
Route::get('/admin-vieworder/{id}','Admin\ProductOrderController@edit')->name('orderedit');
Route::get('/cancelorder','Admin\OrderController@destroy')->name('cancel');
Route::get('/ordersearch','Admin\ProductOrderController@result');

//Training mgt.
Route::get('/admin-trainingz','Admin\TrainingController@index')->name('training');
Route::get('/addtraining','Admin\TrainingController@create');
Route::post('/addtraining','Admin\TrainingController@store');
Route::get('/edittraining/{id}','Admin\TrainingController@edit');
Route::post('/edittraining','Admin\TrainingController@update');
Route::get('/deletetraining','Admin\TrainingController@destroy');

//Reviews Mgt.
Route::get('/admin-productreviewz','Admin\ReviewsController@index')->name('adminReviews');
Route::get('/deletereview','Admin\ReviewsController@destroy');

Route::get('/servicereviews','Admin\ReviewsController@service');
Route::get('/deleteservicereview','Admin\ReviewsController@destroyService');

Route::get('/trainingreviews','Admin\ReviewsController@training');
Route::get('/deletetrainingreview','Admin\ReviewsController@destroyTraining');

//Issues mgt.
Route::get('/issues','Admin\IssuesController@index');





