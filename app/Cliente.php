<?php

namespace App;

use App\Beneficiarios;
use App\ClienteCRM;
use App\ClienteContactos;
use App\ClienteDatosGen;
use App\ClienteDireccion;
use App\DatosLab;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Cliente extends Model
{
    use Sortable, SoftDeletes;
    //
    protected $table='clientes';

   protected $fillable = [
     	'id',
      'tipopersona',
      'tipo',
      'prioridad',
      'calificacion',
      'nombre',
      'apellidopaterno',
      'apellidomaterno',
      'razonsocial',
      'mail',
      'rfc',
      'telefono',
      'celular',
      'calle',
      'numext',
      'numinter',
      'cp',
      'colonia',
      'municipio',
      'ciudad',
      'estado',
      'referencia',
      'calle1',
      'calle2'
    ];
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $Sortable = [
    	'id',
    	'nombre',
      'apellidopaterno',
      'apellidomaterno',
      'razonsocial',
      'rfc'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function direccion(){
      return $this->hasOne(ClienteDireccion::class);
    }

    public function contactos(){
      return $this->hasMany(ClienteContactos::class);
    }

    public function datoGen(){
      return $this->hasOne(ClienteDatosGen::class);
    }

    public function crm(){
      return $this->hasMany(ClienteCRM::class);
    }
  
}
