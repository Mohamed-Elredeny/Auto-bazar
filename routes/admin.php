<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'isAdmin'],function(){


    Route::get('/', function () {
    return redirect()->route('admin.admins.index');
    })->name('admin.home');

    Route::resource('admins','Admin\AdminController'); //1
    Route::resource('vendors','Admin\VendorController'); //1
    Route::resource('profileMaintenance','Admin\ProfileMaintenanceController'); //1


    Route::resource('advandages','Admin\AdvandageController'); //2 done
    Route::resource('carsRentals','Admin\CarsRentalProductController'); //2 done
    Route::resource('categories','Admin\CategoryController'); //done
    Route::resource('cities','Admin\CityController'); //done
    Route::resource('districts','Admin\DistrictController'); //done
    Route::resource('fuelTypes','Admin\FuelTypeController'); //done
    Route::resource('gearboxes','Admin\GearboxController'); //done
    Route::resource('maintenanceCenters','Admin\MaintenanceCenterController'); //done
    Route::resource('makes','Admin\MakeController'); //done

    Route::resource('products','Admin\ProductController'); //2 done
    Route::get('products/create/{rent}/{category_id}','Admin\ProductController@create')->name('products.create'); //2 done
    Route::get('products/{rent}/{category_id}','Admin\ProductController@index')->name('products.index'); //2 done

    Route::resource('sections','Admin\SectionController'); //done
    Route::resource('sellTypes','Admin\SellTypeController'); //done
    Route::resource('specializations','Admin\SpecializationController'); //2 done
    Route::resource('statuses','Admin\StatusController'); //2 done
    Route::resource('subcategories','Admin\SubcategoryController'); //2 done
    Route::resource('subsriptions','Admin\SubsriptionController'); //1
    Route::resource('typeCategories','Admin\TypeCategoryController'); //2 done
    Route::resource('users','Admin\UsersController'); //1
    Route::resource('spareParts','Admin\sparePartsController'); //2 done
    Route::resource('generators','Admin\generatorsController'); //2 done
    Route::resource('advertisements','Admin\AdvertisementController');
    Route::resource('shopTypes','Admin\ShoptypeController');

    Route::get('users/export/qasass', 'Admin\MakeController@export');

});
