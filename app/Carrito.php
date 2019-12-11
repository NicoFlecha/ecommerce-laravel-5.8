<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;
use App\User;

class Carrito extends Model
{

  public $guarded = [];

  public function productos()
  {
    return $this->belongsTo(Producto::class, 'producto_id', 'id');
  }
}
