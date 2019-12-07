window.addEventListener('load', function () {
  var form = document.querySelector('form.registro');
  var elementosForm = Array.from(form.elements);
  var inputNombre = document.querySelector('input[name="name"]');
  var inputApellido = document.querySelector('input[name="apellido"]');
  var inputEmail = document.querySelector('input[name="email"]');
  var inputPassword = document.querySelector('input[name="password"]');
  var inputPassword = document.querySelector('input[name="password_confirmation"]');
  var inputAvatar = document.querySelector('input[name="avatar"]');

  form.onsubmit = function (event) {
    elementosForm.forEach(function (elemento) {
      console.log(elemento);
    })
    event.preventDefault();
  }
})
