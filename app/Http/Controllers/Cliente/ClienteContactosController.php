<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\ClienteContactos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;


class ClienteContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        //
        $contactos = $cliente->contactos;
        return view('contacto.index',['cliente'=>$cliente,'contactos'=>$contactos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        //
        $contacto= new ClienteContactos;
        return view('contacto.create',['cliente'=>$cliente, 'contacto'=>$contacto,'edit'=>false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cliente $cliente,Request $request)
    {
        //
        $contacto = ClienteContactos::create($request->all());
        Alert::success('Contacto creado con éxito');
        return redirect()->route('clientes.contactos.index',['cliente'=>$cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente,ClienteContactos $contacto)
    {
        //
        // $contacto = ClienteContactos::findOrFail($contacto);
        return view('contacto.view',['cliente'=>$cliente,'contacto'=>$contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, ClienteContactos $contacto)
    {
        //
        // $contacto = ClienteContactos::findOrFail($contacto);
        return view('contacto.create',['cliente'=>$cliente,'contacto'=>$contacto,'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente, ClienteContactos $contacto)
    {
        //
        // $contacto = ClienteContactos::findOrFail($contacto);
        $contacto->update($request->all());
        Alert::success('Contacto actualizado con éxito');
        return redirect()->route('clientes.contactos.index',['cliente'=>$cliente]);
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
