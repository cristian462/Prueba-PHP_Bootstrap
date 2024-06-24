var submit = document.getElementById("submit");
var nombre = document.getElementById("nombre");
var pass = document.getElementById("pass");
var pass2 = document.getElementById("pass2");
var error = document.getElementById("error");


window.onload = function (){
    submit.addEventListener("click",function(){
        if(nombre.value.trim().length === 0 || pass.value.trim().length === 0 || pass2.value.trim().length === 0){
            error.innerText= "Por favor, rellena todos los datos del formulario";
            event.preventDefault();
        }else{
            if(pass.value !== pass2.value){
                event.preventDefault();
            }
        }
    });

    nombre.addEventListener('focus', () => {
        error.innerText= "";
        nombre.classList.remove("is-valid");
        nombre.classList.remove("is-invalid");
        document.getElementById("nombreMal").innerText = "";
      });

    nombre.addEventListener('blur', () => {
        const nom = nombre.value.trim();
        if (nom.length === 0) {
          nombre.classList.remove("is-valid");
          nombre.classList.add("is-invalid");
          document.getElementById("nombreMal").innerText = "No puede quedar vacío este campo.";
        } else {
          if(nom.length>20) {
            nombre.classList.remove("is-valid");
            nombre.classList.add("is-invalid");
            document.getElementById("nombreMal").innerText = "El nombre es demasiado largo";
          }else{
            nombre.classList.remove("is-invalid");
            nombre.classList.add("is-valid");
            document.getElementById("nombreMal").innerText = "";
          }
        }
      });

      pass.addEventListener('focus', () => {
        error.innerText= "";
        pass.classList.remove("is-valid");
        pass.classList.remove("is-invalid");
      });

      pass.addEventListener('blur', () => {
        if (pass.value.length === 0) {
          pass.classList.remove("is-valid");
          pass.classList.add("is-invalid");
          document.getElementById("passMal").innerText = "No puede quedar vacío este campo.";
        } else {
          if(pass.value.length>16){
            pass.classList.remove("is-valid");
            pass.classList.add("is-invalid");
            document.getElementById("passMal").innerText = "La contraseña es demasiado larga";
          }else{
            pass.classList.remove("is-invalid");
            pass.classList.add("is-valid");
            document.getElementById("passMal").innerText = "";
          }
        }
      });

      pass2.addEventListener('focus', () => {
        error.innerText= "";
        pass2.classList.remove("is-valid");
        pass2.classList.remove("is-invalid");
        document.getElementById("pass2Mal").innerText = "";
      });

      pass2.addEventListener('blur', () => {
        const contrasenia = pass.value;
        const contrasenia2 = pass2.value;
        var igual = false;

        if (contrasenia2.length === 0) {
            pass2.classList.remove("is-valid");
            pass2.classList.add("is-invalid");
            document.getElementById("pass2Mal").innerText = "No puede quedar vacío este campo.";
          } else {
            if (contrasenia2 !== contrasenia) {
                igual = true;
              }
              if (igual) {
                pass2.classList.add("is-invalid");
                pass2.classList.remove("is-valid");
                document.getElementById("pass2Mal").innerText = "La contraseña no coincide";
              } else {
                pass2.classList.add("is-valid");
                pass2.classList.remove("is-invalid");
                document.getElementById("pass2Mal").innerText = "";
              }
          }
      });
}