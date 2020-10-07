<?php

namespace App\Http\Controllers;

use App\pagos;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['pagos']=\DB::select('SELECT clientes.id,clientes.nombre,mes,plan.megas,total,created_at FROM pagos
        INNER JOIN clientes on clientes.id=pagos.cliente
        INNER JOIN plan on plan.id=pagos.plan');
        $datosmes['mes']=\DB::table('mes')->get();
        return view('pagos.index',$datos,$datosmes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $buscarcliente=\DB::table('clientes')->get();
        return view('pagos.crear',compact('buscarcliente'));
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
        $datosmes=$request->get('mes');
        $datosCliente=$request->get('cliente');
        $datosplan=$request->get('plan');
        \DB::insert('insert into mes (mes, cliente,year) values (?, ?,?)', 
        [$datosmes,$datosCliente,date("yy") ]);
        $obtenerMes=\DB::select('select mes.id,plan.id as pid,plan.precio from mes
        inner join clientes on clientes.id=mes.cliente
        inner join plan on clientes.plan=plan.id and mes = ? and cliente=? and year=?', [$datosmes,$datosCliente,date("yy") ]);
        //$obtenerPlan=\DB::select('select * from plan where megas = ?', [$datosplan]);
        
        foreach($obtenerMes as $m){
            $obtenerMesf[]=$m->id;
            $obtenerPlanf[]=$m->pid;
            $datostotal[]=$m->precio;
        }
        
        \DB::insert('insert into pagos (cliente, mes,plan,total) values (?, ?,?,?)', 
        [$datosCliente, 
        $obtenerMesf[0],
        $obtenerPlanf[0],
        $datostotal[0] ]);
//        $this->pdf();
        return redirect ('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function show(pagos $pagos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(pagos $pagos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pagos $pagos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(pagos $pagos)
    {
        //
    }

    public function llenado($id)
    {
        $datosALlenar=\DB::select('SELECT clientes.fecha_fac,plan.megas,plan.precio FROM clientes
        INNER JOIN plan ON plan.id=clientes.plan AND clientes.id = ?', [$id]);
        return view('pagos.fill')->with('datosALlenar',$datosALlenar);
    }
    public function pdfm()
    {
        $data['data']=\DB::select('select clientes.nombre,clientes.apellido, mes.mes,plan.megas,plan.precio,pagos.total from pagos
        inner join clientes on clientes.id=pagos.cliente
        inner join plan on plan.id=pagos.plan
        inner join mes on mes.id=pagos.mes ORDER by pagos.id DESC
        LIMIT 1');
        $fecha['fecha'] =[date('d/m/y'),date('dhmiys')];
        $pdf=\PDF::loadView('pagos.pdfm',$data,$fecha);
        $pdf->setPaper([0,0,1000,1500]);
        $nombre=date("dhmiys");
        
        \Storage::put('public/pdf/'.$nombre.'.pdf', $pdf->output());
        \DB::update('update mes set link = ?
        order by id desc limit 1', [$nombre.'.pdf']);
        //return view('pagos.pdf',$data);
        //$this->guardarpdf($pdf,$nombre);
        return $pdf->download($nombre.'.pdf');
    }
    public function pdf()
    {
        $data['data']=\DB::select('select clientes.nombre,clientes.apellido, mes.mes,plan.megas,plan.precio,pagos.total from pagos
        inner join clientes on clientes.id=pagos.cliente
        inner join plan on plan.id=pagos.plan
        inner join mes on mes.id=pagos.mes ORDER by pagos.id DESC
        LIMIT 1');
        $fecha['fecha'] =[date('d/m/y'),date('dhmiys')];
        $pdf=\PDF::loadView('pagos.pdf',$data,$fecha);
        $pdf->setPaper([0,0,1000,1500]);
        $nombre=date("dhmiys");
        
        \Storage::put('public/pdf/'.$nombre.'.pdf', $pdf->output());
        \DB::update('update mes set link = ?
        order by id desc limit 1', [$nombre.'.pdf']);
        //return view('pagos.pdf',$data);
        //$this->guardarpdf($pdf,$nombre);
        return $pdf->download($nombre.'.pdf');
    }

    public function guardarpdf($pdfi,$nombre){
        return $pdfi->stream($nombre.'.pdf');

    }

    public function redireccionar(){
        $data['data']=\DB::select('select clientes.telefono from pagos
        inner join clientes on clientes.id=pagos.cliente
        inner join plan on plan.id=pagos.plan
        inner join mes on mes.id=pagos.mes ORDER by pagos.id DESC
        LIMIT 1');
        return view('pagos.redireccion',$data);
    }

public function verpagos(){
        $data['data']=\DB::select('select * from clientes');
        $pagocliente['pagocliente']=\DB::select('select * from mes');
        return view('pagos.vermes',$data,$pagocliente);
    }
}
