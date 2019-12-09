<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Marca;
use App\Imagen;

class ProductoController extends Controller
{
    public function mostrar()
    {
      $productos = Producto::paginate(6);
      return view('index', compact('productos'));
    }

    // Método agregar
    public function agregar()
    {
      $categorias = Categoria::all();
      $marcas = Marca::all();

      // Muestra la vista para agregar un producto la cual debe tener un formulario, la ruta es '/productos/agregar', y debe tener el middleware admin
      return view('productoAgregar', compact('categorias', 'marcas'));
    }

    // Método guardar
    public function guardar(Request $form) // Toma lo que venga por Post de la ruta '/productos/agregar'
    {

      // Validaciones
      $this->validate($form,
      [
        'nombre' => 'required|unique:productos',
        'categoria_id' => 'required',
        'marca_id' => 'required',
        'precio' => 'required|numeric|min:1',
        'cantidad' => 'required|min:1|integer',
        'descripcion' => 'required|min:2',
        'imagen' => ['required']
      ],
      [
        'nombre.required' => 'El producto debe tener un nombre.',
        'nombre.unique' => 'El producto ya existe.',
        'categoria_id.required' => 'El producto debe tener una categoria.',
        'marca_id.required' => 'El producto debe tener una Marca.',
        'precio.required' => 'El producto debe tener un precio.',
        'precio.numeric' => 'El precio del producto debe ser un número.',
        'precio.min' => 'El precio mínimo es de $ :min.',
        'cantidad.required' => 'Debe indicar el stock disponible del producto.',
        'cantidad.min' => 'El stock mínimo es de :min producto.',
        'cantidad.numeric' => 'El stock debe ser un número entero.',
        'descripcion.required' => 'El producto debe tener una descripcion.',
        'descripcion.min' => 'La descripción debe tener más de :min caracteres.',
        'imagen.required' => 'El producto necesita, como mínimo, una imagen.',
        'imagen.image' => 'El archivo debe ser un formato válido de imagen.',
      ]);
      // Asigna los valores a un objeto de clase Producto
      $producto = new Producto;
      $producto->nombre = $form['nombre'];
      $producto->categoria_id = $form['categoria_id'];
      $producto->marca_id = $form['marca_id'];
      $producto->precio = $form['precio'];
      $producto->cantidad = $form['cantidad'];
      $producto->descripcion = $form['descripcion'];

      // Guarda el Producto en la BBDD
      $producto->save();

      // Traigo al producto recién creado para obtener su ID
      $ultimoProducto = Producto::all()->last();
      $idProducto = $ultimoProducto->id;

      // Obtengo el array de imagenes
      $imagenes = $form->file('imagen');
      // Recorro el Array
      foreach ($imagenes as $imagen) {
        // Guardo cada imagen en /storage/public
        $archivo = $imagen->store('public');
        // Obtengo sus nombres
        $ruta = basename($archivo);
        // Por cada imagem, instancio un objeto de la clase imagen
        $imagenProducto = new Imagen;
        // Asigno las rutas correspondientes
        $imagenProducto->producto_id = $idProducto;
        $imagenProducto->ruta = $ruta;
        // Guardo las imagenes
        $imagenProducto->save();
      }

      // Regresa una redirección a la ruta '/home'
      return redirect('/');
    }

    public function mostrarProducto($id)
    {
      $producto = Producto::find($id);
      $relacionados = Producto::where('marca_id','=',$producto->marca_id)->where('id','<>',$producto->id)->get();
      return view('verProducto', compact('producto','relacionados'));
    }
}
