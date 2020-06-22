<?php

namespace App\Http\Controllers;

use App\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=\DB::select('select id,picture,name,email,password from users');
        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $buscarusuario=\DB::table('users')->find($id);
        return view('usuarios.edit',compact('buscarusuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $datosUsuario=request()->except(['_token','_method']);
        if($request->hasFile('picture')){
            //Buscamos la foto anterior
            $fotos=\DB::table('users')->find($id);
            //Eliminamos la foto anterior
            Storage::delete('public/'.$fotos->picture);
            //Ingresamos la nueva foto
            $datosUsuario['picture']=$request->file('picture')->store('profile','public');
        }
        \DB::table('users')->where('id',$id)->update($datosUsuario);
        return redirect ('usuarios')->with('Mensaje','Usuario editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        \DB::table('users')->where('id','=',$id)->delete();
        return redirect ('usuarios')->with('Mensaje','Usuario Eliminado');
    }
}
