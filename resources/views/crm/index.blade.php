@extends('layouts.infocliente')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs">
		<li  role="presentation"><a href="{{ route('clientes.show',['cliente'=>$cliente]) }}">Dirección/Domicilio:</a></li>
		@if ($cliente->tipo == 'Cliente')
			{{-- expr --}}
		<li id="lidir" role="presentation"><a href="{{ route('clientes.direccion.index',['cliente'=>$cliente]) }}" >Direccion Fiscal:</a></li>
		<li id="licont" role="presentation"><a href="{{ route('clientes.contactos.index',['cliente'=>$cliente]) }}">Contactos</a></li>
		<li id="lidat" role="presentation"><a href="{{ route('clientes.datos.index',['cliente'=>$cliente]) }}">Datos Generales</a></li>
		@else
		<li role="presentation" class="active"><a href="{{ route('clientes.crm.index',['cliente'=>$cliente]) }}" class="disabled">C.R.M.</a></li>
		<li id="licont" role="presentation"><a href="{{ route('clientes.contactos.index',['cliente'=>$cliente]) }}">Contactos</a></li>
		@endif
	</ul>
		<div class="panel-default">
			<div class="panel-heading">C.R.M.&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
			<div class="panel-body">
				<div class="panel-body">
					<form role="form" method="POST" action="{{ route('clientes.crm.store',['cliente'=>$cliente]) }}">
						{{ csrf_field() }}
						<input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
						<div class="col-xs-4 col-xs-offset-10">
							<a class="btn btn-warning" id="limpiar" onclick="limpiar()"><strong>Limpiar</strong></a>
							<button id="submit" type="submit" class="btn btn-success"><strong>Guardar</strong></button>
							<a id="modificar" class="btn btn-primary" onclick="modificar()" style="display: none;">Modificar</a>
							

						</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_act">Fecha Actual:</label>
							<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_cont"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha siguiente contacto:</label>
							<input type="date" class="form-control" id="fecha_cont" name="fecha_cont" required="required" value="">
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_aviso"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha Aviso:</label>
							<input type="date" class="form-control" id="fecha_aviso" name="fecha_aviso" required="required" value="">
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="hora">Hora:</label>
							<input type="time" class="form-control" id="hora" name="hora" name="hora" value="">
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="tipo_cont">Forma de contacto:</label>
							<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
								<option id="Mail" value="Mail">Email/Correo Electronico</option>
								<option id="Telefono" value="Telefono">Telefono</option>
								<option id="Cita" value="Cita">Cita</option>
								<option id="Whatsapp" value="Whatsapp">Whatsapp</option>
								<option id="Otro" value="Otro" selected="selected">Otro</option>
							</select>
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="status">Estado:</label>
							<select class="form-control" type="select" name="status" id="status" >
								<option id="Pendiente" value="Pendiente">Pendiente</option>
								<option id="Cotizando" value="Cotizando">En Cotización</option>
								<option id="Cancelado" value="Cancelado">Cancelado</option>
								<option id="Toma_decision" value="Toma_decision">Tomando decisión</option>
								<option id="Espera" value="Espera">En espera</option>
								<option id="Revisa_doc" value="Revisa_doc">Revisando documento</option>
								<option id="Proceso_aceptar" value="Proceso_aceptar">Proceso de Aceptación</option>
								<option id="Entrega" value="Entrega">Para entrega</option>
								<option id="Otro" value="Otro" selected="selected">Otro</option>
							</select>
						</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="acuerdos">Acuerdos: </label>
							<textarea class="form-control" rows="5" id="acuerdos" name="acuerdos" maxlength="500"></textarea>
						</div>

						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="comentarios">Comentarios: </label>
							<textarea class="form-control" rows="5" id="comentarios" name="comentarios" maxlength="500"></textarea>
						</div>

						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="observaciones">Observaciones: </label>
							<textarea class="form-control" rows="5" id="observaciones" name="observaciones" maxlength="500"></textarea>
						</div>
						
					</div>
					</form>
				</div>
				<div class="panel-body">
					@if (count($crms)==0)
						<legend>Aun no tienes C.R.M.'s</legend>
					@endif
					@if (count($crms)!=0)
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse;margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Fecha contacto</th>
									<th>Fecha aviso</th>
									<th>Hora</th>
									<th>Estado</th>
									<th>Forma de contacto</th>
									<th>Acuerdos</th>
									<th>Observaciones</th>
									<th>Operación</th>
								</tr>
							</thead>
							@foreach ($crms as $crm)
								{{-- expr --}}
								<tr>
									<td>{{$crm->fecha_cont}}</td>
									<td>{{$crm->fecha_aviso}}</td>
									<td>{{$crm->hora}}</td>
									<td>{{$crm->tipo_cont}}</td>
									<td>{{$crm->status}}</td>
									<td>{{substr($crm->acuerdos,0,50)}}...</td>
									<td>{{substr($crm->observaciones,0,50)}}...</td>
									<td><a class="btn btn-primary" onclick="crm({{$crm}})" {{-- href="{{ route('personals.crm.show',['cliente'=>$cliente,'crm'=>$crm]) }}" --}}>Ver</a></td>
								</tr>
							@endforeach
						</table>
					@endif	
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function crm(elemento){
				document.getElementById("fecha_cont").value = elemento.fecha_cont;
				document.getElementById("fecha_cont").disabled = true;
				document.getElementById("fecha_aviso").value = elemento.fecha_aviso;
				document.getElementById("fecha_aviso").disabled = true;
				document.getElementById("hora").value = elemento.hora;
				document.getElementById("hora").disabled = true;
				document.getElementById("tipo_cont").value = elemento.tipo_cont;
				document.getElementById('tipo_cont').disabled = true;
				document.getElementById('status').value = elemento.status;
				document.getElementById('status').disabled = true;
				document.getElementById('acuerdos').value = elemento.acuerdos;
				document.getElementById('acuerdos').disabled = true;
				document.getElementById('comentarios').value = elemento.comentarios;
				document.getElementById('comentarios').disabled = true;
				document.getElementById('observaciones').value = elemento.observaciones;
				document.getElementById('observaciones').disabled = true;
				document.getElementById('submit').disabled= true
				document.getElementById('modificar').style.display = ''
				document.getElementById('limpiar').style.display = 'none';

			}
			function modificar(){
				document.getElementById("fecha_cont").disabled = false;
				document.getElementById("fecha_aviso").disabled = false;
				document.getElementById("hora").disabled = false;
				document.getElementById("tipo_cont").disabled = false;
				document.getElementById("status").disabled = false;
				document.getElementById("acuerdos").disabled = false;
				document.getElementById("comentarios").disabled = false;
				document.getElementById("observaciones").disabled = false;
				document.getElementById("submit").disabled = false;
				document.getElementById('modificar').style.display = 'none'
				document.getElementById('limpiar').style.display = '';
			}
			function limpiar(){
				
				document.getElementById("fecha_cont").value = '';
				
				document.getElementById("fecha_aviso").value = '';
				
				document.getElementById("hora").value = '';
				
				document.getElementById("tipo_cont").value = '';
				
				document.getElementById('status').value = '';
				
				document.getElementById('acuerdos').value = '';
				
				document.getElementById('comentarios').value = '';
				
				document.getElementById('observaciones').value = '';				
			}
		</script>
	@endsection