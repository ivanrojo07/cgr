@extends('layouts.blank')
	@section('content')
		<div class="container" id="tab">
			@if ($edit == false)
				{{-- expr --}}
			<form role="form" id="form-cliente" method="POST" action="{{ route('clientes.store') }}" name="form">
			@endif
			@if ($edit == true)
				{{-- expr --}}
			<form role="form" id="form-cliente" method="POST" action="{{ route('clientes.update',['cliente'=>$cliente]) }}">
				<input type="hidden" name="_method" value="PUT">
			@endif
				{{ csrf_field() }}
				<div role="application" class="panel panel-group">
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Cliente/Prospecto:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipo"><i class="fa fa-asterisk" aria-hidden="true"></i>Tipo de Cliente:</label>
			    					<select type="select" name="tipo" class="form-control" id="tipo" onchange="formulario(this)">
			    						<option id="Prospecto" value="Prospecto" @if ($cliente->tipo == 'Prospecto')
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>Prospecto</option>
			    						<option id="Cliente" value="Cliente" @if ($cliente->tipo == 'Cliente')
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>Cliente</option>
			    					</select>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona"><i class="fa fa-asterisk" aria-hidden="true"></i>Tipo de Persona:</label>
			    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
			    						<option id="Fisica" value="Fisica" @if ($cliente->tipopersona == 'Fisica')
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>Fisica</option>
			    						<option id="Moral" value="Moral" @if ($cliente->tipopersona == 'Moral')
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>Moral</option>
			    					</select>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="prioridad">Prioridad:</label>
			    					<select type="select" name="prioridad" class="form-control" id="prioridad">
			    						<option id="Baja" value="Baja" @if ($cliente->prioridad == 'Baja')
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>Baja</option>
			    						<option id="Mediana" value="Mediana" @if ($cliente->prioridad == 'Mediana')
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>Mediana</option>
			    						<option id="Alta" value="Alta" @if ($cliente->prioridad == 'Alta')
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>Alta</option>
			    					</select>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calificacion">Calificación:</label>
			    					<select type="select" name="calificacion" class="form-control" id="calificacion" onchange="persona(this)">
			    						<option id="1" value=1 @if ($cliente->calificacion == 1)
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>1</option>
			    						<option id="2" value=2 @if ($cliente->calificacion == 2)
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>2</option>
			    						<option id="3" value=3 @if ($cliente->calificacion == 3)
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>3</option>
			    						<option id="4" value=4 @if ($cliente->calificacion == 4)
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>4</option>
			    						<option id="5" value=5 @if ($cliente->calificacion == 5)
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>5</option>
			    						<option id="6" value=6 @if ($cliente->calificacion == 6)
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>6</option>
			    						<option id="7" value=7 @if ($cliente->calificacion == 7)
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>7</option>
			    						<option id="8" value=8 @if ($cliente->calificacion == 8)
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>8</option>
			    						<option id="9" value=9 @if ($cliente->calificacion == 9)
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>9</option>
			    						<option id="10" value=10 @if ($cliente->calificacion == 10)
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>10</option>
			    					</select>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre(s):</label>
			  						<input type="text" class="form-control" id="idnombre" name="nombre" value="{{ $cliente->nombre }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido Paterno:</label>
			  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" value="{{ $cliente->apellidopaterno }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno" value="{{ $cliente->apellidomaterno }}">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="permoral" style="display:none;">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

			  						<label class="control-label" for="razonsocial"><i class="fa fa-asterisk" aria-hidden="true"></i> Razon Social:</label>
			  						<input type="text" class="form-control" id="razonsocial" name="razonsocial" value="{{ $cliente->razonsocial }}">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="mail"><i class="fa fa-asterisk" aria-hidden="true"></i> Correo:</label>
									<input type="email" class="form-control" id="mail" name="mail" value="{{ $cliente->mail }}" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="rfc"><i class="fa fa-asterisk" aria-hidden="true"></i> RFC:</label>
									<input type="text" class="form-control" id="varrfc" name="rfc" required minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" placeholder="Ingrese 13 caracteres" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres" value="{{ $cliente->rfc }}" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefono"><i class="fa fa-asterisk" aria-hidden="true" value></i> Número de Telefono:</label>
									<input type="text" class="form-control" id="telefonofijo" name="telefono" value="{{ $cliente->telefono }}" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="celular"><i class="fa fa-asterisk" aria-hidden="true"></i> Número Celular:</label>
									<input type="text" class="form-control" id="celular" name="celular" value="{{ $cliente->celular }}" required>
								</div>
							</div>
						</div>
					</div>
					@if ($edit == false)
						{{-- expr --}}
				<ul role="tablist" class="nav nav-tabs">
					<li class="active" role="presentation"><a href="#">Dirección/Domicilio:</a></li>
					<li id="lidir" class="disabled" style="display:none;" role="presentation"><a href="#" class="disabled" id="clienteli1">Direccion Fiscal:</a></li>
					<li id="licont" class="disabled" disabled style="display:none;" role="presentation"><a href="#" class="disabled">Contactos</a></li>
					<li id="lidat" class="disabled" id="clienteli3" style="display:none;" role="presentation"><a href="#" class="disabled">Datos Generales</a></li>
					<li class="disabled"  role="presentation"><a href="#" class="disabled">C.R.M.</a></li>
				</ul>
					@endif
					@if ($edit == true)
						{{-- expr --}}
				<ul role="tablist" class="nav nav-tabs">
					<li class="active" role="presentation"><a href="#">Dirección/Domicilio:</a></li>
					<li id="lidir" @if ($cliente->tipo == "Cliente")
						{{-- expr --}}
						style="display:inline;"
					@else
						style="display:none;" class="disabled"
					@endif role="presentation"><a @if ($cliente->tipo == "Cliente")
						{{-- true expr --}}
						href="{{ route('clientes.direccion.index',['cliente'=>$cliente]) }}"
					@else
						{{-- false expr --}}
						href="#" class="disabled" 
					@endif id="clienteli1">Direccion Fiscal:</a></li>
					<li id="licont" @if ($cliente->tipo == "Cliente")
						{{-- expr --}}
						style="display:inline;"
					@else
						style="display:none;" class="disabled" 
					@endif role="presentation"><a @if ($cliente->tipo == "Cliente")
						{{-- true expr --}}
						href="{{ route('clientes.contactos.index',['cliente'=>$cliente]) }}"
					@else
						{{-- false expr --}}
						href="#" class="disabled" 
					@endif>Contactos</a></li>
					<li id="lidat" id="clienteli3" @if ($cliente->tipo == "Cliente")
						{{-- expr --}}
						style="display:inline;"
					@else
						style="display:none;" class="disabled"
					@endif role="presentation"><a @if ($cliente->tipo == "Cliente")
						{{-- true expr --}}
						href="{{ route('clientes.datos.index',['cliente'=>$cliente]) }}"
					@else
						{{-- false expr --}}
						href="#" class="disabled" 
					@endif>Datos Generales</a></li>
					<li role="presentation"><a href="{{ route('clientes.crm.index',['cliente'=>$cliente]) }}" class="disabled">C.R.M.</a></li>
				</ul>
					@endif
				<div class="panel-default">
					<div class="panel-heading">Dirección/Domicilio:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
					<div class="panel-body">
						<div class="col-xs-2 col-xs-offset-10">
								<button type="submit" class="btn btn-success">
									<strong>Guardar</strong></button>
								
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="calle" id="lbl_calle">Calle:</label>
								<input type="text" class="form-control" id="calle" name="calle" value="{{ $cliente->calle }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="numext" id="lbl_numext">Número Exterior:</label>
								<input type="text" class="form-control" id="numext" name="numext" value="{{ $cliente->numext }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="numinter">Número Interior:</label>
								<input type="text" class="form-control" id="numinter" name="numinter" value="{{ $cliente->numinter }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="cp" id="lbl_cp">Código Postal:</label>
								<input type="text" class="form-control" id="cp" name="cp" value="{{ $cliente->cp }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="colonia" id="lbl_colonia">Colonia:</label>
								<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $cliente->colonia }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="municipio" id="lbl_municipio">Municipio/Delegación:</label>
								<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $cliente->municipio }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="ciudad" id="lbl_ciudad">Ciudad:</label>
								<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $cliente->ciudad }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="estado" id="lbl_estado">Estado:</label>
								<input type="text" class="form-control" id="estado" name="estado" value="{{ $cliente->estado }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="calle1">Entre calle:</label>
								<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $cliente->calle1 }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="calle2">Y calle:</label>
								<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $cliente->calle2 }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="referencia">Referencia:</label>
								<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $cliente->referencia }}">
							</div>
						</div>
					</div>
				</div>
  				</div>
			</form>
		</div>
	@endsection