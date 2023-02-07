<?php

namespace App\Models\Devoluciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Devolucion extends Model
{
    use HasFactory;
    

    public $timestamps = true;

    protected $table = 'detalle_devolucion';

    protected $fillable = ['id','id_libroD','id_elementoD','CantidadDevueltaU','NovedadesDevolucion','id_DevolucionD'];

	/**
	 * @return mixed
	 */
	public function getFillable() {
		return $this->fillable;
	}
	
	/**
	 * @param mixed $fillable 
	 * @return self
	 */
	public function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
}
