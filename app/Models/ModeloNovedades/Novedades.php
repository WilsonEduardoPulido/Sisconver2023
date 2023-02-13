<?php

namespace App\Models\ModeloNovedades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Novedades extends Model
{
    use HasFactory;

    use SoftDeletes;
    public $timestamps = true;

    protected $table = 'novedades';

    protected $fillable = ['id','id_libros','id_elementos','Novedades','Tipo_novedad'];

    public function librosNovedades()
    {
        return $this->hasMany('App\Models\ModeloLibro\Libro', 'categoria_id', 'id');
    }
}
