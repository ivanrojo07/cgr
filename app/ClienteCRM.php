<?php

namespace App;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteCRM extends Model
{
    //
    use SoftDeletes;

    protected $table='cliente_crm';

    protected $fillable=[
    	'id',
    	'cliente_id',
    	'fecha_act',
    	'fecha_cont',
    	'fecha_aviso',
    	'hora',
    	'status',
    	'comentarios',
    	'acuerdos',
    	'observaciones',
    	'tipo_cont'
    ];

    protected $hidden=[
    	'updated_at',
    	'created_at',
    	'deleted_at'
    ];

    public function cliente(){
    	return $this->belongsTo(Cliente::class);
    }
}
