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

