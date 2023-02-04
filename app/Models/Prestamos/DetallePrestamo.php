<?php

namespace App\Models\Prestamos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetallePrestamo extends Model
{
    use HasFactory;

    

    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'detalle_prestamo';

    protected $fillable = ['id','id_libro','id_elemento','CantidadPrestadaU','NovedadesPrestamoU','id_prestamo','DetallePrestamo','EstadoDetalle'];
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'usuario_id');
    }

    public function usr()
    {
        return $this->hasOne('App\Models\Prestamo', 'id', 'id_prestamo');
    }


    public function libros()
    {
        return $this->hasMany('App\Models\Libro', 'id', 'id_libro');

       
    }


    public function elementos()
    {
        return $this->hasMany('App\Models\Elemento', 'id', 'id_elemento');
    }


    
}
