window.addEventListener('load', function () {
  var imagenes = document.querySelectorAll('.imgProducto');
  var anteriorBtn = document.querySelector('#anterior');
  var siguienteBtn = document.querySelector('#siguiente');
  var contador = 0;
  imagenes.forEach(function (imagen, index) {
    imagen.style.display = 'none';
    if (index == contador) {
      imagen.style.display = 'block';
    }
  })
  siguienteBtn.onclick = function () {
    contador++;
    if (contador > imagenes.length-1) {
      contador = 0;
    }
    imagenes.forEach(function (imagen) {
      imagen.style.display = 'none';
    })
    imagenes[contador].style.display = 'block';
    console.log(contador)
  }
  anteriorBtn.onclick = function () {
    contador--;
    if (contador < 0) {
      contador = imagenes.length-1;
    }
    imagenes.forEach(function (imagen) {
      imagen.style.display = 'none';
    })
    imagenes[contador].style.display = 'block';
    console.log(contador)
  }
  if (imagenes.length == 1) {
    anteriorBtn.style.display = 'none';
    siguienteBtn.style.display = 'none';
  }

  // Control de cantidad
  var errorCantidad = document.querySelector('div.error-cantidad');
  var cantidad = document.querySelector('#cantidad');
  var sumarBtn = document.querySelector('#sumar');
  var restarBtn = document.querySelector('#restar');

  var productoId = document.querySelector('input.producto_id').value;
  fetch(`http://localhost:8000/api/productos/${(productoId)}`)
    .then(function (response) {
      return response.json();
    })
    .then(function (producto) {
      sumarBtn.onclick = function () {
        cantidad.value ++;
        if (cantidad.value > producto.cantidad) {
          // var parrafoError = document.createElement('p');
          // parrafoError.innerText = 'Ya no hay más';
          errorCantidad.innerHTML = '<p>El stock disponible es de ' + producto.cantidad + '</p>'
        }
        if (cantidad.value <= producto.cantidad && cantidad.value > 0) {
          errorCantidad.innerHTML = '';
        }
      };
      restarBtn.onclick = function () {
        cantidad.value --;
        if (cantidad.value <= producto.cantidad) {
          errorCantidad.innerHTML = '';
        }
        if (cantidad.value < 1) {
          errorCantidad.innerHTML = '<p>La cantidad mínima es de 1 Producto</p>';
        }
      }
      cantidad.onchange = function () {
        if (cantidad.value <= producto.cantidad) {
          errorCantidad.innerHTML = '';
        }
        if (cantidad.value < 1) {
          errorCantidad.innerHTML = '<p>La cantidad mínima es de 1 Producto</p>';
        }
        if (cantidad.value > producto.cantidad) {
          // var parrafoError = document.createElement('p');
          // parrafoError.innerText = 'Ya no hay más';
          errorCantidad.innerHTML = '<p>El stock disponible es de ' + producto.cantidad + '</p>';
        }
      }

      // Validaciones al enviar el Formulario
      var form = document.querySelector('form.agregar-carrito');
      form.onsubmit = function (event) {
        if (cantidad.value > producto.cantidad) {
          event.preventDefault();
        }
        if (cantidad.value < 1) {
          event.preventDefault();
        }
      }
    })

})
