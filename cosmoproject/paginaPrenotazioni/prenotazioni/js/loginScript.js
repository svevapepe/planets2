function validaForm(){
	var spaPar=document.myForm.inputPartenza.value;
	var spaArr=document.myForm.inputArrivo.value;
	var navi=document.myForm.inputNavicella.value;
	if(spaPar=="nessuno"){
		window.alert("Scegliere uno Spazioporto di Partenza!");
		return false;
	}
	if(spaArr=="nessuno"){
		window.alert("Scegliere uno Spazioporto di Arrivo!");
		return false;
	}
	if(navi=="nessuno"){
		window.alert("Scegliere uno il tipo di navicella");
		return false;
	}
	alert("Dati inseriti correttamente");
	return true;
}
