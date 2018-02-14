@extends('layouts.blank')

@section('content')
<div class="container clearfix">
		<div class="row">
	<div class="panel-body">
			<div class="col-xs-12">
			<form action="{{ url('cliente') }}">
				<div class="input-group">

					<input type="text" 
					       name="query" 
					       id="cliente" 
					       class="form-control" 
					       placeholder="Buscar..."
					       autofocus=""> 
			
					<!-- <span class="input-group-btn">
						<button class="btn btn-default" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
					</span> -->	
			<div class="col-xs-3">

				<input id="boton-toggle" 
				       href="/clientes" 
				       type="checkbox" 
				       data-toggle="toggle" 
				       data-on="Sí" 
				       data-off="No" 
				       data-style="ios" 
				       checked="true" 
				       name="cliente" 
				       id="tgCliente" 
				       class="intro">

				<label>&nbsp;&nbsp;Clientes
			</label>

		</div>
		<div  class="col-xs-3">

				<input href="/prospectos" 
				       id="boton-toggle" 
				       type="checkbox" 
				       data-toggle="toggle" 
				       data-on="Sí" 
				       name="prospecto" 
				       data-off="No" 
				       data-style="ios" 
				       checked="true" 
				       id="tgProspecto"
				       class="ortni">

				<label>&nbsp;&nbsp;Prospectos
			</label>
		
					</div>	
				</div>	
			</form>
	</div>
</div>
</div>


	<div class="jumbotron" id="datos" name="datos">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id','#')</th>
					<th>@sortablelink('nombre', 'Nombre/Razón Social'){{-- Nombre --}}</th>
					<th>@sortablelink('prioridad', 'Prioridad')</th>
					<th>@sortablelink('tipo', 'Tipo de cliente')</th>
					<th>@sortablelink('calificacion', 'Calificación')</th>
					<th>@sortablelink('mail', 'Correo')</th>
					<th>@sortablelink('created_at','Fecha de alta')</th>
					<th>@sortablelink('producto','Producto')
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($clientes as $cliente)
				<tr class="active">
					<td>{{$cliente->id}}</td>
					<td>
						@if ($cliente->tipopersona == "Fisica")
						{{$cliente->nombre}} {{ $cliente->apellidopaterno }} {{ $cliente->apellidomaterno }}
						@else
						{{$cliente->razonsocial}}
						@endif
					</td>
					<td>{{ $cliente->prioridad }}</td>
					<td>{{ $cliente->tipo }}</td>
					<td>{{ strtoupper($cliente->calificacion) }}</td>
					<td>{{$cliente->mail}}</td>
					<td>{{$cliente->created_at}}</td>
					<td></td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('clientes.show',$cliente) }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
						<a class="btn btn-info btn-sm" href="{{ route('clientes.edit', $cliente) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
				</tr>
					</td>
				</tbody>
			@endforeach
		</table>
	</div>


	{{ $clientes->links() }}
</div>
<script>
	
</script>
@endsection