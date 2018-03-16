<option id="precarga0" value="">Sin Definir</option>

@foreach ($precargas as $precarga)
	{{-- expr --}}
	<option id="{{$precarga->id}}" 
		    value="{{$precarga->id}}">{{$precarga->nombre}}</option>
@endforeach