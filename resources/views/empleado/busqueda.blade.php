<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>@sortablelink('identificador','#')</th>
					<th>@sortablelink('nombre','Nombre')</th>
					<th>@sortablelink('appaterno','Apellido Paterno')</th>
					<th>@sortablelink('apmaterno','Apellido Materno')</th>
					<th>@sortablelink('rfc','R.F.C.')</th>
					<th>Acciones</th>
				</tr>
			</thead>
			@foreach ($empleados as $empleado)
				{{-- expr --}}
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$empleado->id}}">
					
					<td>{{$empleado->identificador}}</td>
					<td>{{$empleado->nombre}}</td>
					<td>{{$empleado->appaterno}}</td>
					<td>{{$empleado->apmaterno}}</td>
					<td>{{$empleado->rfc}}</td>
					<td>
					  <div class="row">
					  	<div class="col-sm-4">
					  		<a class="btn btn-success btn-sm" href="{{ route('empleados.show',['empleado'=>$empleado]) }}"><i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong></a>
					  	</div>
					  	<div class="col-sm-4">
					  		<a class="btn btn-info btn-sm" href="{{ route('empleados.edit',['empleado'=>$empleado]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><strong>Editar</strong></a>
					  	</div>
					  </div>
					</td>
				</tr>
			@endforeach
		</table>

		