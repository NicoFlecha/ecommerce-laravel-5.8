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
})
