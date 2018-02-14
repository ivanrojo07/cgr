<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Cliente::sortable()->paginate(5);
        return view('clientes.index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $cliente= new Cliente();
        return view('clientes.create',['cliente'=>$cliente,'edit'=>$edit]);
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
        $rfc = Cliente::where('rfc', $request->rfc)->get();
        if (count($rfc)!=0) {
            # code...
            return redirect()->back()->with('errors','El RFC ya existe');                               
        } else {
            # code...

            $cliente = Cliente::create($request->all());
            if ($request['tipo'] == 'Cliente') {
                Alert::success('Cliente creado con éxito', 'Siga agregando información');
                return redirect()->route('clientes.direccion.index', ['cliente'=>$cliente]);
            }
            if($request['tipo'] == 'Prospecto') {
                Alert::success('Prospecto creado con éxito');
                return redirect()->route('clientes.crm.index');
            }   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
        return view('clientes.view',['cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
        $edit=true;
        return view('clientes.create',['cliente'=>$cliente,'edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
        $cliente->update($request->all());
        Alert::success('Datos actualizados');
        return redirect()->route('clientes.show',['cliente'=>$cliente]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
