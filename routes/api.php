<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Products
    Route::resource('products', 'ProductsApiController');

    // Brands
    Route::resource('brands', 'BrandsApiController');

    // Colors
    Route::resource('colors', 'ColorsApiController');

    // Countries
    Route::resource('countries', 'CountriesApiController');

    // Foods
    Route::resource('foods', 'FoodsApiController');

    // Grapes
    Route::resource('grapes', 'GrapesApiController');

    // Regions
    Route::resource('regions', 'RegionsApiController');

    // Taxonomy
    Route::resource('taxonomies', 'TaxonomyApiController');

    // Winemakers
    Route::resource('winemakers', 'WinemakersApiController');

    // Fields
    Route::resource('fields', 'FieldsApiController');

    // Fields Data
    Route::resource('fields-datas', 'FieldsDataApiController');

    // Fields Group
    Route::resource('fields-groups', 'FieldsGroupApiController');

    // Producers
    Route::resource('producers', 'ProducersApiController');
});
