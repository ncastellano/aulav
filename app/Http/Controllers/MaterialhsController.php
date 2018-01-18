<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\materialhRequest;
use App\materialhs;
use DB;
use Illuminate\Support\Facades\Auth;

class MaterialhsController extends Controller
{
    public function index($id)
    {   
    	$id_usuario = Auth::id();
    	//$asignatura = materialhs::find($id);
        $asignatura = DB::table('asignatura')->where('id', '=', $id)->get();
    	$materialhs = DB::select('select p.id as id, p.titulo as titulo, p.descripcion as descripcion, Observacion, archivo, url  from asignatura a, publicacion p, profesor_asignatura pa where '.$id.'=pa.id_asignatura and p.id_profesor='.$id_usuario.' and p.id_tipo_publicacion = 5 group by p.id');
        return view('admin.materialhs.index')->with('materialhs', $materialhs)->with('asignatura', $asignatura);    		
    }

    /*
    * @return Response
    */
    public function create($id)
    {
       return view('admin.materialhs.create')->with('id', $id);
    }   
     /*
     * @return Response
     */
    public function store(materialhRequest $request)
    {
        $file = $request->file('url');
        
        //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));
        $materialhs = new materialhs($request->all());
        //dd($asignaturas);
        $materialhs->save();
        Flash::success('El Proyecto ' . $materialhs->titulo . ' ha sido guardado con éxito!');
        return redirect("admin/materialhs/" . $request->id_asignatura);  
    }
    /**
     * Muestra la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        
    }
    public function edit($id)
    {
    	//dd($user);
    	$materialhs = materialhs::find($id);
    	return view('admin.materialhs.edit')->with('materialh', $materialhs);        
    }

    /**
     * Actualiza la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
     public function update(request $request,$id)
    {

        $id_asignatura = DB::select('select id_asignatura from where id='.$id);
        $materialhs= materialhs::find($id);
        $materialhs->titulo = $request->titulo;
        $materialhs->descripcion = $request->descripcion;
        $materialhs->Observacion = $request->Observacion;
        $materialhs->save();

        Flash::warning('El proyecto ' . $materialhs->titulo . ' ha  sido editado con exito!');
        return redirect("admin/materialhs/" . $id_asignatura);
    }

    /**
     * Elimina una empresa del sistema.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $materialh= materialhs::find($id);
        //dd($user);   lo muestra si lo consigue
        $materialh->delete();
        Flash::error('El proyecto '  . $materialh->titulo .  ' ha sido borrado de forma exitosa!' );
        return redirect()->route('materialhs.index');
    }
}