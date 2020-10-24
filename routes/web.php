<?php




Route::group(['middleware' => ['auth']], function(){

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){


        Route::resource('stores', 'StoreController');
    
        Route::resource('products', 'ProductController');
         
        
        
       
    
    });
});


// Route::resource('products', 'Admin\\UserController');




// Route::prefix('admin')->namespace('Admin')->group(function(){
//     Route::prefix('users')->group(function(){

//         Route::get('/', 'UserController@index')->name('users.index');
//         Route::get('/create', 'UserController@create')->name('users.create');
//         Route::post('/store', 'UserController@store')->name('users.store');
       

//     });
// });

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
