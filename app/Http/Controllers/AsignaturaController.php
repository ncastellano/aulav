<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\asignaturaRequest;
use App\asignatura;
use DB;
use Illuminate\Support\Facades\Auth;

class AsignaturaController extends Controller
{
   public function index(Request $Request)
    {
    	$id_usuario = Auth::id();    	
    	$asignaturas = DB::select('select a.id as id, a.descripcion as descripcion from asignatura a, profesor p, profesor_asignatura pa where a.id = pa.id_asignatura and pa.id_profesor = '.$id_usuario.' group by a.id');
        return view('admin.asignaturas.index')->with('asignaturas', $asignaturas);
    		
    }
}
