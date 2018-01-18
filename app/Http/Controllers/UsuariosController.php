<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\User;
use App\img_user;
use Laracasts\Flash\Flash;
class UsuariosController extends Controller
{

    public function index()
    {

    	//dd("hola");
      $users = User::orderBy('id', 'ASC')->paginate(5); // metodo paginate indica que mostra de 5 en 5 en la vista.
       return view('admin.users.index')->with('users',$users);
    }


    /**
     * Muestra el formulario para crear una nueva empresa.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.users.create');
    }

    /**
     * Guarda la nueva empresa creada.
     *
     * @return Response
     */
    public function store(UsuarioRequest $request)
    {
    	//dd($request->all());   //muestra todos los valores que se envian del formulario.

        $file = $request->file('image');
        $name = 'imag_' . time() .'.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images_n/users';
        $file->move($path, $name);

        $user = new User($request->all());
        $user -> password = bcrypt($request -> password);
        dd($user);
        $user -> save();

        $image =  new img_user();
        $image->nombre =$name;
        $image->user()->associate($user);
        $image->save();
         //dd($user);
        //dd('Usuario Creado');
        Flash::success("se  ha registrado a ". $user->name ." de forma exitosa!");
        return redirect()->route('users.index');  
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

    /**
     * Muestra el formulario para modificar la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
    	//dd($user);
    	$user = User::find($id);
    	return view('admin.users.edit')->with('user', $user);
        
    }

    /**
     * Actualiza la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
    public function update(request $request,$id)
    {
       //dd($request->all());
    	$user= User::find($id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->type = $request->type;
    	$user->save();

    	Flash::warning('El usuario ' . $user->name . ' ha  sido editado con exito!');
    	return redirect()->route('users.index');
    }

    /**
     * Elimina una empresa del sistema.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //dd($id);

        $user= User::find($id);
        //dd($user);   lo muestra si lo consigue
        $user->delete();
        Flash::error('El usuario '  . $user->name .  ' ha sido borrado de forma exitosa!' );
        return redirect()->route('users.index');
    }

}
