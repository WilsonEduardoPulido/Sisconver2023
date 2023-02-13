<?php

namespace App\Models\ModeloPrestamo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model
{
	use HasFactory;
    use SoftDeletes;
    public $timestamps = true;

    protected $table = 'prestamos';

    protected $fillable = ['Fecha_prestamo','CantidadPrestada','libros_id','elementos_id','usuario_id','prestador_id','Estado_Prestamo','Codigo_Prestamo'];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devolucions()
    {
        return $this->hasMany('App\Models\ModeloDevolucion\Devolucion', 'prestamos_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function elemento()
    {
        return $this->hasOne('App\Models\ModeloElemento\Elemento', 'id', 'elementos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function libro()
    {
        return $this->hasOne('App\Models\ModeloLibro\Libro', 'id', 'libros_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'usuario_id');
    }


    public function detalle_Prestamo()
    {
        return $this->hasMany('App\Models\Prestamos\DetallePrestamo', 'id_prestamo', 'id');
    }

    public function libros()
    {
        return $this->hasMany('App\Models\Libro', 'id', 'libros_id');
    }

}
