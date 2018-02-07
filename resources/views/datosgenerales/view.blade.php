@extends('layouts.infocliente')
	@section('cliente')
	<ul role="tablist" class="nav nav-tabs">
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('clientes.show',['cliente'=>$personal]) }}">Dirección Fisica:</a></li>
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('clientes.direccionfisica.index',['cliente'=>$personal]) }}">Dirección Fiscal:</a></li>
		<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('clientes.contacto.index',['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
		<li class="active"><a href="{{ route('clientes.datosgenerales.index',['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
		<li class=""><a href="{{ route('clientes.crm.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">C.R.M.:</a></li>
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
					<dd>{{$giro->nombre}}</dd>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="nombre">Forma de contacto:</label>
	 				<dd>{{$formaContacto->nombre}}</dd>
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
 		<a class="btn btn-info" href="{{ route('clientes.datosgenerales.edit',['cliente'=>$personal,'datosgenerale'=>$datos]) }}">
 			<strong>Editar</strong></a>
	 	</div>
	</div>
	@endsection