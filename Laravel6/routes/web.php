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

// Route::get('/{path?}', [
//     'uses' => 'HomeController@index',
//     'as' => 'react',
//     'where' => ['path' => '.*']
// ]);


Route::group(['prefix' => 'blog'], function () {

    Route::get('/{path?}', [
        'uses' => 'HomeController@index',
        'as' => 'react',
        'where' => ['path' => '.*']
    ]);

});


Route::group(['prefix' => 'api'], function () {

    Route::get('/posts', 'PostContoller@apiShowPosts');

    Route::get('/catogries', 'CategoryController@apiShowCatogries');

    Route::get('/tags', 'TagContoller@apiShowtags');

});

Route::middleware(['auth'])->group(function() {
    Route::get('/todos', ['as' => 'todosList', 'uses' => 'Todos@index']);
    Route::get('/new-todo',['as'=>'newTodo','uses'=>'Todos@create']);
    
    Route::get('/todos/{todo}','Todos@show');
    Route::post('/store-todo','Todos@store');
    Route::get('/todos/{todo}/edit','Todos@edit');
    Route::post('/update-todo','Todos@update');
    
    
    Route::resource('catogries','CategoryController');
    Route::resource('posts','PostContoller');
    Route::resource('tags','TagContoller');
    Route::get('/trashed-posts', ['as' => 'trashed-posts','uses'=> 'PostContoller@trashed']);
    Route::get('/posts/restore/{id}', ['as' => 'posts.restore','uses'=> 'PostContoller@restore']);

});

Auth::routes();
    
Route::get('/', 'HomeController@index')->name('home');

