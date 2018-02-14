@extends('layouts.blank')
	@section('content') 
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Prospecto/Cliente:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipo">Tipo de Cliente:</label>
			    					<dd>{{ $cliente->tipo }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<dd>{{ $cliente->tipopersona }}</dd>
			  					</div>	
							</div>
							@if ($cliente->tipopersona == "Fisica")
								{{-- expr --}}
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre">* Nombre(s):</label>
			  						<dd>{{$cliente->nombre}}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno">* Apellido Paterno:</label>
			  						<dd>{{ $cliente->apellidopaterno }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<dd>{{ $cliente->apellidomaterno }}</dd>
			  					</div>
							</div>
							@else

							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

			  						<label class="control-label" for="razonsocial">* Razon Social:</label>
			  						<dd>{{ $cliente->razonsocial }}</dd>
			  					</div>
							</div>
							@endif
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="mail">* Correo:</label>
									<dd>{{ $cliente->mail }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="rfc">* RFC:</label>
									<dd>{{ $cliente->rfc }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefono">* Número de Telefono:</label>
									<dd>{{ $cliente->telefono }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="celular">* Número Celular:</label>
									<dd>{{ $cliente->celular }}</dd>
								</div>
							</div>
						</div>
					</div>

				@yield('cliente')
			</div>
		</div>
	@endsection