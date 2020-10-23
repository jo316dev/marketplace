<?php




Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::prefix('stores')->group(function(){

        Route::get('/', 'StoreController@index')->name('stores.index');
        Route::get('/create', 'StoreController@create')->name('stores.create');
        Route::post('/store', 'StoreController@store')->name('stores.store');
        Route::get('/{idStore}/edit', 'StoreController@edit')->name('stores.edit');
        Route::post('/update/{idStore}', 'StoreController@update')->name('stores.update');
        Route::get('/delete/{idStore}', 'StoreController@delete')->name('stores.delete');
        

        
    });

    Route::resource('products', 'ProductController');
     
    
    
   

});


// Route::resource('products', 'Admin\\UserController');




Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::prefix('users')->group(function(){

        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::post('/store', 'UserController@store')->name('users.store');
       

    });
});


