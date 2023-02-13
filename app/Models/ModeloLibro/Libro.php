<?php

namespace App\Models\ModeloLibro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'libros';

    protected $fillable = ['Nombre','Autor','Editorial','Edicion','Descripcion','Estado','categoria_id','CantidadLibros','NombreTomo'];

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
        return $this->hasMany('App\Models\ModeloDevolucion\Devolucion', 'libros_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prestamos()
    {
        return $this->hasMany('App\Models\ModeloPrestamo\Prestamo', 'libros_id', 'id');
    }

    public function detalle_prestamo()
    {
        return $this->hasOne(Prestamos\DetallePrestamo::class,'id_libro','id');
    }

    public function librosNovedades()
    {
        return $this->hasMany('App\Models\ModeloNovedades\Novedades', 'libros_id', 'id');
    }
}
