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
	 	<div class="panel-heading">Datos Generales: &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</a></div>
	 	@if ($edit == false)
	 		{{-- true expr --}}
		<form role="form" id="form-datos" method="POST" action="{{ route('clientes.datos.store',['cliente'=>$cliente]) }}" name="form">
	 		<input type="hidden" name="cliente_id" value="{{$cliente->id}}">
	 		
	 	@else
	 		{{-- false expr --}}
	 	<form role="form" id="form-datos" method="POST" action="{{ route('clientes.datos.update',['cliente'=>$cliente, 'datos'=>$datos]) }}" name="form">
	 		<input type="hidden" name="_method" value="PUT">
	 	@endif
			{{ csrf_field() }}
	 	<div class="panel-body">
	 		<div class="col-xs-offset-10">
				<button type="submit" class="btn btn-success">
			<strong>	Guardar</strong>
			</button>
				
			</div>	
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>Giro:</label>
				<select type="select" name="giro_id" class="form-control" id="giro_id">
						@foreach ($giros as $giro)
							<option id="'{{$giro->id}}'" value="{{$giro->id}}" @if ($datos->giro != null && $datos->giro->id == $giro->id)
								{{-- true expr --}}
								selected="selected" 
							@endif>{{$giro->nombre}}</option>
						@endforeach
				</select>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
					<select type="select" name="tamano" class="form-control" id="tamano">
						<option id="micro" value="micro" @if ($datos->tamano == "micro")
							{{-- expr --}}
							selected="selected" 
						@endif>Micro</option>
						<option id="pequeña" value="pequeña" @if ($datos->tamano == "pequeña")
							{{-- expr --}}
							selected="selected" 
						@endif>Pequeña</option>
						<option id="mediana" value="mediana" @if ($datos->tamano == "mediana")
							{{-- expr --}}
							selected="selected" 
						@endif>Mediana</option>
						<option id="grande" value="grande" @if ($datos->tamano == "grande")
							{{-- expr --}}
							selected="selected" 
						@endif>Grande</option>
					</select>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="forma_contacto_id"><i class="fa fa-asterisk" aria-hidden="true"></i>Forma de contacto:</label>
					<select type="select" name="forma_contacto_id" class="form-control" id="forma_contacto_id">
						@foreach ($formaContactos as $formaContacto)
							{{-- expr --}}
							<option id="{{$formaContacto->id}}" value="{{ $formaContacto->id }}" @if ($datos->contacto != null && $datos->contacto->id == $formaContacto->id)
								{{-- expr --}}
								selected="selected" 
							@endif>{{ $formaContacto->nombre }}</option>
						@endforeach
					</select>
	 			</div>
	 		</div>
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="web">Sitio web:</label>
	 				<input type="url" class="form-control" id="web" name="web" onblur="checkURL(this)" value="{{ $datos->web }}" autofocus>
	 			</div>

	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="comentario">Comentarios:</label>
	 				<textarea  class="form-control" rows="5" id="comentario" name="comentario">{{ $datos->comentario }}</textarea>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="fechacontacto"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha de contacto:</label>
	 				<input type="date" class="form-control" id="fechacontacto" name="fechacontacto" value="{{ $datos->fechacontacto }}">
	 			</div>
	 		</div>
	 	</div>
	 	</form>
	 	</div>
	</div>
	@endsection
	<script type="text/javascript">
		// input type url agree http:// in automatic
		function checkURL (abc) {
  			var string = abc.value;
  			if (!~string.indexOf("http")) {
    			string = "http://" + string;
  			}
  			abc.value = string;
  			return abc
		}
	</script>