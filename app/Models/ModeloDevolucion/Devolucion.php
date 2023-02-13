<?php

namespace App\Models\ModeloDevolucion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Devolucion extends Model
{
	use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'devoluciones';

    protected $fillable = ['Fecha_devolucion','prestamos_id','libros_id','elementos_id','usuario_id','curso_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


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
    public function prestamo()
    {
        return $this->hasOne('App\Models\ModeloPrestamo\Prestamo', 'id', 'prestamos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'usuario_id');
    }



    

}
