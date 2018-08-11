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

// appelle simple
Route::get('salut', function ()
{
    return "helloooo";
});

// lorsque vous donnez un nom d route
Route::get('salut/{slug}-{id}',['as' => 'salut', function ($slug, $id)
{
    return "Lien : " . route('salut', ['slug'=> $slug, 'id'=> $id]);
}])->where('slug','[a-z0-9\-]+')->where('id','[0-9]+');

// lorsque vous groupez dans un seul prefix et donnez aussi le middleware
Route::group(['prefix' => 'admin','middleware' => 'ip'],function(){

    Route::get('salut', function(){
        return 'helloooo guys';
    });

});

Route::get('/', function () {
    return view('welcome');
});
Route::get('login',['as'=> 'login', function () {
    return view('login');
}]);
Route::get('cont/{name}', 'HelloController@index');

Route::get('a-propos', 'PagesController@about');

Route::resources([
    'try' => 'TryController',
]);
//raccourcisseur d'URL
/* Route::get('links/create','LinksController@create');
Route::post('links/create','LinksController@store');
Route::get('r/{id}','LinksController@show')->where('id', '[0-9]+');
*/
// pour remplacer ces 3 routes il suffit d'utiliser : mais seulement pour create et store
Route::resource('links','LinksController',['only' => ['create','store']]);
// ms il faut changer action du formulaire en create.blade.php
// pour ajouter celle de show on la créer manuellement mais on lui donne un nom pour que sera facile à appeler et on change variable id
Route::get('r/{link}',['as' => 'links.show','uses' => 'LinksController@show'])->where('link', '[0-9]+');


Route::resource('news','PostsController');

Route::get('contact',['as' => 'contact','uses' => 'PagesController@contact']);