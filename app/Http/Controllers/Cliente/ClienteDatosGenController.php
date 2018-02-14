<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\ClienteDatosGen;
use App\FormaContacto;
use App\Giro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ClienteDatosGenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        //
        $datos = $cliente->datoGen;
        if ($datos == null) {
            # code...
            return redirect()->route('clientes.datos.create',['cliente'=>$cliente]);;

        } else {
            # code...
            return view('datosgenerales.view',['cliente'=>$cliente,'datos'=>$datos]);

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
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        $datos = new ClienteDatosGen;
        return view('datosgenerales.create',['cliente'=>$cliente,'giros'=>$giros,'formaContactos' =>$formaContactos, 'datos'=>$datos,'edit'=>false]);
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
        $datos = ClienteDatosGen::create($request->all());
        Alert::success('Datos generales creado con éxito');
        return redirect()->route('clientes.datos.index',['cliente'=>$cliente]);
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
        $datos = $cliente->datoGen;
        return view('datosgenerales.view',['datos'=>$datos,'cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, $datos)
    {
        //
        $datos = ClienteDatosGen::find($datos);
        // dd($datos);
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        return view('datosgenerales.create',['cliente'=>$cliente,'datos'=>$datos,'giros'=>$giros,'formaContactos'=>$formaContactos, 'datos'=>$datos,'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente, $datos)
    {
        //
        $datos = ClienteDatosGen::find($datos);
        $datos->update($request->all());
        Alert::success('Datos generales actualizados con éxito');
        return redirect()->route('clientes.datos.index',['cliente'=>$cliente,'datos'=>$datos]);
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
