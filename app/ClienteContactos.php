<?php

namespace App;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ClienteContactos extends Model
{
    //
    use Sortable;

    protected $table='cliente_contactos';

    protected $fillable=[
    	'id',
    	'cliente_id',
    	'nombre',
    	'apater',
    	'amater',
    	'area',
    	'puesto',
    	'telefono1',
    	'ext1',
    	'telefono2',
    	'ext2',
    	'telefonodir',
    	'celular1',
    	'celular2',
    	'email1',
    	'email2'
    ];
    
    public $sortable=[
    	'id',
    	'nombre',
    	'apater',
    	'amater',
    	'telefonodir',
    	'email1',
    ];
    
    protected $hidden =[
    	'created_at',
    	'updated_at',
    	'deleted_at'
    ];

    public function cliente(){
    	return $this->belongsTo(Cliente::class);
    }
}
