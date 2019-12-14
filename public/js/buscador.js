//buscador en tiempo real
window.addEventListener('load', function(){
    var buscador = document.querySelector('#texto');
    var resultados = document.getElementById("resultados");
    buscador.addEventListener('keyup', function(){
      if(this.value.length >= 3){
      fetch(`/api/search/${this.value}`
     )
      .then(function(response) {
      return response.json();
      })
      .then(function(data){
        resultados.innerHTML = '';
        data.forEach(function (producto) {
          resultados.innerHTML = resultados.innerHTML + producto.nombre
          // if(buscador.value.length >= 3){
          //   document.getElementById("resultados").innerHTML = ''
          //   document.getElementById("resultados").innerHTML = document.getElementById("resultados").innerHTML + producto.nombre
          // }
        })
      })
    }
      else {
        document.getElementById("resultados").innerHTML = ''
      }
    })
})
