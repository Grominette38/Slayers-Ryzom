<?php

date_default_timezone_set('Europe/Paris'); 




if(isset($_POST['Ajouter']))
{
	//echo 'paré pour l\'enregistrement !';
    
	$xml = simplexml_load_file("roipop.xml") or die("Erreur de chargement de fichier.");
	$docXML = new SimpleXMLElement($xml->asXML());
	
	
	$idpoproi = 0;
	//avant toute chose on prend l'id max de ts les rois
	
	foreach($docXML->continent as $continent){ 				
		//boucle lieu
		foreach($continent->lieu as $lieu){ 
					
			//boucle roi
			foreach($lieu->poproi as $poproi){ 
				if(intval($poproi["id"])>intval($idpoproi)) $idpoproi = $poproi["id"];					
			}
		}
	 }
	  
	//on incremente l'id le plus haut existant de 1
	$idpoproi = $idpoproi  + 1 ;

	
	//on procede à l'ajout au bon endroit. donc prendre bon continent bon lieu
	//id position contient l'id continent et après _ id lieu
	$idContinent = explode("_", $_POST['pos'])[0] ;
	$idlieu = explode("_", $_POST['pos'])[1] ;
		
	
	//$lieu = $docXML->continent[intval($idContinent)]['id'];
	//$lieu = $lieu->lieu[intval($idlieu)]['nom'];
	
	
	
	//on reformate la date et l'heure
	//echo $_POST['datehDeces'];
	
	$heure = explode("T", $_POST['datehDeces'])[1] ;
	//echo $heure;
	$date = explode("T", $_POST['datehDeces'])[0] ;
	$date = explode("-", $date)[2]."/".explode("-", $date)[1]."/".explode("-", $date)[0] ;
	
	
	foreach($docXML->continent as $continent)
	{
 		
		if(intval($idContinent) == intval($continent["id"]))
		{
			//boucle lieu
			foreach($continent->lieu as $lieu)
			{
				if(intval($idlieu)==intval($lieu["id"]))
				{
					//echo " roi ".$idpoproi;
					$newItem = $lieu->addChild("poproi");
					$newItem->addAttribute("id", $idpoproi);
					$newItem->addAttribute("nom", $_POST['boss'].$_POST['suffix']);
					$newItem->addAttribute("date", $date);
					$newItem->addAttribute("heure", $heure);
					break;
				}
					
			}	
		
		}
	}
	
	$docXML->asXML("roipop.xml");

	
	header('Location: roi.php');
}
//fonction de suppression
else
{
	/*explication, on ne puet pas mettre l'id roi ds value du submit car apparait sur le tableau visuel
	donc on nomme l'index post en Supprimer_id
	on ne peut pas non plus declencher de submit en js et passer la valeur de l'id à ce moment car 
	js interdit uur serveur ryzom*/
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$idPopRoi ="";
		//print_r($_POST);
		
		foreach($_POST as $index=>$valeur){
			//echo '- '.$index.'<br/>';
			if (stristr($index, 'Supprimer_')==true) {
				$idPopRoi = explode("_", $index)[1] ;				
			} 
		} 

		//on recupere l'identifiant du noued a supprimer
		//$idPopRoi = $_POST['Supprimer'][0];
		//echo $idPopRoi;

		$data = new DOMDocument();
		$data->load('roipop.xml');
		$xpath = new DomXpath($data);
		$racine = $data->documentElement;
		$query = '/donnees/continent/lieu/poproi[@id="'.$idPopRoi.'"]';
		$roiPops = $xpath->query($query);
		
		foreach($roiPops as $roiPop)
		{
			echo "juste avant le remove...";
			//$remove = $roiPop->parentNode;
			//$remove = $roiPop;
			$roiPop->parentNode->removeChild($roiPop);
		}
		$data->save('roipop.xml');
		header('Location: roi.php');
	}

}






//a garder pour le cas ou les tests javascript ne passent pas sur le serveur ryzom
/// virifier les donner suivante: boss   suffix  pos day month  year  hour minute ///
 /*if(isset($_POST['boss']) AND isset($_POST['suffix']) AND isset($_POST['pos']) AND isset($_POST['day']) AND isset($_POST['month']) AND isset($_POST['year']) AND isset($_POST['hour'])AND isset($_POST['minute']))
    {
    /// si les dossier sont pas vide ///
    if(!empty($_POST['boss']) AND !empty($_POST['suffix']) AND !empty($_POST['pos']) AND !empty($_POST['day']) AND !empty($_POST['month']) AND !empty($_POST['year']) AND !empty($_POST['hour'])AND !empty($_POST['minute']))

         {

          $boss=htmlspecialchars($_POST['boss']);
          $suffix=htmlspecialchars($_POST['suffix']);
          $pos=htmlspecialchars($_POST['pos']);
          $day=htmlspecialchars($_POST['day']);
          $month=htmlspecialchars($_POST['month']);
          $year=htmlspecialchars($_POST['year']);
          $hour=htmlspecialchars($_POST['hour']);
          $minute=htmlspecialchars($_POST['minute']);


 echo "<h2> Le roi:  <mark><b> $boss $suffix $pos $day $month $year $hour $minute </b></mark> est ajouter au tableau! </br></mark></h2>";*/

?>






