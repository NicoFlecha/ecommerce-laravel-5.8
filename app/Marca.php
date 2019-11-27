<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;

class Marca extends Model
{
  public $table = 'marcas';
  public $timestamps = false;
  public $guarded = [];

  public function producto()
  {
    return $this->hasMany(Producto::class, 'marca_id');
  }
}
