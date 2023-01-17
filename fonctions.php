<?php


function listeRois()
{
	$fichierXML = 'roipop.xml';
	$docXML = simplexml_load_file($fichierXML);
    foreach($docXML->roi as $roi){
     // echo 'roi : '.$roi->id.' | Nom : '.$roi->nom.'<br>';  
	 //entre crochet = attribut d'une balise, -> = enfant d'une balise
	  echo '<option value='.$roi["nom"].'>'.$roi["nom"].'</option>';
	  
	}
}

function listeSuffixes()
{
	$fichierXML = 'roipop.xml';
	$docXML = simplexml_load_file($fichierXML);
    foreach($docXML->suffixe as $suffixe){ 
		echo '<option value='.$suffixe["nom"].'>'.$suffixe["nom"].'</option>';
	  
	}
}

function listeLieux()
{
    //on boucle sur chaque continent puis à l'intérieur sur chaque lieu
	$fichierXML = 'roipop.xml';
	$docXML = simplexml_load_file($fichierXML);
	//boucle continent
    foreach($docXML->continent as $continent){ 
		//echo "<script> alert ('". $continent["nom"] ."') </script>";
		echo '<optgroup label="'.$continent["nom"].'">';
		//boucle lieu
		foreach($continent->lieu as $lieu){ 
			echo '<option value="'.$continent["id"].'_'.$lieu["id"].'">'.$lieu["nom"].'</option>';
		}
		echo '</optgroup>';
	  
	}
}

function affichageTable()
{
    //on boucle sur chaque continent puis à l'intérieur sur chaque lieu, puis sur chaque roi
	$fichierXML = 'roipop.xml';
	$docXML = simplexml_load_file($fichierXML);
	$ligne="";
	$i=0;
	$cptLigne = 0;
	
	//boucle continent
    foreach($docXML->continent as $continent){ 
		
		$ligne="";
		$i=0;
		
				
		//boucle lieu
		foreach($continent->lieu as $lieu){ 
					
			//boucle roi
			foreach($lieu->poproi as $poproi){ 
				
				//si seconde ligne on doit refaire une ligne mais sans le  nom du continent car rowspan
				if ($i>0)
					$ligne .= '<tr>';
				$ligne .= '<td bgcolor='.$continent["couleur"].'><strong>&nbsp;'.$lieu["nom"].'&nbsp;</strong></td>';
				$ligne .= '<td bgcolor='.$continent["couleur"].'><strong>&nbsp;'.$poproi["nom"].'&nbsp;</strong></td>';
				$ligne .= '<td bgcolor='.$continent["couleur"].'><strong>&nbsp;'.$poproi["date"].' '.$poproi["heure"].'&nbsp;</strong></td>';
				$nbHeure = compteurTemps($poproi["date"], $poproi["heure"]);
				
				//on definit la coulaur de la cellule en fonction du nb h passées.
				/*
				00h à 48h  (le roi peu pas apparaitre) couleur rouge
				48h à 96h (le roi peu apparaitre) couleur vert
				96h à 120h (le roi a du être fait mais peut réapparaitre) couleur jaune  
				120h+ ( le roi est perdu / plus d'info) couleur gris
				
				*/
				if (intval($nbHeure) < 49) $couleur="#FF0000";
				if (intval($nbHeure) >48 && intval($nbHeure)<97 ) $couleur="#00FF00";
				if (intval($nbHeure) >96 && intval($nbHeure)<121 ) $couleur="#FFFF00";
				if (intval($nbHeure) > 120) $couleur="#808080 ";
				
				$ligne .= '<td bgcolor='.$couleur.' style="color:#FFFFFF" align="right">&nbsp;'.$nbHeure.'&nbsp;</td>';
				$ligne .= '<td bgcolor="white"><input type="submit" name="Supprimer_'.$poproi["id"].'" value="&#x2717;" class="croixSup">
				</td>';
				$ligne .= '</tr>';	
				$i++;
			}
			
						
		}
		//echo $i;
		//si pas de rois, alors on n'affiche pas le continent tout seul
		if ($ligne!="")
		{
			$ligne = '<tr><td bgcolor='.$continent["couleur"].' rowspan='.$i.'><strong>&nbsp;'.$continent["nom"].'&nbsp;</strong></td>'.$ligne ;
			
			//test pour afficher msg js pour voir le texte du tableau
			//echo "<script> alert ('". $ligne ."') </script>";
			
			echo $ligne;
			$cptLigne++;
		}
	}
	//si pas de ligne ds le tableau, on l'indique
	if($cptLigne == 0)
		echo '<tr bgcolor="lightgray"><td colspan="5" align="center" >Aucun enregistrement.</td></tr>';
}

function compteurTemps($dateDeces,$heureDeces)
{
	//date_default_timezone_set('Europe/Paris'); 
	//echo "<br>".$dateDeces."<br>";
	$dateDeces = str_replace("/","-",$dateDeces).$heureDeces;	
	//fonction qui calcule en focntion de la date du deces,
	//le nb heure passé et qui attribut une couleur à la cellule en fonction
	//echo "<br>**". $dateDeces."--<br>";	
	
	$dateDeb = new DateTime($dateDeces);
	$dateFin = new DateTime(date('d-m-Y H:i'));
	$nbHeures =  ($dateFin ->format('U') - $dateDeb ->format('U')) / 3600;
	
	//on arrondit à l'heure inf	
	$nbHeures = explode(".", $nbHeures)[0];
	
	
	/*$dateDeb = new DateTime('2009-10-25 01:00:00');
  $dateFin = new DateTime('2009-10-25 02:00:00');
  $nbHeures= ($dateFin ->format('U') - $dateDeb ->format('U')) / 3600;
  echo "<script> alert ('". $nbHeures ."') </script>";*/
	return $nbHeures;
	
}

?>