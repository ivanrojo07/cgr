<?php

namespace App\Http\Controllers\Personal;

// use UxWeb\SweetAlert\Alert;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Http\Controllers\Controller;
use App\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    // use Alert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personals = Personal::sortable()->paginate(5);
        // Alert::message('Robots are working!');
        return view('clientes.index', ['personals'=>$personals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
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
        $personal = Personal::where('rfc',$request->rfc)->get();
        // dd(count($personal));
        if (count($personal) != 0) {
            # code...
            // alert()->error('Error Message', 'Optional Title');
            // return redirect()->route('clientes.create');
            return redirect()->back()->with('errors', 'El RFC ya existe');
        } else {
            # code...
            $cliente = Personal::create($request->all());
            Alert::success("Cliente creado con exito, sigue agregando información")->persistent("Cerrar");
            return redirect()->route('clientes.direccionfisica.create',['personal'=>$cliente]);
             
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $cliente)
    {
        
        return view('clientes.view',['personal'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $cliente)
    {
        //
        return view('clientes.edit',['personal'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $cliente)
    {
        //
        $cliente->update($request->all());
        Alert::success('Cliente actualizado')->persistent("Cerrar");
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $cliente)
    {
        //
    }
    public function buscar(Request $request){
    // dd($request);
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $clientes = Personal::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',"%$word%")
                ->orWhere('apellidopaterno','LIKE',"%$word%")
                ->orWhere('apellidomaterno','LIKE',"%$word%")
                ->orWhere('razonsocial','LIKE',"%$word%");
                // ->orWhere('rfc','LIKE',"%$word%");
                // ->orWhere('alias','LIKE',"%$word%");
                // ->orWhere('tipopersona','LIKE',"%$word%")
            }
        })->get();
    return view('clientes.busqueda', ['personals'=>$clientes]);
        

    }


}
