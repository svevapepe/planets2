function validaForm(){
	var spaPar=document.myForm.inputPartenza.value;
	var spaArr=document.myForm.inputArrivo.value;
	if(spaPar=="nessuno"){
		window.alert("Inserire uno Spazioporto di partenza");
		return false;
	}
	if(spaArr=="nessuno"){
		window.alert("Inserire uno Spazioporto di arrivo");
		return false;
	}
	if(spaPar==spaArr){
		window.alert("Lo Spazioporto di partenza deve essere diverso da quello in arrivo");
		return false;
	}
	alert("Dati inseriti correttamente");
	return true;
}

function disabilitaData(){
	if(document.myForm.customRadioInline1.value=="Andata"){
        document.myForm.dataArr.disabled=true;
	}
	else{
		document.myForm.dataArr.disabled=false;
	}
}
function upanddown(op,elemento){
            var c=document.myForm.elements[elemento];
            var v=parseInt(c.value);
            if(isNaN(v)){alert('Inserire un valore numerico nel campo '+c.name+'.'); return;}
            if(op=='+' && v>=10) {alert('Massimo numero di biglietti che puoi aquistare'); return;}
            if(op=='+') v++;
            if(op=='-' && v>0) v--;
            c.value=v;
}