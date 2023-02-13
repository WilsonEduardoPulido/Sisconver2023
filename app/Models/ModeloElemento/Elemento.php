<?php

namespace App\Models\ModeloElemento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Elemento extends Model
{
	use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'elementos';

    protected $fillable = ['nombre','cantidad','descripcion','Estado','categoria_id','TipoNovedad','created_at','updated_at','deleted_at','NovedadesElemento'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\ModeloCategoria\Categoria', 'id', 'categoria_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devolucions()
    {
        return $this->hasMany('App\Models\ModeloDevolucion\Devolucion', 'elementos_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prestamos()
    {
        return $this->hasMany('App\Models\ModeloPrestamo\Prestamo', 'elementos_id', 'id');
    }

    public function detalle_prestamo()
    {
        return $this->hasOne(Prestamos\DetallePrestamo::class,'id_elemento','id');
    }

}
