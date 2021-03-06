<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Marca;
use App\Imagen;

class Producto extends Model
{
  public $table = 'productos';
  public $timestamps = false;
  public $guarded = [];

  public function categoria()
  {
    return $this->belongsTo(Categoria::class, 'categoria_id');
  }

  public function marca()
  {
    return $this->belongsTo(Marca::class, 'marca_id');
  }

  public function imagenes()
  {
    return $this->hasMany(Imagen::class, 'producto_id');
  }
}
