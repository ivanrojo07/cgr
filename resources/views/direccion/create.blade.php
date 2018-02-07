@extends('layouts.infocliente')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('clientes.show',['cliente'=>$personal]) }}">Dirección Fisica:</a></li>
			<li class="active"><a href="{{ route('clientes.direccionfisica.index',['cliente'=>$personal]) }}">Dirección Fiscal:
			
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('clientes.contacto.index',['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('clientes.datosgenerales.index', ['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
			<li class=""><a href="{{ route('clientes.crm.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">C.R.M.:</a></li>
		</ul>
			<div class="panel panel-default">
			<form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('clientes.direccionfisica.store', ['cliente'=>$personal]) }}" name="form">
			{{ csrf_field() }}
			 <input type="hidden" name="personal_id" value="{{$personal->id}}">
			 <div class="panel-default">
				<div class="panel-heading">Dirección Fiscal: &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</a></li></div>
				<div class="panel-body">
						<div class="col-lg-offset-10">
							<button type="submit" class="btn btn-success">
						<strong>Guardar</strong>	</button>
							
						</div>
						<div class="col-lg-4">
							
							<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" onchange="datosFiscal();">
										<label>¿Usar datos de dirección fisica?.</label>
						</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="calle"><i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
	    					<input type="text" class="form-control" id="calle" name="calle" value="" autofocus required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numext"><i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
	    					<input type="text" class="form-control" id="numext" name="numext" value="" required>
	  					</div>	
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numint">Numero interior:</label>
	    					<input type="text" class="form-control" id="numint" name="numint" value="">
	  					</div>		
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia"><i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" value="" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="municipio"><i class="fa fa-asterisk" aria-hidden="true"></i> Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" value="" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="ciudad"><i class="fa fa-asterisk" aria-hidden="true"></i> Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="estado"><i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" value="" required>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Código postal:</label>
			    					<input type="text" class="form-control" id="cp" name="cp"  minlength="5" maxlength="5">
			  					</div>		
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<input type="text" class="form-control" id="calle1" name="calle1" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<input type="text" class="form-control" id="calle2" name="calle2" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia" value="">
	  					</div>
					</div>
				</div>
			</div>
			</div>
	</form>
</div>
<script>
	function datosFiscal(){
                if($('#boton-toggle').prop('checked') == true){
                	document.domicilio.calle.defaultValue = "{{$personal->calle}}";
               		document.domicilio.numext.defaultValue = "{{$personal->numext}}";
                	document.domicilio.numint.defaultValue = "{{$personal->numinter}}";
                	document.domicilio.colonia.defaultValue = "{{$personal->colonia}}";
                	document.domicilio.municipio.defaultValue = "{{$personal->municipio}}";
                	document.domicilio.ciudad.defaultValue = "{{$personal->ciudad}}";
                	document.domicilio.estado.defaultValue = "{{$personal->estado}}";
                	document.domicilio.calle1.defaultValue = "{{$personal->calle1}}";
                	document.domicilio.calle2.defaultValue = "{{$personal->calle2}}";
                	document.domicilio.referencia.defaultValue = "{{$personal->referencia}}";
				}
				else if($('#boton-toggle').prop('checked') == false){
                    document.domicilio.calle.defaultValue = "";
                    document.domicilio.numext.defaultValue = "";
                    document.domicilio.numint.defaultValue = "";
                    document.domicilio.colonia.defaultValue = "";
                    document.domicilio.municipio.defaultValue = "";
                    document.domicilio.ciudad.defaultValue = "";
                    document.domicilio.estado.defaultValue = "";
                    document.domicilio.calle1.defaultValue = "";
                    document.domicilio.calle2.defaultValue = "";
                    document.domicilio.referencia.defaultValue = "";
				}
            }
</script>
@endsection