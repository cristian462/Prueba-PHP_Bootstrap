var submit = document.getElementById("submit");
var nombre = document.getElementById("nombre");
var pass = document.getElementById("pass");
var error = document.getElementById("error");

window.onload = function (){
    submit.addEventListener("click",function(){
        if(nombre.value.trim().length === 0 || pass.value.trim().length === 0){
            error.innerText= "Por favor, rellena todos los datos del formulario";
            event.preventDefault();
        }
    });

    nombre.addEventListener('focus', () => {
        error.innerText= "";
      });

      pass.addEventListener('focus', () => {
        error.innerText= "";
      });
}