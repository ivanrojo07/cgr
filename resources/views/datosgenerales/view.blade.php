@extends('layouts.infocliente')
	@section('cliente')
	<ul role="tablist" class="nav nav-tabs">
		<li  role="presentation"><a href="{{ route('clientes.show',['cliente'=>$cliente]) }}">Dirección/Domicilio:</a></li>
		@if ($cliente->tipo == 'Cliente')
			{{-- expr --}}
		<li id="lidir" role="presentation"><a href="{{ route('clientes.direccion.index',['cliente'=>$cliente]) }}" >Direccion Fiscal:</a></li>
		<li id="licont" role="presentation"><a href="{{ route('clientes.contactos.index',['cliente'=>$cliente]) }}">Contactos</a></li>
		<li id="lidat"  class="active" role="presentation"><a href="{{ route('clientes.datos.index',['cliente'=>$cliente]) }}">Datos Generales</a></li>
		@endif
		<li role="presentation"><a href="{{ route('clientes.crm.index',['cliente'=>$cliente]) }}" class="disabled">C.R.M.</a></li>
	</ul>
	<div class="panel panel-default">
	 	<div class="panel-heading">Datos Generales:</div>
	 	<div class="panel-body">
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="nombre">Tamaño de la empresa:</label>
					<dd>{{$datos->tamano}}</dd>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="nombre">Giro de la empresa:</label>
	 				@if ($datos->giro == null)
	 					{{-- expr --}}
	 					<dd>Sin definir</dd>
	 				@else

					<dd>{{$datos->giro->nombre}}</dd>
	 				@endif
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="nombre">Forma de contacto:</label>
	 				@if ($datos->contacto == null)
	 					{{-- true expr --}}
	 					<dd>Sin definir</dd>
	 				@else
	 					{{-- false expr --}}
	 				<dd>{{$datos->contacto->nombre}}</dd>
	 				@endif
	 			</div>
	 		</div>
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="web">Sitio web:</label>
	 				<dd><a href="{{$datos->web}}" target="_blank">{{$datos->web}}</a></dd>
	 			</div>

	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="comentario">Comentarios:</label>
	 				<dd>{{$datos->comentario}}</dd>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
	 				<dd>{{$datos->fechacontacto}}</dd>
	 			</div>
	 		</div>
 		<a class="btn btn-info" href="{{ route('clientes.datos.edit',['cliente'=>$cliente,'datos'=>$datos]) }}">
 			<strong>Editar</strong></a>
	 	</div>
	</div>
	@endsection