function validaForm(){

    var nome=document.myForm2.nome.value;
    if(!isNaN(parseInt(nome))){
        window.alert("Il Nome deve essere una Stringa");
        return false;
    }
    var cognome=document.myForm2.cognome.value;
    if(!isNaN(parseInt(cognome))){
        window.alert("Il Cognome deve essere una Stringa");
        return false;
    }
    if(document.myForm2.remember.checked){
        window.alert("Hai scelto di ricordarti per i prossimi accessi");
    }
    else
        return true;
}
function validaNome(){
    var nome=document.myForm2.nome.value;
    if(!isNaN(parseInt(nome))){
        window.alert("Il Nome deve essere una Stringa");
        return false;
    }
    return true;
}

function validaCognome(){
    var cognome=document.myForm2.cognome.value;
    if(!isNaN(parseInt(cognome))){
        window.alert("Il Cognome deve essere una Stringa");
        return false;
    }
    return true;
}
function verificaNumero(){
    var num=document.myForm2.phone.value;
    if(num<0){
        window.alert("Il numero non può essere negativo");
        return false;
    }
    return true;
}
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('form-signin');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();