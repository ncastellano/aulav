<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Request;
use App\Imagen;
use App\Articulo;
use App\Categoria;

class Frontcontroller extends Controller
{
    public function index()

    {


    	$articulos= Articulo::orderBy('id','Desc')->paginate(5);
    	$articulos->each(function ($articulos){
    		$articulos->categoria;
    		$articulos->imagenes;
    		
    	});
    	//($articulos);
    	return view('front.index')
    		->with('articulos', $articulos);


    }
}
