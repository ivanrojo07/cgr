<?php

namespace App;

use App\Giro;
use App\Cliente;
use App\FormaContacto;
use Illuminate\Database\Eloquent\Model;

class ClienteDatosGen extends Model
{
    //
    protected $table='cliente_datos_generales';

    protected $fillable=[
    	'id',
    	'cliente_id',
    	'giro_id',
    	'forma_contacto_id',
    	'tamano',
    	'web',
    	'comentario',
    	'fechacontacto'
    ];
    
    protected $hidden = [
    	'created_at',
    	'updated_at'
    ];

    public function cliente(){
    	return $this->belongsTo(Cliente::class);
    }
    public function giro(){
        return $this->belongsTo(Giro::class, 'giro_id','id');
    }
    public function contacto(){
        return $this->belongsTo(FormaContacto::class,'forma_contacto_id','id');
    }
}
