@extends('layouts.infocliente')
@section('cliente')
<ul role="tablist" class="nav nav-tabs">
	<li role="presentation"><a href="{{ route('clientes.show',['cliente'=>$cliente]) }}">Dirección/Domicilio:</a></li>
	@if ($cliente->tipo == 'Cliente')
		{{-- expr --}}
	<li id="lidir" role="presentation"><a href="{{ route('clientes.direccion.index',['cliente'=>$cliente]) }}" >Direccion Fiscal:</a></li>
	<li id="licont" class="active" role="presentation"><a href="{{ route('clientes.contactos.index',['cliente'=>$cliente]) }}">Contactos</a></li>
	<li id="lidat" role="presentation"><a href="{{ route('clientes.datos.index',['cliente'=>$cliente]) }}">Datos Generales</a></li>
	@endif
	<li role="presentation"><a href="{{ route('clientes.crm.index',['cliente'=>$cliente]) }}" class="disabled">C.R.M.</a></li>
</ul>
<div class="panel panel-default">
	<div class="panel-heading">
		Contactos:
	</div>
	<div class="panel-body">
		<div class="form-group col-lg-offset-11">
			<a type="button" class="btn btn-success" href="{{ route('clientes.contactos.create',['cliente'=>$cliente]) }}">
				<strong>Agregar</strong>
			</a>
		</div>
	@if (count($contactos) == 0)
		<h3>Aún no tienes contactos</h3>
	@endif
	@if (count($contactos) !=0)
		
	<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>Nombre del contacto</th>
					<th>Telefono Directo</th>
					<th>Celular</th>
					<th>Correo Electronico</th>
					<th>Operaciones</th>
				</tr>
			</thead>
			@foreach ($contactos as $contacto)
				<tr class="active">
					<td>{{ $contacto->nombre }} {{$contacto->apater}} {{$contacto->amater}}</td>
					<td>{{$contacto->telefonodir}}</td>
					<td>{{$contacto->celular1}}</td>
					<td>{{$contacto->email1}}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('clientes.contactos.show',['cliente'=>$cliente,'contacto'=>$contacto]) }}">
						<strong>Ver</strong>
					</a>
						<a class="btn btn-info btn-sm" href="{{ route('clientes.contactos.edit',['cliente'=>$cliente,'contacto'=>$contacto]) }}">
						<strong>Editar</strong>
					</a>
				</tr>
					</td>
				</tbody>
			@endforeach
		</table>
	@endif
	
	</div>
</div>
@endsection