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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();  

/*Route::get('/home', 'HomeController@index')->name('home');*/

/*Route::get('articulos', function () {
    echo "seccion articulos";;
}); */

//Route::group(['prefix' => 'articulos'], function(){

/*Route::get('view/{id}', [
      'uses'  => 'TestController@view',
      'as'    => 'articulovista'


	]);  */

    Route::get('/front',[

        'uses'  =>  'FrontController@index',
        'as'    =>   'front.index'
        
        ]);

	Route::group(['prefix' => 'admin'], function(){


    Route::group(['middleware' => 'admin'], function(){

    Route::resource('users','UsuariosController');    
    Route::get('users/{id}/destroy',[
               'uses'  =>  'UsuariosController@destroy',
                'as'    =>   'admin.users.destroy'
            ]);
    });
	Route::resource('categorias', 'CategoriasController');
	Route::resource('asignaturas', 'AsignaturaController');
	Route::resource('cursos', 'CursosController');    
    //-----------------------------------------------------
    //-----------------------------------------------------
    Route::get('videos/{id}',[
        'uses'  =>  'VideosController@index',
        'as'    =>   'videos.index'
    ]);
    Route::get('videos/create/{id}',[
        'uses'  =>  'VideosController@create',
        'as'    =>   'videos.create'
    ]);
    Route::get('videos/{id}',[
        'uses'  =>  'VideosController@index',
        'as'    =>   'videos.index'
    ]);
    Route::resource('videos', 'VideosController');
    //------------------------------------------------------
    //------------------------------------------------------
    Route::get('capsulas/{id}',[
        'uses'  =>  'CapsulasController@index',
        'as'    =>   'capsulas.index'
    ]);
    Route::get('capsulas/create/{id}',[
        'uses'  =>  'CapsulasController@create',
        'as'    =>   'capsulas.create'
    ]);
    Route::get('capsulas/{id}',[
        'uses'  =>  'CapsulasController@index',
        'as'    =>   'capsulas.index'
    ]);
    Route::resource('capsulas', 'CapsulasController');
    //------------------------------------------------------
    //------------------------------------------------------
    Route::get('materialhs/{id}',[
        'uses'  =>  'MaterialhsController@index',
        'as'    =>   'materialhs.index'
    ]);
    Route::get('materialhs/create/{id}',[
        'uses'  =>  'MaterialhsController@create',
        'as'    =>   'materialhs.create'
    ]);
    Route::get('materialhs/{id}',[
        'uses'  =>  'MaterialhsController@index',
        'as'    =>   'materialhs.index'
    ]);
    Route::resource('materialhs', 'MaterialhsController');
    //------------------------------------------------------
    //------------------------------------------------------
    Route::get('materialcs/{id}',[
        'uses'  =>  'MaterialcsController@index',
        'as'    =>   'materialcs.index'
    ]);
    Route::get('materialcs/create/{id}',[
        'uses'  =>  'MaterialcsController@create',
        'as'    =>   'materialcs.create'
    ]);
    Route::get('materialcs/{id}',[
        'uses'  =>  'MaterialcsController@index',
        'as'    =>   'materialcs.index'
    ]);
    Route::resource('materialcs', 'MaterialcsController');
    //------------------------------------------------------
    //------------------------------------------------------
    Route::get('guias/{id}',[
        'uses'  =>  'GuiasController@index',
        'as'    =>   'guias.index'
    ]);
    Route::get('guias/create/{id}',[
        'uses'  =>  'GuiasController@create',
        'as'    =>   'guias.create'
    ]);
    Route::get('guias/{id}',[
        'uses'  =>  'GuiasController@index',
        'as'    =>   'guias.index'
    ]);
    Route::resource('guias', 'GuiasController');
    //------------------------------------------------------
    //------------------------------------------------------

    //Route::resource('videos', 'VideosController');

	Route::get('categorias/{id}/destroy',[
            'uses'  =>  'CategoriasController@destroy',
            'as'    =>   'categorias.destroy' 

            ]);

	Route::resource('tags', 'TagsController');
	Route::get('tags/{id}/destroy',[
            'uses'  =>  'tagsController@destroy',
            'as'    =>   'tags.destroy' 

            ]);


	Route::resource('articulos', 'ArticulosController');
Route::get('articulos/{id}/destroy',[
            'uses'  =>  'articulosController@destroy',
            'as'    =>   'articulos.destroy' 

            ]);

Route::get('imagenes',[

		'uses'  =>  'ImagenesController@index',
		'as'    =>   'admin.imagenes.index'
		
		]);

Route::get('home', 'HomeController@index')->name('home');

Route::get('access', function(){

echo "hola m";

})->middleware('admin');

Auth::routes();


/*Route::get('admin/auth/login', [

    'uses' =>   'Auth/LoginController@showLoginForm',
    'as'   =>    'admin.auth.login'

    ]);  */


});



