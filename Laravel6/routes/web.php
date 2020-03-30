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

Route::middleware(['auth'])->group(function() {
    Route::get('/todos', ['as' => 'todosList', 'uses' => 'Todos@index']);
    Route::get('/new-todo',['as'=>'newTodo','uses'=>'Todos@create']);
    
    Route::get('/todos/{todo}','Todos@show');
    Route::post('/store-todo','Todos@store');
    Route::get('/todos/{todo}/edit','Todos@edit');
    Route::post('/update-todo','Todos@update');
    
    
    Route::resource('catogries','CategoryController');
    Route::resource('posts','PostContoller');
    Route::get('/trashed-posts', ['as' => 'trashed-posts','uses'=> 'PostContoller@trashed']);
    Route::get('/posts/restore/{id}', ['as' => 'posts.restore','uses'=> 'PostContoller@restore']);

    Route::get('/home',['as'=> 'home','uses'=>'HomeController@index']);
    Route::get('/data',['as'=> 'data','uses'=>'DataController@index']);

});

Auth::routes();
    
// Route::get('/home', 'HomeController@index')->name('home');

