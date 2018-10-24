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

Route::post('/subscribe',[
    'uses' => 'EmailController@subscribe',
    'as' => 'subscribe',
]);

Route::get('/',[
    'uses' => 'FrontEndController@index',
    'as' => 'index',
]);

Route::get('/admin/home', function(){
    return redirect('/admin/dashboard');
});

Route::get('/results', function(){
    if (App\Post::first()) {    
    $posts = App\Post::where('title', 'like', '%' . request('query') . '%')->get();
    return view('results')->with('posts', $posts)
                        ->with('title', 'Search results :' . request('query'))
                        ->with('settings', \App\Setting::first())
                        ->with('categories', \App\Category::take(5)->get())
                        ->with('query', request('query'))
                        ->with('user', App\User::first());
    }
    else{
        toastr()->error('No results found!');
        return redirect('/');
    }
    
});

Route::get('/post/{slug}',[
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single',
]);

Route::get('/category/{id}',[
    'uses' => 'FrontEndController@category',
    'as' => 'category.single',
]);

Route::get('/tag/{id}',[
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single',
]);



Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    
    Route::get('/dashboard', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);
    
Route::get('/posts/create', [
    'uses' => 'PostController@create',
    'as' => 'posts.create',
]);

Route::post('/posts/store', [
    'uses' => 'PostController@store',
    'as' => 'posts.store',
]);

Route::get('/category/create', [
    'uses' => 'CategoryController@create',
    'as' => 'category.createmodal',
]);

Route::post('/category/store', [
    'uses' => 'CategoryController@store',
    'as' => 'category.store',
]);

Route::get('/categories', [
    'uses' => 'CategoryController@index',
    'as' => 'categories',
    ]);

Route::get('/category/edit/{id}', [
    'uses' => 'CategoryController@edit',
    'as' => 'category.edit',
]);

Route::get('/category/delete/{id}', [
    'uses' => 'CategoryController@destroy',
    'as' => 'category.delete',
]);
            
Route::post('/category/update/{id}', [
    'uses' => 'CategoryController@update',
    'as' => 'category.update',
]);

Route::get('/posts', [
    'uses' => 'PostController@index',
    'as' => 'posts',
]);

Route::get('/post/delete/{id}', [
    'uses' => 'PostController@destroy',
    'as' => 'posts.delete',
]);

Route::get('/posts/trashed', [
    'uses' => 'PostController@trashed',
    'as' => 'post.trashed',
]);

Route::get('/posts/kill/{id}', [
    'uses' => 'PostController@kill',
    'as' => 'posts.kill',
]);

Route::get('/posts/restore/{id}', [
    'uses' => 'PostController@restore',
    'as' => 'posts.restore',
]);

Route::get('/posts/edit/{id}', [
    'uses' => 'PostController@edit',
    'as' => 'posts.edit',
]);

Route::post('/posts/update/{id}', [
    'uses' => 'PostController@update',
    'as' => 'posts.update',
]);

Route::get('/tags', [
    'uses' => 'TagsController@index',
    'as' => 'tags',
]);

Route::get('/tags/edit/{id}', [
    'uses' => 'TagsController@edit',
    'as' => 'tags.edit',
]);

Route::post('/tags/update/{id}', [
    'uses' => 'TagsController@update',
    'as' => 'tags.update',
]);

Route::get('/tags/delete/{id}', [
    'uses' => 'TagsController@destroy',
    'as' => 'tags.delete',
]);

Route::get('/tags/create', [
    'uses' => 'TagsController@create',
    'as' => 'tags.create',
]);

Route::get('/tags/createmodal', [
    'uses' => 'TagsController@create',
    'as' => 'tags.createmodal',
]);

Route::post('/tags/store', [
    'uses' => 'TagsController@store',
    'as' => 'tags.store',
]);

Route::get('/test', function(){
    return App\User::find(1)->profile;
});

Route::get('/users', [
    'uses' => 'UserController@index',
    'as' => 'users',
]);

Route::get('/users/create', [
    'uses' => 'UserController@create',
    'as' => 'users.create',
]);

Route::post('/users/store', [
    'uses' => 'UserController@store',
    'as' => 'users.store',
]);

Route::get('/users/admin/{id}', [
    'uses' => 'UserController@admin',
    'as' => 'users.admin',
]);

Route::get('/users/admin/{id}', [
    'uses' => 'UserController@admin',
    'as' => 'users.admin',
])->middleware('admin');

Route::get('/users/notadmin/{id}', [
    'uses' => 'UserController@notadmin',
    'as' => 'users.notadmin',
]);

Route::get('/users/profile', [
    'uses' => 'ProfileController@index',
    'as' => 'users.profile',
]);

Route::post('/users/profile/update', [
    'uses' => 'ProfileController@update',
    'as' => 'users.profile.update',
]);

Route::get('/users/delete/{id}', [
    'uses' => 'UserController@destroy',
    'as' => 'users.delete',
]);

Route::get('/settings', [
    'uses' => 'SettingController@index',
    'as' => 'settings',
]);

Route::post('/settings/update', [
    'uses' => 'SettingController@update',
    'as' => 'settings.update',
]);


});
