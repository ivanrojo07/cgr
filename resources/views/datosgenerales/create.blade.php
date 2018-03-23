@extends('layouts.infocliente')
	@section('cliente')
	<ul role="tablist" class="nav nav-tabs">
		<li  role="presentation"><a href="{{ route('clientes.show',['cliente'=>$cliente]) }}">Dirección/Domicilio:</a></li>
		@if ($cliente->tipo == 'Cliente')
			{{-- expr --}}
		<li id="lidir" role="presentation"><a href="{{ route('clientes.direccion.index',['cliente'=>$cliente]) }}" >Direccion Fiscal:</a></li>
		<li id="licont" role="presentation"><a href="{{ route('clientes.contactos.index',['cliente'=>$cliente]) }}">Contactos</a></li>
		<li id="lidat"  class="active" role="presentation"><a href="{{ route('clientes.datos.index',['cliente'=>$cliente]) }}">Datos Generales</a></li>
		@else
		<li id="licont" role="presentation"><a href="{{ route('clientes.contactos.index',['cliente'=>$cliente]) }}">Contactos</a></li>
		<li role="presentation"><a href="{{ route('clientes.crm.index',['cliente'=>$cliente]) }}" class="disabled">C.R.M.</a></li>
		@endif
	</ul>
	<div class="panel panel-default">
	 	<div class="panel-heading">Datos Generales: &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
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
	 		
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>Giro:</label>
	 			 <div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getGiros()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
				<select type="select" name="giro_id" class="form-control" id="giro_id">
					        <option id="0" value="0">Sin Definir</option>
						@foreach ($giros as $giro)
							<option id="'{{$giro->id}}'" value="{{$giro->id}}" @if ($datos->giro != null && $datos->giro->id == $giro->id)
								{{-- true expr --}}
								selected="selected" 
							@endif>{{$giro->nombre}}
						    </option>
						@endforeach
				</select>
			     </div>
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
	 			<div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getFormaContacto()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
					<select type="select" name="forma_contacto_id" class="form-control" id="forma_contacto_id">
						<option id="0" value="0">Sin Definir</option>
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
	 	@if($cliente->tipo == 'Cliente')
	 	<div class="panel-heading jumbotron" style="color: black;"><strong>Nacionalidad:</strong> &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
	 	<div class="panel-body">
	 		<div class="container-fluid">
		 		<div class="row">
		 			<div class="col-sm-3">
		 				<label class="control-label" for="nacionalidad"><i class="fa fa-asterisk" aria-hidden="true"></i>Seleccionar:</label>
		 				<select type="select" class="form-control" id="nacionalidad"
		 				 name="nacionalidad"  onchange="getNal()">
		 					<option id="Mexicano" value="Mexicano" selected="">Mexicano</option>
		 					<option id="Extranjero" value="Extranjero">Extranjero</option>
		 				</select>
		 			</div>
		 			<div class="col-sm-3" id="curp_div">
	 		  		<label class="control-label" for="curp"><i class="fa fa-asterisk" aria-hidden="true"></i>C.U.R.P.
	 		  		</label>
		 				<input type="text" class="form-control" id="curp" name="curp" required>
	 		  	</div>
		 			<div class="col-sm-3" id="pais_div" style="display: none;">
		 				<label class="control-label" for="pais"><i class="fa fa-asterisk" aria-hidden="true"></i>Nacionalidad(País):</label>
		 				<input type="text" class="form-control" id="pais" name="pais">
		 			</div>
		 			<div class="col-sm-3" id="tax_div" style="display: none;">
		 				<label class="control-label" for="tax"><i class="fa fa-asterisk" aria-hidden="true"></i>TAX/RUC/NIT:</label>
		 				<input type="text" class="form-control" id="tax" name="tax">
		 			</div>
		 			 <div class="col-sm-3">
	 		  	 	<div class="col-xs-offset-4">
				<input type="submit" class="btn btn-success">
			        </div>	
	 	          </div>
		 		</div>
		 	</div><br>
	 		<div class="container-fluid" id="nacional_div">
	 		  <div class="row">
	 		  	<div class="col-sm-6">
	 		  		<div class="boton checkbox-disabled">
							<label>

								<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" onchange="datosFisica();">
								¿Usar datos de Dirección Fiscal?.
							</label>
						</div>
	 		  	</div>
	 		  </div>
	 		  <div class="row">
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="calle_nacional"> <i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
	    			<input type="text" class="form-control" id="calle_nacional" name="calle_nacional"  required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="numext_nacional"> <i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
	    			<input type="number" class="form-control" id="numext_nacional" name="numext_nacional" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="numint_nacional">Numero interior:</label>
	    			<input type="text" class="form-control" id="numint_nacional" name="numint_nacional">
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="colonia_nacional"> <i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
	  				<input type="text" class="form-control" id="colonia_nacional" name="colonia_nacional" required>
	 		  	</div>
	 		  </div><br>
	 		  <div class="row">
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="cp_nacional"><i class="fa fa-asterisk" aria-hidden="true"></i>Código postal:</label>
			    	<input type="text" class="form-control" id="cp_nacional" name="cp_nacional"  minlength="5" maxlength="5" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="ciudad_nacional"> <i class="fa fa-asterisk" aria-hidden="true"></i> Ciudad:</label>
	  				<input type="text" class="form-control" id="ciudad_nacional" name="ciudad_nacional" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="estado_nacional"> <i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label>
	  				<input type="text" class="form-control" id="estado_nacional" name="estado_nacional" required>
	 		  	</div>
	 		  </div><br>
	 		  <div class="row">
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="lada_nacional"> <i class="fa fa-asterisk" aria-hidden="true"></i>Teléfono con Lada:</label>
	  				<input type="text" class="form-control" id="lada_nacional" name="lada_nacional" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="correo_generales_nacional">Correo Electrónico:</label>
	  				<input type="email" class="form-control" id="correo_generales_nacional" name="correo_generales_nacional" value="">
	 		  	</div>
	 		  </div>
	 		</div>
	 		<div class="container-fluid" id="extranjero_div"  style="display: none;">
	 			<div class="row">
	 		  	<div class="col-sm-6">
	 		  		<div class="boton checkbox-disabled">
							<label>

								<input id="boton-toggle2" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" onchange="datosExt();">
								¿Usar datos de Dirección Fiscal?.
							</label>
						</div>
	 		  	</div>
	 		  </div>
	 		  <div class="row">
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="calle_extranjero"> <i class="fa fa-asterisk" aria-hidden="true"></i> Calle o Avenida:</label>
	    			<input type="text" class="form-control" id="calle_extranjero" name="calle_extranjero"  required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="numext_extranjero"> <i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
	    			<input type="number" class="form-control" id="numext_extranjero" name="numext_extranjero" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="numint_extranjero">Numero interior:</label>
	    			<input type="text" class="form-control" id="numint_extranjero" name="numint_extranjero">
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="colonia_extranjero"> <i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
	  				<input type="text" class="form-control" id="colonia_extranjero" name="colonia_extranjero" required>
	 		  	</div>
	 		  </div><br>
	 		  <div class="row">
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="cp_extranjero"><i class="fa fa-asterisk" aria-hidden="true"></i>Código postal:</label>
			    	<input type="text" class="form-control" id="cp_extranjero" name="cp_extranjero"  minlength="5" maxlength="5" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="ciudad_extranjero"> <i class="fa fa-asterisk" aria-hidden="true"></i> Ciudad:</label>
	  				<input type="text" class="form-control" id="ciudad_extranjero" name="ciudad_extranjero" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="lugar_residencia"> <i class="fa fa-asterisk" aria-hidden="true"></i>Lugar de Residencia (Personas):</label>
	  				<input type="text" class="form-control" id="lugar_residencia" name="lugar_residencia" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="estado_extranjero"> <i class="fa fa-asterisk" aria-hidden="true"></i>Estado o Departamento:</label>
	  				<input type="text" class="form-control" id="estado_extranjero" name="estado_extranjero" required>
	 		  	</div>
	 		  </div><br>
	 		  <div class="row">
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="telefono_extranjero"> <i class="fa fa-asterisk" aria-hidden="true"></i>Número Telefónico:</label>
	  				<input type="text" class="form-control" id="telefono_extranjero" name="telefono_extranjero" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="correo_generales_extranjero">Correo electrónico:</label>
	  				<input type="email" class="form-control" id="correo_generales_extranjero" name="correo_generales_extranjero" value="">
	 		  	</div>
	 		  </div>
	 		</div>
	 	</div>
	 	<div class="panel-heading jumbotron" style="color: black;"><strong>Datos de Contacto para Cobros:</strong>&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
	 	<div class="panel-body">
	 		<div class="container-fluid" id="cobros_nacional_div">
	 			<div class="row">
	 				<div class="col-sm-3">
	 		  		<label class="control-label" for="nombre_cobros_nacional"> <i class="fa fa-asterisk" aria-hidden="true"></i>Nombre:</label>
	  				<input type="text" class="form-control" id="nombre_cobros_nacional" name="nombre_cobros_nacional" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="puesto_cobros_nacional"> <i class="fa fa-asterisk" aria-hidden="true"></i>Puesto:</label>
	  				<input type="text" class="form-control" id="puesto_cobros_nacional" name="puesto_cobros_nacional" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="telefono_cobros_nacional"> <i class="fa fa-asterisk" aria-hidden="true"></i>Teléfono:</label>
	  				<input type="text" class="form-control" id="telefono_cobros_nacional" name="telefono_cobros_nacional" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="ext_cobros_nacional">Extención:</label>
	  				<input type="text" class="form-control" id="ext_cobros_nacional" name="ext_cobros_nacional">
	 		  	</div>
	 			</div><br>
	 			<div class="row">
	 			  <div class="col-sm-3">
	 		  		<label class="control-label" for="correo_cobros_nacional">Correo electronico:</label>
	  				<input type="email" class="form-control" id="correo_cobros_nacional" name="correo_cobros_nacional">
	 		  	  </div>
	 		  	  <div class="col-sm-3">
	 		  	  	<label class="control-label" for="fecha_cobros_nacional">Día de Revisión y Pago:</label>
	  				<input type="date" class="form-control" id="fecha_cobros_nacional" name="fecha_cobros_nacional" value="{{date('Y-m-d')}}">
	 		  	  </div>
	 			</div>
	 		</div>
	 		<div class="container-fluid" id="cobros_extranjero_div" style="display: none;"> 
	 			<div class="row">
	 				<div class="col-sm-3">
	 		  		<label class="control-label" for="nombre_cobros_extranjero"> <i class="fa fa-asterisk" aria-hidden="true"></i>Nombre:</label>
	  				<input type="text" class="form-control" id="nombre_cobros_extranjero" name="nombre_cobros_extranjero" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="puesto_cobros_extranjero"> <i class="fa fa-asterisk" aria-hidden="true"></i>Puesto o Área:</label>
	  				<input type="text" class="form-control" id="puesto_cobros_extranjero" name="puesto_cobros_extranjero" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="telefono_cobros_extranjero"> <i class="fa fa-asterisk" aria-hidden="true"></i>Teléfono:</label>
	  				<input type="text" class="form-control" id="telefono_cobros_extranjero" name="telefono_cobros_extranjero" required>
	 		  	</div>
	 		  	<div class="col-sm-3">
	 		  		<label class="control-label" for="ext_cobros_extranjero">Extención:</label>
	  				<input type="text" class="form-control" id="ext_cobros_extranjero" name="ext_cobros_extranjero">
	 		  	</div>
	 			</div><br>
	 			<div class="row">
	 			  <div class="col-sm-3">
	 		  		<label class="control-label" for="correo_cobros_extranjero">Correo electronico:</label>
	  				<input type="email" class="form-control" id="correo_cobros_extranjero" name="correo_cobros_extranjero">
	 		  	  </div>
	 		  	  <div class="col-sm-3">
	 		  	  	<label class="control-label" for="fecha_cobros_extranjero">Día de Recepción de Facturas:</label>
	  				<input type="date" class="form-control" id="fecha_cobros_extranjero" name="fecha_cobros_extranjero" value="{{date('Y-m-d')}}">
	 		  	  </div>
	 		  	  <div class="col-sm-3">
	 		  	  	<label class="control-label" for="dias_pagos_extranjero">Días de Pago:</label>
	  				<input type="text" class="form-control" id="dias_pagos_extranjero" name="dias_pagos_extranjero">
	 		  	  </div>
	 			</div>
	 		</div>
	 	</div>
	 	<div class="panel-heading jumbotron" style="color: black;"><strong>Información Bancaria:</strong>&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
	 	<div class="panel-body">
	 		<div class="container-fluid" id="bancaria_nacional_div">
	 			<div class="row">
	 			   <div class="col-sm-3">
	 		  		<label class="control-label" for="banco_nacional"><i class="fa fa-asterisk" aria-hidden="true"></i>Nombre del Banco:</label>
	  				<input type="text" class="form-control" id="banco_nacional" name="banco_nacional">
	 		  	 </div>
	 		  	  <div class="col-sm-3">
	 		  		<label class="control-label" for="plaza_nacional">Plaza:</label>
	  				<input type="text" class="form-control" id="plaza_nacional" name="plaza_nacional">
	 		  	 </div>
	 		  	 <div class="col-sm-3">
	 		  		<label class="control-label" for="sucursal_nacional">Sucursal:</label>
	  				<input type="text" class="form-control" id="sucursal_nacional" name="sucursal_nacional">
	 		  	 </div>
	 		  	 <div class="col-sm-3">
	 		  		<label class="control-label" for="cuenta_nacional"><i class="fa fa-asterisk" aria-hidden="true"></i>Número de Cuenta:</label>
	  				<input type="text" class="form-control" id="cuenta_nacional" name="cuenta_nacional">
	 		  	 </div>
	 			</div><br>
	 			<div class="row">
	 				<div class="col-sm-3">
	 		  		<label class="control-label" for="rfc_banco_nacional"><i class="fa fa-asterisk" aria-hidden="true"></i>R.F.C. del Banco:</label>
	  				<input type="text" class="form-control" id="rfc_banco_nacional" name="rfc_banco_nacional">
	 		  	 </div>
	 		  	 <div class="col-sm-3">
	 		  		<label class="control-label" for="clabe_nacional"><i class="fa fa-asterisk" aria-hidden="true"></i>CLABE Interbancaria:</label>
	  				<input type="text" class="form-control" id="clabe_nacional" name="clabe_nacional">
	 		  	 </div>
	 		  	 <div class="col-sm-3">
	 		  		<label class="control-label" for="metodo_pago_nacional"><i class="fa fa-asterisk" aria-hidden="true"></i>Método de Pago:</label>
	  				<input type="text" class="form-control" id="metodo_pago_nacional" name="metodo_pago_nacional">
	 		  	 </div>
	 		  	 <div class="col-sm-3">
	 		  		<label class="control-label" for="forma_pago_nacional"><i class="fa fa-asterisk" aria-hidden="true"></i>Forma de Pago:</label>
	  				<input type="text" class="form-control" id="forma_pago_nacional" name="forma_pago_nacional">
	 		  	 </div>
	 			</div><br>
	 			<div class="row">
	 				<div class="col-sm-3">
	 		  		<label class="control-label" for="cfdi_nacional"><i class="fa fa-asterisk" aria-hidden="true"></i>Uso del CFDI:</label>
	  				<input type="text" class="form-control" id="cfdi_nacional" name="cfdi_nacional">
	 		  	 </div>
	 		  	
	 			</div><br>
	 		</div>
	 		<div class="container-fluid" id="bancaria_extranjero_div" style="display: none;">
	 			<div class="row">
	 			   <div class="col-sm-3">
	 		  		<label class="control-label" for="banco_extranjero"><i class="fa fa-asterisk" aria-hidden="true"></i>Nombre del Banco:</label>
	  				<input type="text" class="form-control" id="banco_extranjero" name="banco_extranjero">
	 		  	 </div>
	 		  	  <div class="col-sm-3">
	 		  		<label class="control-label" for="plaza_extranjero">Plaza:</label>
	  				<input type="text" class="form-control" id="plaza_extranjero" name="plaza_extranjero">
	 		  	 </div>
	 		  	 <div class="col-sm-3">
	 		  		<label class="control-label" for="sucursal_extranjero">Sucursal:</label>
	  				<input type="text" class="form-control" id="sucursal_extranjero" name="sucursal_extranjero">
	 		  	 </div>
	 		  	 <div class="col-sm-3">
	 		  		<label class="control-label" for="cuenta_extranjero"><i class="fa fa-asterisk" aria-hidden="true"></i>Número de Cuenta:</label>
	  				<input type="text" class="form-control" id="cuenta_extranjero" name="cuenta_extranjero">
	 		  	 </div>
	 			</div><br>
	 			<div class="row">
	 				<div class="col-sm-3">
	 		  		<label class="control-label" for="clave_internacional_extranjero"><i class="fa fa-asterisk" aria-hidden="true"></i>Clave Internacional Tranferencias:</label>
	  				<input type="text" class="form-control" id="clave_internacional_extranjero" name="clave_internacional_extranjero">
	 		  	 </div>
	 		  	 <div class="col-sm-3">
	 		  		<label class="control-label" for="aba_extranjero"><i class="fa fa-asterisk" aria-hidden="true"></i>ABA:</label>
	  				<input type="text" class="form-control" id="aba_extranjero" name="aba_extranjero">
	 		  	 </div>
	 		  	 <div class="col-sm-3">
	 		  		<label class="control-label" for="swift_extranjero"><i class="fa fa-asterisk" aria-hidden="true"></i>SWIFT:</label>
	  				<input type="text" class="form-control" id="swift_extranjero" name="swift_extranjero">
	 		  	 </div>
	 		  	 
	 		  	</div><br>
	 		</div>
	 			  </form>
	 	
	 	<div class="panel-heading jumbotron " style="color: black;"><strong>Carga de Documentos:</strong>&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Documentos Requeridos</div>
	 	<div class="panel-body">
	 		<div class="container-fluid">
	 			<div class="row">
	 				<div class="col-sm-4 form-group">

	 					<label class="control-label" for="carta_encomienda"><i class="fa fa-asterisk" aria-hidden="true"></i>Carta Encomienda Actualizada:</label>
	 					<input type="file" class="file" id="carta_encomienda" name="carta_encomienda">
	 				</div>
	 				<div class="col-sm-4">
	 					<label class="control-label" for="encargo_conferido"><i class="fa fa-asterisk" aria-hidden="true"></i>Formato Encargo Conferido:</label>
	 					<input type="file" class="file" id="encargo_conferido" name="encargo_conferido" >
	 				</div>
	 				<div class="col-sm-4">
	 					<label class="control-label" for="padron_importadores"><i class="fa fa-asterisk" aria-hidden="true"></i>Registro Padrón de Importadores:</label>
	 					<input type="file" class="file" id="padron_importadores" name="padron_importadores" >
	 				</div>
	 			</div><br>
	 			<div class="row">
	 				<div class="col-sm-4">
	 					<label class="control-label" for="acta_constitutiva"><i class="fa fa-asterisk" aria-hidden="true"></i>Acta Constitutiva Empresa:</label>
	 					<input type="file" class="file" id="acta_constitutiva" name="acta_constitutiva" >
	 				</div>
	 				<div class="col-sm-4">
	 					<label class="control-label" for="constancia_fiscal"><i class="fa fa-asterisk" aria-hidden="true"></i>Constancia Situación Fiscal:</label>
	 					<input type="file" class="file" id="constancia_fiscal" name="constancia_fiscal" >
	 				</div>
	 				<div class="col-sm-4">
	 					<label class="control-label" for="cedula_fiscal"><i class="fa fa-asterisk" aria-hidden="true"></i>Cédula Fiscal:</label>
	 					<input type="file" class="file" id="cedula_fiscal" name="cedula_fiscal" >
	 				</div>
	 				
	 			</div><br>
	 			<div class="row">
	 				<div class="col-sm-4">
	 					<label class="control-label" for="comprobante_domicilio"><i class="fa fa-asterisk" aria-hidden="true"></i>Comprobante de Domicilio:</label>
	 					<input type="file" class="file" id="comprobante_domicilio" name="comprobante_domicilio" >
	 				</div>
	 				<div class="col-sm-4">
	 					<label class="control-label" for="identificacion_oficial">Identificación Oficial:</label>
	 					<input type="file" class="file" id="identificacion_oficial" name="identificacion_oficial" >
	 				</div>
	 				<div class="col-sm-4">
	 					<label class="control-label" for="copia_curp"><i class="fa fa-asterisk" aria-hidden="true"></i>C.U.R.P:</label>
	 					<input type="file" class="file" id="copia_curp" name="copia_curp" >
	 				</div>
	 				
	 			</div><br>
	 			<div class="row">
	 				<div class="col-sm-4">
	 					<label class="control-label" for="copia_rfc"><i class="fa fa-asterisk" aria-hidden="true"></i>R.F.C:</label>
	 					<input type="file" class="file" id="copia_rfc" name="copia_rfc" >
	 				</div>
	 				<div class="col-sm-4">
	 					<label class="control-label" for="poder_notarial"><i class="fa fa-asterisk" aria-hidden="true"></i>Poder Notarial Representante:</label>
	 					<input type="file" class="file" id="poder_notarial" name="poder_notarial" >
	 				</div>
	 				<div class="col-sm-4">
	 					<label class="control-label" for="immex_proec"><i class="fa fa-asterisk" aria-hidden="true"></i>IMMEX/PROSEC/SICEX:</label>
	 					<input type="file" class="file" id="immex_proec" name="immex_proec" >
	 				</div>
	 				
	 			</div><br>
	 			<div class="row">
	 				<div class="col-sm-4">
	 					<label class="control-label" for="r1_r2">R1 y R2:</label>
	 					<input type="file" class="file" id="r1_r2" name="r1_r2" >
	 				</div>
	 				<div class="col-sm-4">
	 		  	 	<div class="col-xs-offset-5"><br>
				<button  class="btn btn-primary">
			<strong>Enviar</strong>
			</button>
				
			</div>	
	 		  	 </div>
	 		  
	 		  	 </div>
	 			</div>
	 		</div>
	 	</div>
	
	 	@endif
	 	
	 	</div>
	</div>
	@endsection
	<script type="text/javascript">
//---------------------------------------------------------------
		// input type url agree http:// in automatic
		function checkURL (abc) {
  			var string = abc.value;
  			if (!~string.indexOf("http")) {
    			string = "http://" + string;
  			}
  			abc.value = string;
  			return abc
		}

		function getGiros(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getgiros') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#giro_id").html(resultado);
			});
		}

		function getFormaContacto(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getformas') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#forma_contacto_id").html(resultado);
			});
		}
//---------------------------------------------------------------
		function getNal(){

  
var seleccion=document.getElementById('nacionalidad').value;
 if (seleccion=='Mexicano') {
      document.getElementById('pais_div').style.display='none';
       $('#pais').prop('required',false);
      document.getElementById('curp_div').style.display='block';
      $('#curp').prop('required',true);
      document.getElementById('tax_div').style.display='none';
       $('#tax').prop('required',false);
      document.getElementById('nacional_div').style.display='block';
      document.getElementById('extranjero_div').style.display='none';
      document.getElementById('cobros_nacional_div').style.display='block';
      document.getElementById('cobros_extranjero_div').style.display='none';
      document.getElementById('bancaria_nacional_div').style.display='block';
      document.getElementById('bancaria_extranjero_div').style.display='none';
 }else{
 	document.getElementById('pais_div').style.display='block';
 	$('#pais').prop('required',true);
 	document.getElementById('curp_div').style.display='none';
      $('#curp').prop('required',false);
    document.getElementById('tax_div').style.display='block';
       $('#tax').prop('required',true);
    document.getElementById('nacional_div').style.display='none';
    document.getElementById('extranjero_div').style.display='block';
    document.getElementById('cobros_nacional_div').style.display='none';
    document.getElementById('cobros_extranjero_div').style.display='block';
    document.getElementById('bancaria_nacional_div').style.display='none';
    document.getElementById('bancaria_extranjero_div').style.display='block';
 }

		}
//---------------------------------------------------------------
function datosFisica(){
                if($('#boton-toggle').prop('checked') == true){
                	

                	document.getElementById('calle_nacional').value = "{{$cliente->direccion->calle}}";
               		document.getElementById('numext_nacional').value = "{{$cliente->direccion->numext}}";
                	document.getElementById('numint_nacional').value = "{{$cliente->direccion->numinter}}";
                	document.getElementById('colonia_nacional').value = "{{$cliente->direccion->colonia}}";
                	document.getElementById('cp_nacional').value ="{{$cliente->direccion->cp}}";
                	document.getElementById('ciudad_nacional').value = "{{$cliente->direccion->ciudad}}";
                	document.getElementById('estado_nacional').value = "{{$cliente->direccion->estado}}";
                	document.getElementById('lada_nacional').value = "{{$cliente->telefono}}";

				}
				else if($('#boton-toggle').prop('checked') == false){
					
                    document.getElementById('calle_nacional').value = "";
               		document.getElementById('numext_nacional').value = "";
                	document.getElementById('numint_nacional').value = "";
                	document.getElementById('colonia_nacional').value = "";
                	document.getElementById('cp_nacional').value ="";
                	document.getElementById('ciudad_nacional').value = "";
                	document.getElementById('estado_nacional').value = "";
                	document.getElementById('lada_nacional').value = "";
				}
            }
//---------------------------------------------------------------
function datosExt(){
                if($('#boton-toggle2').prop('checked') == true){
                	
                	//alert('FISCAL');
                	document.getElementById('calle_extranjero').value = "{{$cliente->direccion->calle}}";
               		document.getElementById('numext_extranjero').value = "{{$cliente->direccion->numext}}";
                	document.getElementById('numint_extranjero').value = "{{$cliente->direccion->numinter}}";
                	document.getElementById('colonia_extranjero').value = "{{$cliente->direccion->colonia}}";
                	document.getElementById('cp_extranjero').value ="{{$cliente->direccion->cp}}";
                	document.getElementById('ciudad_extranjero').value = "{{$cliente->direccion->ciudad}}";
                	document.getElementById('estado_extranjero').value = "{{$cliente->direccion->estado}}";
                	document.getElementById('telefono_extranjero').value = "{{$cliente->telefono}}";

				}
				else if($('#boton-toggle2').prop('checked') == false){
					
                    document.getElementById('calle_extranjero').value = "";
               		document.getElementById('numext_extranjero').value = "";
                	document.getElementById('numint_extranjero').value = "";
                	document.getElementById('colonia_extranjero').value = "";
                	document.getElementById('cp_extranjero').value ="";
                	document.getElementById('ciudad_extranjero').value = "";
                	document.getElementById('estado_extranjero').value = "";
                	document.getElementById('telefono_extranjero').value = "";
				}
            }
//---------------------------------------------------------------

	</script>
	@section('scripts')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    

    {{-- expr --}}
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
    <script src="{{ asset('js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('js/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('js/plugins/purify.min.js') }}"></script>
    <script src=""></script>
    <!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script src="{{ asset('js/locales/es.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>
        $(':input.file').fileinput({
            theme: 'fa',
            language: 'es',
            showUpload:false,
            required: true,
            showCancel:false,
            showCaption:false,
            allowedFileExtensions: ["pdf", "jpg", "jpeg", "png"],
        });
    </script>
@endsection