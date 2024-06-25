<?php
Route::get('/','WelcomeController@index')->name('welcome');
Route::get('/link', function () {        
   $target = '/home/zyaramnz/joyfulegy.com/joyfulegy/storage/app/public';
   $shortcut = '/home/zyaramnz/joyfulegy.com/storage';
   symlink($target, $shortcut);
});
//Route::get('/','WelcomeController@soon')->name('soon');
Route::redirect('/login', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
/**************Front End Pages********/

Route::get('/about','WelcomeController@about')->name('about');
Route::post('/contact','WelcomeController@contact')->name('contact');
Route::get('/palm-wax','WelcomeController@palm')->name('palm');
Route::get('/privacy','WelcomeController@privacy')->name('privacy');
Route::get('/terms','WelcomeController@terms')->name('terms');
Route::get('/candle-care','WelcomeController@candle_care')->name('candle_care');


 // Products
 Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
 Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
 Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
 Route::resource('products', 'ProductController');

//Cart
Route::get('/add-to-cart/{product}','ProductController@addToCart')->name('product.add');
Route::get('/cart/increase/{rowId}','CartController@increaseQty')->name('cart.increase');
Route::get('/cart/decrease/{rowId}','CartController@decreaseQty')->name('cart.decrease');
Route::get('/cart/remove/{rowId}','CartController@remove')->name('cart.remove');

Route::get('/cart','CartController@cart')->name('cart.show');
//Coupon
Route::get('cart/coupone/destroy','CartController@sessionFlush')->name('coupon.destroy');
Route::post('cart/coupone','CartController@check')->name('coupon.check');
//Shipping
Route::post('cart/shipping','CartController@checkShipment')->name('shipment.check');
Route::get('cart/shipping/destroy','CartController@sessionShipmentFlush')->name('shipment.destroy');

//Checkout
Route::get('/areas/get/{id}','CheckoutController@getShipment')->name('shipment_area');

Route::get('checkout','CheckoutController@index')->name('checkout.index');
//Order
Route::post('checkout','CheckoutController@order')->name('order');
//Thankyou
Route::get('thankyou','CheckoutController@thanks')->name('thanks');






/************************End Of front end pages******************/
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Product Categories
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tags
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Products
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Counteries
    Route::delete('counteries/destroy', 'CounteryController@massDestroy')->name('counteries.massDestroy');
    Route::resource('counteries', 'CounteryController');

    // Cities
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Areas
    Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');
    Route::resource('areas', 'AreaController');

    // Shipments
    Route::delete('shipments/destroy', 'ShipmentController@massDestroy')->name('shipments.massDestroy');
    Route::resource('shipments', 'ShipmentController');

    // Shipment Companies
    Route::delete('shipment-companies/destroy', 'ShipmentCompanyController@massDestroy')->name('shipment-companies.massDestroy');
    Route::resource('shipment-companies', 'ShipmentCompanyController');

    // Orders
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::post('orders/media', 'OrderController@storeMedia')->name('orders.storeMedia');
    Route::post('orders/ckmedia', 'OrderController@storeCKEditorImages')->name('orders.storeCKEditorImages');
    Route::resource('orders', 'OrderController');

    // Coupons
    Route::delete('coupons/destroy', 'CouponController@massDestroy')->name('coupons.massDestroy');
    Route::resource('coupons', 'CouponController');

    // Sizes
    Route::delete('sizes/destroy', 'SizeController@massDestroy')->name('sizes.massDestroy');
    Route::resource('sizes', 'SizeController');

    // Sales
    Route::delete('sales/destroy', 'SaleController@massDestroy')->name('sales.massDestroy');
    Route::resource('sales', 'SaleController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
