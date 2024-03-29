<?php

namespace App\Models\ModeloCategoria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
	use HasFactory;

    use SoftDeletes;
    public $timestamps = true;

    protected $table = 'categorias';

    protected $fillable = ['nombre','descripcion','Estado','Tipo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function elementos()
    {
        return $this->hasMany('App\Models\ModeloElemento\Elemento', 'categoria_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function libros()
    {
        return $this->hasMany('App\Models\ModeloLibro\Libro', 'categoria_id', 'id');
    }

}
