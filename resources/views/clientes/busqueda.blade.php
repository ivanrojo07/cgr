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