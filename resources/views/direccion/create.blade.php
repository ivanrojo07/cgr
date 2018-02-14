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
			<div class="panel panel-default">
				@if ($edit == false)
					{{-- true expr --}}
			<form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('clientes.direccion.store', ['cliente'=>$cliente]) }}" name="form">
			 <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
				@else
					{{-- false expr --}}
			<form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('clientes.direccion.update', ['cliente'=>$cliente, 'direccion'=>$direccion]) }}" name="form">
			<input type="hidden" name="_method" value="PUT">
				@endif
			{{ csrf_field() }}
			 <div class="panel-default">
				<div class="panel-heading">Dirección Fisica:</div>
						<div class="boton checkbox-disabled">
							<label>

								<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" onchange="datosFiscal();">
								¿Usar datos de dirección fisica?.
							</label>
						</div>
				<div class="panel-body">
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="calle">* Calle:</label>
	    					<input type="text" class="form-control" id="calle" name="calle" value="{{ $direccion->calle }}" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numext">* Numero exterior:</label>
	    					<input type="number" class="form-control" id="numext" name="numext" value="{{ $direccion->numext }}" required>
	  					</div>	
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numint">Numero interior:</label>
	    					<input type="text" class="form-control" id="numint" name="numint" value="{{ $direccion->numint }}">
	  					</div>		
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia">* Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $direccion->colonia }}" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="municipio">* Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $direccion->municipio }}" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="ciudad">* Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $direccion->ciudad }}" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="estado">* Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" value="{{ $direccion->estado }}" required>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Código postal:</label>
			    					<input type="text" class="form-control" id="cp" name="cp"  minlength="5" maxlength="5" value="{{ $direccion->cp }}">
			  					</div>		
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $direccion->calle1 }}">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $direccion->calle2 }}">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $direccion->referencia }}">
	  					</div>
					</div>
				<button type="submit" class="btn btn-success">Guardar</button>
				<p><strong>*Campo requerido</strong></p>
				</div>
			</div>
			</div>
	</form>
</div>
<script type="text/javascript">
	function datosFiscal(){
                if($('#boton-toggle').prop('checked') == true){
                	document.domicilio.calle.defaultValue = "{{$cliente->calle}}";
               		document.domicilio.numext.defaultValue = "{{$cliente->numext}}";
                	document.domicilio.numint.defaultValue = "{{$cliente->numinter}}";
                	document.domicilio.colonia.defaultValue = "{{$cliente->colonia}}";
                	document.domicilio.municipio.defaultValue = "{{$cliente->municipio}}";
                	document.domicilio.cp.defaultValue ="{{$cliente->cp}}";
                	document.domicilio.ciudad.defaultValue = "{{$cliente->ciudad}}";
                	document.domicilio.estado.defaultValue = "{{$cliente->estado}}";
                	document.domicilio.calle1.defaultValue = "{{$cliente->calle1}}";
                	document.domicilio.calle2.defaultValue = "{{$cliente->calle2}}";
                	document.domicilio.referencia.defaultValue = "{{$cliente->referencia}}";
				}
				else if($('#boton-toggle').prop('checked') == false){
                    document.domicilio.calle.defaultValue = "";
                    document.domicilio.numext.defaultValue = "";
                    document.domicilio.numint.defaultValue = "";
                    document.domicilio.colonia.defaultValue = "";
                    document.domicilio.municipio.defaultValue = "";
                    document.domicilio.cp.defaultValue ="";
                    document.domicilio.ciudad.defaultValue = "";
                    document.domicilio.estado.defaultValue = "";
                    document.domicilio.calle1.defaultValue = "";
                    document.domicilio.calle2.defaultValue = "";
                    document.domicilio.referencia.defaultValue = "";
				}
            }
</script>
@endsection