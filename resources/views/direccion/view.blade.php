@extends('layouts.infocliente')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs">
			<li  role="presentation"><a href="{{ route('clientes.show',['cliente'=>$cliente]) }}">Dirección/Domicilio:</a></li>
			@if ($cliente->tipo == 'Cliente')
				{{-- expr --}}
			<li id="lidir" class="active" role="presentation"><a href="{{ route('clientes.direccion.index',['cliente'=>$cliente]) }}" >Direccion Fiscal:</a></li>
			<li id="licont" role="presentation"><a href="{{ route('clientes.contactos.index',['cliente'=>$cliente]) }}">Contactos</a></li>
			<li id="lidat" role="presentation"><a href="{{ route('clientes.datos.index',['cliente'=>$cliente]) }}">Datos Generales</a></li>
			@endif
			<li role="presentation"><a href="{{ route('clientes.crm.index',['cliente'=>$cliente]) }}" class="disabled">C.R.M.</a></li>
		</ul>
					<div class="panel-default">

						<div class="panel-heading">Dirección Fisica:</div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Calle:</label>
			    					<dd> {{$direccion->calle}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Numero exterior:</label>
			    					<dd> {{$direccion->numext}} </dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numint">Numero interior:</label>
			    					<dd> {{$direccion->numint}} </dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Código Postal:</label>
			    					<dd> {{$direccion->cp}} </dd>
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Colonia:</label>
			  						<dd> {{$direccion->colonia}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
			  						<dd> {{$direccion->municipio}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Ciudad:</label>
			  						<dd> {{$direccion->ciudad}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado">Estado:</label>
			  						<dd> {{$direccion->estado}}</dd>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<dd> {{$direccion->calle1}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<dd> {{$direccion->calle2}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<dd> {{$direccion->referencia}} </dd>
			  					</div>
							</div>
						<a class="btn btn-info" href=" {{ route('clientes.direccion.edit',['cliente'=>$cliente, 'direccion'=>$direccion]) }} ">Editar</a>
						</div>
					</div>
  				</div>
			</form>
		</div>
		@endsection