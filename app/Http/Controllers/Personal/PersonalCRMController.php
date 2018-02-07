<?php

namespace App\Http\Controllers\Personal;

use App\CRM;
use App\Http\Controllers\Controller;
use App\Personal;
use Illuminate\Http\Request;

class PersonalCRMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Personal $cliente)
    {
        //
        
        $crms = $cliente->crm;
        return view('crm.index',['personal'=>$cliente, 'crms'=>$crms]);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Personal $cliente)
    {
        //
        // dd($request->all());
        $crm = CRM::create($request->all());
        return redirect()->route('clientes.crm.index',['personal'=>$cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $cliente, $crm)
    {
        //
        $crm = CRM::findOrFail($crm);
        return view('clientes.view',['personal'=>$cliente,'crm'=>$crm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }
}
