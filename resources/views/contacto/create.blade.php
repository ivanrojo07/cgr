@extends('layouts.infocliente')
@section('cliente')

	<ul role="tablist" class="nav nav-tabs">
		<li  role="presentation"><a href="{{ route('clientes.show',['cliente'=>$cliente]) }}">Dirección/Domicilio:</a></li>
		@if ($cliente->tipo == 'Cliente')
			{{-- expr --}}
		<li id="lidir" role="presentation"><a href="{{ route('clientes.direccion.index',['cliente'=>$cliente]) }}" >Direccion Fiscal:</a></li>
		<li id="licont" class="active" role="presentation"><a href="{{ route('clientes.contactos.index',['cliente'=>$cliente]) }}">Contactos</a></li>
		<li id="lidat" role="presentation"><a href="{{ route('clientes.datos.index',['cliente'=>$cliente]) }}">Datos Generales</a></li>
		@endif
		<li role="presentation"><a href="{{ route('clientes.crm.index',['cliente'=>$cliente]) }}" class="disabled">C.R.M.</a></li>
	</ul>
	<div class="panel panel-default">
		<div class="panel-heading">Contacto: &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</a></div>
			<div class="panel-body">
				@if ($edit == false)
					{{-- true expr --}}
				<form role="form" id="form-contactos" method="POST" action="{{ route('clientes.contactos.store', ['cliente'=>$cliente]) }}">
					<input type="hidden" name="cliente_id" value="{{$cliente->id}}" required>
				@else
					{{-- false expr --}}
					<form role="form" id="form-contactos" method="POST" action="{{ route('clientes.contactos.update', ['cliente'=>$cliente, 'contacto'=>$contacto]) }}">
					<input type="hidden" name="_method" value="PUT">
				@endif
					{{ csrf_field() }}
					<div class="col-xs-offset-10">
						<button type="submit" class="btn btn-success">
							<strong>
						Guardar </strong></button>
						
					</div>	
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre(s):</label>
	    					<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $contacto->nombre }}" required autofocus>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="apater"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido paterno:</label>
	    					<input type="text" class="form-control" id="apater" name="apater" value="{{ $contacto->apater }}" required>
	  					</div>	
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="amater">Apellido materno:</label>
	    					<input type="text" class="form-control" id="amater" name="amater" value="{{ $contacto->amater }}">
	  					</div>		
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="area">Área:</label>
	  						<input type="text" class="form-control" id="area" name="area" value="{{ $contacto->area }}">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="puesto">Puesto:</label>
	  						<input type="text" class="form-control" id="puesto" name="puesto" value="{{ $contacto->puesto }}">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  							<label class="control-label" for="telefono1">Telefono:</label>
	  						<input type="text" class="form-control" id="telefono1" name="telefono1" value="{{ $contacto->telefono1 }}">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="ext1">Extensión:</label>
	  						<input type="text" class="form-control" id="ext1" name="ext1" size="6" value="{{ $contacto->ext1 }}">
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="telefono2">Telefono :</label>
	  						<input type="text" class="form-control" id="telefono2" name="telefono2" value="{{ $contacto->telefono2 }}">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="ext2">Extensión:</label>
	  						<input type="text" class="form-control" id="ext2" name="ext2" value="{{ $contacto->ext2 }}">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="telefonodir"><i class="fa fa-asterisk" aria-hidden="true"></i> Telefono directo:</label>
	  						<input type="text" class="form-control" id="telefonodir" name="telefonodir" value="{{ $contacto->telefonodir }}" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="celular1">Celular:</label>
	  						<input type="text" class="form-control" id="celular1" name="celular1" value="{{ $contacto->celular1 }}">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="celular2">Celular:</label>
	  						<input type="text" class="form-control" id="celular2" name="celular2" value="{{ $contacto->celular2 }}">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="email1"><i class="fa fa-asterisk" aria-hidden="true"></i> Correo electronico:</label>
	  						<input type="email" class="form-control" id="email1" name="email1" value="{{ $contacto->email1 }}" required>
	  					</div>

	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="email2">Correo electronico:</label>
	  						<input type="email" class="form-control" id="email2" name="email2" value="{{ $contacto->email2 }}">
	  					</div>
					</div>
					
				</form>
			</div>
	</div>
@endsection