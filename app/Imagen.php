<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Producto;

class Imagen extends Model
{
  public $table = 'imagenes_productos';
  public $timestamps = false;
  public $guarded = [];

  public function producto()
  {
    return $this->belongsTo(Producto::class, 'producto_id');
  }
}
