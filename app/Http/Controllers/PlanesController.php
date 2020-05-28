<?php

namespace App\Http\Controllers;

use App\planes;
use Illuminate\Http\Request;

class PlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['planes']=\DB::table('plan')->get();
        return view('planes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('planes.crear');
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
        $datosPlan=request()->except('_token');
        \DB::table('plan')->insert($datosPlan);
        return redirect ('planes')->with('Mensaje','Plan agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function show(planes $planes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $buscarplan=\DB::table('plan')->find($id);
        return view('planes.edit',compact('buscarplan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $datosPlan=request()->except(['_token','_method']);
        \DB::table('plan')->where('id',$id)->update($datosPlan);
        return redirect ('planes')->with('Mensaje','Plan editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        \DB::table('plan')->where('id','=',$id)->delete();
        return redirect ('planes')->with('Mensaje','Plan Eliminado');
    }
}
