<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\materialcRequest;
use App\materialcs;
use DB;
use Illuminate\Support\Facades\Auth;

class MaterialcsController extends Controller
{
    public function index($id)
    {   
    	$id_usuario = Auth::id();
    	//$asignatura = materialcs::find($id);
        $asignatura = DB::table('asignatura')->where('id', '=', $id)->get();
    	$materialcs = DB::select('select p.id as id, p.titulo as titulo, p.descripcion as descripcion, Observacion, archivo, url  from asignatura a, publicacion p, profesor_asignatura pa where '.$id.'=pa.id_asignatura and p.id_profesor='.$id_usuario.' and p.id_tipo_publicacion = 3 group by p.id');
        return view('admin.materialcs.index')->with('materialcs', $materialcs)->with('asignatura', $asignatura);    		
    }

    /*
    * @return Response
    */
    public function create($id)
    {
       return view('admin.materialcs.create')->with('id', $id);
    }   
     /*
     * @return Response
     */
    public function store(materialcRequest $request)
    {
        $file = $request->file('url');
        
        //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));
        $materialcs = new materialcs($request->all());
        //dd($asignaturas);
        $materialcs->save();
        Flash::success('El vídeo ' . $materialcs->titulo . ' ha sido guardado con éxito!');
        return redirect("admin/materialcs/" . $request->id_asignatura);  
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
    	$materialcs = materialcs::find($id);
    	return view('admin.materialcs.edit')->with('materialc', $materialcs);        
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
        $materialcs= materialcs::find($id);
        $materialcs->titulo = $request->titulo;
        $materialcs->descripcion = $request->descripcion;
        $materialcs->Observacion = $request->Observacion;
        $materialcs->save();

        Flash::warning('El material ' . $materialcs->titulo . ' ha  sido editado con exito!');
        return redirect("admin/materialcs/" . $id_asignatura);
    }

    /**
     * Elimina una empresa del sistema.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $materialc= materialcs::find($id);
        //dd($user);   lo muestra si lo consigue
        $materialc->delete();
        Flash::error('El material '  . $materialc->titulo .  ' ha sido borrado de forma exitosa!' );
        return redirect()->route('materialcs.index');
    }
}