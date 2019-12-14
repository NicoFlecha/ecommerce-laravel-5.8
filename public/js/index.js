  window.addEventListener('load', function () {
  // Capturo los div padre, los productos
  var productos = document.querySelectorAll('div.producto');
  // Recorro los Productos
  productos.forEach(function (producto) {
    // Capturo los elementos del div producto
    var elementosProducto = producto.children;
    var anteriorBtn = elementosProducto[0];
    var siguienteBtn = elementosProducto[2];
    var linkProducto = elementosProducto[1];
    // Asigno el evento mouseOver al div Producto
    producto.onmouseover = function () {
      // Al pasar el mouse sobre producto, cambia el display de los botones a block
      anteriorBtn.style.display = 'block';
      siguienteBtn.style.display = 'block';
      if (arrayElementosDivImagen.length == 1) {
        anteriorBtn.style.display = 'none';
        siguienteBtn.style.display = 'none';
      }
    }
    producto.onmouseout = function () {
      // Al sacar el mouse del producto, cambia el display de los botones a none
      anteriorBtn.style.display = 'none';
      siguienteBtn.style.display = 'none';
    }
    // Obtengo los elementos de linkProducto
    var elementosLink = linkProducto.children;
    // capturo el div imagen
    var divImagen = elementosLink[0];
    // obtengo los elementos del div imagen
    var elementosDivImagen = divImagen.children;
    // convierto en array los elementos del div imagen
    var arrayElementosDivImagen = Array.from(elementosDivImagen);
    // inicio el contador (posicion de imagen) en 0
    var contador = 0;
    // recorro el div imagen
    arrayElementosDivImagen.forEach(function (imagen) {
      // oculto toddas las imagenes
      imagen.style.display = 'none';
    })
    // sí el producto tiene solo una imagen, los botones anterior y siguiente no se muestran
    if (arrayElementosDivImagen.length == 1) {
      anteriorBtn.style.display = 'none';
      siguienteBtn.style.display = 'none';
    }
    // se muestra la primer imagen (posición 0)
    arrayElementosDivImagen[contador].style.display = 'block';

    // asigno el evento click al botón siguiente
    siguienteBtn.onclick = function () {
      // con cada click, aumenta el contador
      contador++;
      // si el contador supera el número de imagenes que tenga el producto, se reinicia
      if (contador > arrayElementosDivImagen.length-1) {
        contador = 0;
      }
      // oculto todas las imagenes
      arrayElementosDivImagen.forEach(function (imagen) {
        imagen.style.display = 'none';
      })
      // muestro solo la que esté en la posición del contador
      arrayElementosDivImagen[contador].style.display = 'block';
    }

    // asigno el evento click al botón anterior
    anteriorBtn.onclick = function () {
      // con cada click, disminuye el contador
      contador--;
      // si el contador es menor que 0, toma el valor de la posición de la última imagen
      if (contador < 0) {
        contador = arrayElementosDivImagen.length-1;
      }
      // oculto todas las imagenes
      arrayElementosDivImagen.forEach(function (imagen) {
        imagen.style.display = 'none';
      })
      // muestro solo la que esté en la posición del contador
      arrayElementosDivImagen[contador].style.display = 'block';
    }
  })
})
