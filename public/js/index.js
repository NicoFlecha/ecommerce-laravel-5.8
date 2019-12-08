window.addEventListener('load', function () {
  var productos = document.querySelectorAll('div.producto');
  productos.forEach(function (producto) {
    var elementosProducto = producto.children;
    var anteriorBtn = elementosProducto[0];
    var siguienteBtn = elementosProducto[2];
    var linkProducto = elementosProducto[1];
    producto.onmouseover = function () {
      anteriorBtn.style.display = 'block';
      siguienteBtn.style.display = 'block';
      if (arrayElementosDivImagen.length == 1) {
        anteriorBtn.style.display = 'none';
        siguienteBtn.style.display = 'none';
      }
    }
    producto.onmouseout = function () {
      anteriorBtn.style.display = 'none';
      siguienteBtn.style.display = 'none';
    }
    var elementosLink = linkProducto.children;
    var divImagen = elementosLink[0];
    var elementosDivImagen = divImagen.children;
    var arrayElementosDivImagen = Array.from(elementosDivImagen);
    var contador = 0;
    arrayElementosDivImagen.forEach(function (imagen) {
      imagen.style.display = 'none';
    })
    arrayElementosDivImagen[contador].style.display = 'block';
    siguienteBtn.onclick = function () {
      contador++;
      if (contador > arrayElementosDivImagen.length-1) {
        contador = 0;
      }
      arrayElementosDivImagen.forEach(function (imagen) {
        imagen.style.display = 'none';
      })
      arrayElementosDivImagen[contador].style.display = 'block';
    }
    anteriorBtn.onclick = function () {
      contador--;
      if (contador < 0) {
        contador = arrayElementosDivImagen.length-1;
      }
      arrayElementosDivImagen.forEach(function (imagen) {
        imagen.style.display = 'none';
      })
      arrayElementosDivImagen[contador].style.display = 'block';
    }
  })
})
//buscador en tiempo real
window.addEventListener('load', function(){
    var buscador = document.querySelector('#texto')
    buscador.addEventListener('keyup', function(){
      if(this.value.length >= 3){
      fetch(`/search?texto=${this.value}`, {
        method:'get'
      })
      .then(function(response) {
      return response.text();
      })
      .then(function(data){
        document.getElementById("resultados").innerHTML = data
      })
    }
      else {
        document.getElementById("resultados").innerHTML = ''
      }
    })
})
