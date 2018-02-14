<?php

namespace App;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;

class ClienteDireccion extends Model
{
    //

    protected $table='cliente_direccion';

    protected $fillable=[
    	'id',
    	'cliente_id',
    	'calle',
    	'numext',
    	'numint',
    	'cp',
    	'colonia',
    	'municipio',
    	'ciudad',
    	'estado',
    	'referencia',
    	'calle1',
    	'calle2'
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at',
    	'deleted_at'
    ];

    public function cliente(){
    	return $this->belongsTo(Cliente::class);
    }

}
