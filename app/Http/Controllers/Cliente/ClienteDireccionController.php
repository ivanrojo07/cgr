<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\ClienteDireccion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ClienteDireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        //
        $direccion = $cliente->direccion;
        if($direccion == null){
            return redirect()->route('clientes.direccion.create',['cliente'=>$cliente]);
        }
        else{
            return view('direccion.view',['cliente'=>$cliente,'direccion'=>$direccion]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        //
        $direccion = new ClienteDireccion;
        return view('direccion.create',['cliente'=>$cliente, 'direccion'=>$direccion,'edit'=>false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cliente $cliente)
    {
        //
        $direccion = ClienteDireccion::create($request->all());
        Alert::success('Dirección creada con éxito');
        return redirect()->route('clientes.direccion.index',['cliente'=>$cliente]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
        $direccion = $cliente->direccion;
        return view('direccion.view',['direccion'=>$direccion,'cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
        $direccion = $cliente->direccion;
        return view('direccion.create',['cliente'=>$cliente,'direccion'=>$direccion, 'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente, ClienteDireccion $direccion)
    {
        //
        $cliente->direccion->update($request->all());
        Alert::success('Direccion actualizada con éxito');
        return redirect()->route('clientes.direccion.index',['cliente'=>$cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
