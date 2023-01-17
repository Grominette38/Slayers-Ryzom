


function verifData()
{  

	//alert("rr");
	 /* après un return la fonction est stoppée, donc si elle va jusqu'au bout c'est que tous les champs st bien remplis, 
	 elle renverra alors true ce qui declenchera le submit de la page*/
	 
	 /* on teste que la date/heure choisie ne soit pas sup à la date / heure actuelle*/
		//le calendrier verifie l'heure tt seul !!
		/*var dateChoisie = new Date(document.getElementById('datehDeces').value);
		var dateJour = new Date();
		alert(dateChoisie);
		alert(dateJour);
		
		if(dateChoisie.getTime() > dateJour.getTime()){
			//ds ce cas on verifie que l'heure ne soit pas plus avancé que l'heure actuelle
			document.write('pas bon!!!!!');
		}
		else
			document.write('bon');*/

	 
	 var msgErreur = "";
		
	 if (document.getElementById('boss').value=='' || document.getElementById('boss').value =='-1')
	 {
		
		msgErreur = "Veuillez renseigner le Roi";
	 }
	 
	 if (document.getElementById('suffix').value=='' || document.getElementById('suffix').value =='-1') 
	 {
		if(msgErreur=="")
			msgErreur = "Veuillez renseigner le Suffixe";
		else
			msgErreur += ", le Suffixe";
	 }
	 
	 if (document.getElementById('pos').value=='' || document.getElementById('pos').value =='-1')
	 {
		if(msgErreur=="")
			msgErreur = "Veuillez renseigner le Lieu ";
		else
			msgErreur += ", le Lieu";
	 }
	 
	 if (msgErreur == "") return true;
	 else
	 {
		msgErreur += " SVP."; 
		//alert(msgErreur);
		document.getElementById('labelErreur').innerHTML=msgErreur;
		return false;
	 } 
	 
}