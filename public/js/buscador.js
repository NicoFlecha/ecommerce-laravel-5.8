//buscador en tiempo real
window.addEventListener('load', function(){
    var buscador = document.querySelector('#texto');
    var resultados = document.getElementById("resultados");
    resultados.style.display = 'none';
    buscador.addEventListener('keyup', function(){
      if(this.value.length >= 3){
      fetch(`/api/search/${this.value}`
     )
      .then(function(response) {
      return response.json();
      })
      .then(function(data){
        resultados.style.display = 'block';
        resultados.innerHTML = '';
        data.forEach(function (producto) {
          resultados.innerHTML = resultados.innerHTML +
          "<div class='resultado'>" +
            "<a href='/productos/" + producto.id + "'>" +
               "<img class='resultado-img' src='/storage/" + producto.imagenes[0].ruta + "'>" +producto.nombre +
            "</a>" +
          "</div>"
        })
      })
    }
      else {
        resultados.style.display = 'none';
        document.getElementById("resultados").innerHTML = ''
      }
    })
})
