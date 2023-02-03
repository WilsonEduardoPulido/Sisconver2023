<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sancions';

    protected $fillable = ['Descripcion','Estado','usuario_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'usuario_id');
    }
    
}
