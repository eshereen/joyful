<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product Categories
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tags
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Counteries
    Route::apiResource('counteries', 'CounteryApiController');

    // Cities
    Route::apiResource('cities', 'CityApiController');

    // Areas
    Route::apiResource('areas', 'AreaApiController');

    // Shipments
    Route::apiResource('shipments', 'ShipmentApiController');

    // Shipment Companies
    Route::apiResource('shipment-companies', 'ShipmentCompanyApiController');

    // Orders
    Route::post('orders/media', 'OrderApiController@storeMedia')->name('orders.storeMedia');
    Route::apiResource('orders', 'OrderApiController');

    // Coupons
    Route::apiResource('coupons', 'CouponApiController');

    // Sizes
    Route::apiResource('sizes', 'SizeApiController');

    // Sales
    Route::apiResource('sales', 'SaleApiController');
});
