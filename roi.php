<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

	<head>
		<meta charset="UTF-8">
		<title>I SLAYERS I</title>

		<link rel="stylesheet" type="text/css" href="styleroi.css">
		<!-- **MCT** inclusion du fichier js pour verif des zones à ajouter -->		
		<script type="text/javascript" src="verifs.js"></script>  		
		<?php require("fonctions.php"); ?>
		
	</head>


	<li id="logo"><a href="index.html">Page d'Acceuil</a></li>



	<body bgcolor="#FFFFFF">
	
		<span id="date_heure"></span>
		<table border="0" align="center">
			<tr>
				<td>
					<h1>I SLAYERS I</h1>
				</td>
			</tr>

		</table>
				
		    <!-- **MCT** lors du click sur le bouton submit, une fonction js est lancée pour verifier que les champs st correctement renseignés
		    cela evite de reacherger la page pour rien -->
		<form id ="maForm" action="ajoutSup.php" method="post" >
		
			<!-- **MCT** table des choix pour ajout : listes déroulantes etc... -->
			<table align='center'>
				<tbody>
					<tr>
						<td align="center">Roi</td>
						<td align="center">Suffixe</td>
						<td align="center">Lieu</td>
						<td align="center">Date & heure</td>														
						<td align="center">(FR)</td>
					</tr>
					<tr>

						<td>
							
							<select id="boss" name="boss">
								<option value="-1" selected="">-</option>
								<?php listeRois(); ?>
								<!-- <option value="arana">Arana</option><option value="arm">Arm</option><option value="bawa">Bawa</option><option value="bodo">Bodo</option><option value="bol">Bol</option><option value="capry">Capry</option><option value="clopper">Clopper</option><option value="cratcha">Cratcha</option><option value="cray">Cray</option><option value="cu">Cu</option><option value="cuttle">Cuttle</option><option value="fra">Fra</option><option value="gibba">Gibba</option><option value="gin">Gin</option><option value="gnoo">Gnoo</option><option value="goa">Goa</option><option value="guba">Guba</option><option value="horn">Horn</option><option value="iga">Iga</option><option value="iza">Iza</option><option value="jav">Jav</option><option value="ju">Ju</option><option value="jugu">Jugu</option><option value="kiba">Kiba</option><option value="kidi">Kidi</option><option value="kincher">Kincher</option><option value="kin">Kin</option><option value="kipee">Kipee</option><option value="kipes">Kipes</option><option value="kipu">Kipu</option><option value="kiro">Kiro</option><option value="kiza">Kiza</option><option value="kizo">Kizo</option><option value="lump">Lump</option><option value="mada">Mada</option><option value="me">Me</option><option value="messa">Messa</option><option value="naja">Naja</option><option value="ocy">Ocy</option><option value="plode">Plode</option><option value="psyko">Psyko</option><option value="ragu">Ragu</option><option value="raspa">Raspa</option><option value="rendo">Rendo</option><option value="shala">Shala</option><option value="shoo">Shoo</option><option value="slave">Slave</option><option value="stin">Stin</option><option value="tim">Tim</option><option value="tor">Tor</option><option value="tyra">Tyra</option><option value="vary">Vary</option><option value="vor">Vor</option><option value="womba">Womba</option><option value="yber">Yber</option><option value="yel">Yel</option><option value="yeti">Yeti</option><option value="yubo">Yubo</option><option value="zer">Zer</option>                                            </select>
								-->
						</td>
						<td>
							<select id="suffix" name="suffix">
								<option value="-1" selected="">-</option>
								<?php listeSuffixes(); ?>
								<!--<option value="kan">kan</option><option value="keth">keth</option><option value="kin">kin</option><option value="kya">kya</option><option value="kyo">kyo</option><option value="koo">koo</option>                                            </select>
								-->
						</td>
						<td>
							<select id="pos" name="pos">
								<option value="-1" selected="">-</option>
								<?php listeLieux(); ?>
								<!--<optgroup label="Désert Ardent"><option value="couloir brûlé">Couloir Brûlé</option><option value="canyon interdit">Canyon Interdit</option><option value="dunes sauvages">Dunes Sauvages</option><option value="dunes de l'exil">Dunes de l'Exil</option></optgroup><optgroup label="Sommet Verdoyant"><option value="bosquet de la confusion">Bosquet de la Confusion</option><option value="marais supérieur">Marais Supérieur</option><option value="masure de l'hérétique">Masure de l'Hérétique</option><option value="source cachée">Source Cachée</option></optgroup><optgroup label="Pays Malade"><option value="vide">Vide</option><option value="bosquet de l'ombre">Bosquet de l'Ombre</option><option value="noeud de la démence">Noeud de la Démence</option></optgroup><optgroup label="Aeden Aqueous"><option value="lagons de loria">Lagons de Loria</option><option value="ile enchantée">Ile Enchantée</option><option value="plages d'abondance">Plages d'Abondance</option></optgroup><optgroup label="Primes et Autres"><option value="nexus">Nexus</option><option value="kitinière">Kitinière</option><option value="cité engloutie">Cité Engloutie</option><option value="profondeurs interdites">Profondeurs Interdites</option><option value="terre de la continuité">Terre de la Continuité</option><option value="sources interdites">Sources Interdites</option><option value="forêt insaisissable">Forêt Insaisissable</option><option value="la fosse aux épreuves">La Fosse aux Épreuves</option><option value="gouffre d'ichor">Gouffre d'Ichor</option></optgroup>                                            </select>
								-->
						</td>
						<td>
							<!-- **MCT** j'insere un calendrier avec la date du jourpar défaut en php
							je bloque avec max egalement la selection d'une date posterieure-->
							<?php date_default_timezone_set('Europe/Paris'); ?>
							<input type="datetime-local" id="datehDeces"
							name="datehDeces" value="<?php echo date('Y-m-d H:i'); ?>" max="<?php echo date('Y-m-d H:i'); ?>">	
						</td>
						
						
						<td>
							<input type="submit" name="Ajouter" value="Ajouter" onClick="return verifData();">
							
							
						</td>
					</tr>
					<tr>
					<td colspan ='6' align='center' ><label color='red' id='labelErreur' name='labelErreur'></label></td>
					</tr>
				</tbody>
			</table>
			<!-- **MCT** fin table des choix pour ajout : listes déroulantes etc... -->
		

		<!-- **MCT** table d'affichage des données existantes -->
		<table align='center'>
			<tr>
				<td align="center">
					<font color="#000000" size="14"></font>
					<table border="0">
						<tbody>
							<tr>
								<td align="center">Continent</td>
								<td align="center">Lieu</td>
								<td align="center">Roi</td>
								<td width="150" align="center">Décès</td>
								<td align="center">Heures</td>
							</tr>
							<?php affichageTable(); ?>
							<!--<tr>		 
								<td bgcolor="#FFCC80" rowspan="4"><strong>Désert Ardent</strong></td>
								<td bgcolor="#FFCC80"><strong>Couloir Brûlé</strong></td>
								<td bgcolor="#FFCC80">Aranaketh</td>
								<td bgcolor="#FFCC80" align="center">21/10/2022 14:00</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#FFCC80"><strong>Canyon Interdit</strong></td>
								<td bgcolor="#FFCC80">Kipeeketh</td>
								<td bgcolor="#FFCC80" align="center">25/05/2022 14:10</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#FFCC80"><strong>Dunes Sauvages</strong></td>
								<td bgcolor="#FFCC80">Ocyketh</td>
								<td bgcolor="#FFCC80" align="center">25/09/2021 20:35</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#FFCC80"><strong>Dunes de l'Exil</strong></td>
								<td bgcolor="#FFCC80">Aranaketh</td>
								<td bgcolor="#FFCC80" align="center">24/05/2022 20:15</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFFF80" rowspan="4"><strong>Sommet Verdoyant</strong></td>
								<td bgcolor="#BFFF80"><strong>Bosquet de la Confusion</strong></td>
								<td bgcolor="#BFFF80">Aranakin</td>
								<td bgcolor="#BFFF80" align="center">29/05/2022 08:15</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFFF80"><strong>Marais Supérieur</strong></td>
								<td bgcolor="#BFFF80">Ginkin</td>
								<td bgcolor="#BFFF80" align="center">26/05/2022 09:40</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFFF80"><strong>Masure de l'Hérétique</strong></td>
								<td bgcolor="#BFFF80">Bolkin</td>
								<td bgcolor="#BFFF80" align="center">25/05/2022 14:45</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFFF80"><strong>Source Cachée</strong></td>
								<td bgcolor="#BFFF80">Cratchakin</td>
								<td bgcolor="#BFFF80" align="center">26/05/2022 00:10</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BF80FF" rowspan="3"><strong>Pays Malade</strong></td>
								<td bgcolor="#BF80FF"><strong>Vide</strong></td>
								<td bgcolor="#BF80FF">Cratchakyo</td>
								<td bgcolor="#BF80FF" align="center">28/05/2022 16:35</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BF80FF"><strong>Bosquet de l'Ombre</strong></td>
								<td bgcolor="#BF80FF">Wombakya</td>
								<td bgcolor="#BF80FF" align="center">23/05/2022 19:05</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BF80FF"><strong>Noeud de la Démence</strong></td>
								<td bgcolor="#BF80FF">Slavekya</td>
								<td bgcolor="#BF80FF" align="center">16/02/2022 20:05</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#80BFFF" rowspan="3"><strong>Aeden Aqueous</strong></td>
								<td bgcolor="#80BFFF"><strong>Lagons de Loria</strong></td>
								<td bgcolor="#80BFFF">Stinkan</td>
								<td bgcolor="#80BFFF" align="center">26/05/2022 19:25</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#80BFFF"><strong>Ile Enchantée</strong></td>
								<td bgcolor="#80BFFF">Shalaketh</td>
								<td bgcolor="#80BFFF" align="center">10/06/2022 15:35</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#80BFFF"><strong>Plages d'Abondance</strong></td>
								<td bgcolor="#80BFFF">Craykan</td>
								<td bgcolor="#80BFFF" align="center">27/09/2021 07:40</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFBFBF" rowspan="9"><strong>Primes et Autres</strong></td>
								<td bgcolor="#BFBFBF"><strong>Nexus</strong></td>
								<td bgcolor="#BFBFBF">Kibakin</td>
								<td bgcolor="#BFBFBF" align="center">25/05/2022 20:05</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFBFBF"><strong>Kitinière</strong></td>
								<td bgcolor="#BFBFBF">Kizokoo</td>
								<td bgcolor="#BFBFBF" align="center">21/11/2021 22:10</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFBFBF"><strong>Cité Engloutie</strong></td>
								<td bgcolor="#BFBFBF">Shalakoo</td>
								<td bgcolor="#BFBFBF" align="center">24/05/2022 11:10</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFBFBF"><strong>Profondeurs Interdites</strong></td>
								<td bgcolor="#BFBFBF">Tyrakoo</td>
								<td bgcolor="#BFBFBF" align="center">08/03/2022 16:45</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFBFBF"><strong>Terre de la Continuité</strong></td>
								<td bgcolor="#BFBFBF">Yelkoo</td>
								<td bgcolor="#BFBFBF" align="center">17/12/2021 20:05</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFBFBF"><strong>Sources Interdites</strong></td>
								<td bgcolor="#BFBFBF">Kincherkoo</td>
								<td bgcolor="#BFBFBF" align="center">15/05/2022 17:45</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFBFBF"><strong>Forêt Insaisissable</strong></td>
								<td bgcolor="#BFBFBF">Yelkoo</td>
								<td bgcolor="#BFBFBF" align="center">17/12/2021 19:40</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFBFBF"><strong>La Fosse aux Épreuves</strong></td>
								<td bgcolor="#BFBFBF">Madakoo</td>
								<td bgcolor="#BFBFBF" align="center">25/05/2022 17:00</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>
							
							<tr>
								<td bgcolor="#BFBFBF"><strong>Gouffre d'Ichor</strong></td>
								<td bgcolor="#BFBFBF">Ragukoo</td>
								<td bgcolor="#BFBFBF" align="center">26/05/2022 18:00</td>
								<td bgcolor="#FFFFFF" align="right">839</td>
							</tr>-->
																			
						</tbody>
					</table>
				</td>
			</tr>
		</table>
		</form>
		<!-- **MCT** table d'affichage des données existantes -->

	</body>


</html>
