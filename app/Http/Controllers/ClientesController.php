<?php

namespace App\Http\Controllers;

use App\clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes']=\DB::select('SELECT clientes.id, nombre,apellido,direccion,telefono,clientes.fecha_fac,plan.megas,
        direccion_ip FROM clientes INNER JOIN plan on plan.id=clientes.plan');
        return view('clientes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $buscarplan=\DB::table('plan')->get();
        return view('clientes.crear',compact('buscarplan'));
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
        $datosCliente=request()->except('_token');
        clientes::insert($datosCliente);
        return redirect ('clientes')->with('Mensaje','Cliente agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $buscarcliente=clientes::findOrFail($id);
        $buscarplan=\DB::table('plan')->get();
        return view ('clientes.edit',compact('buscarcliente'),compact('buscarplan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $datosCliente=request()->except(['_token','_method']);
        clientes::where('id','=',$id)->update($datosCliente);
        return redirect ('clientes')->with('Mensaje','Cliente editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        clientes::destroy($id);
        return redirect ('clientes')->with('Mensaje','Cliente Eliminado');
    }
}