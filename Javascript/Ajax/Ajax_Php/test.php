<?php
	include_once "Voiture.php";
	
	$volks1 = new Voiture("Volkswagen", "Golf");
	$volks2 = new Voiture("Volkswagen", "Polo");
	$volks3 = new Voiture("Volkswagen", "Arteon");
	
	$audi1 = new Voiture("Audi", "A4");
	$audi2 = new Voiture("Audi", "A5");
	$audi3 = new Voiture("Audi", "A6");

	$fiat1 = new Voiture("Fiat", "Panda");
	$fiat2 = new Voiture("Fiat", "500");
	$fiat3 = new Voiture("Fiat", "Stilo");

	
	$voitures = [$volks1, $volks2, $volks3,
	$audi1, $audi2, $audi3,
	$fiat1, $fiat2, $fiat3];
	
	$voituresReturn = [];
	
	if(!empty($_GET) && isset($_GET["marque"])  && !isset($_GET["afficher"])) {
		$voituresReturn = filterVoitureSelonMarqueEtModele($voitures, $_GET["marque"]);
		afficherOptions($voituresReturn);
	} elseif (empty($_GET)) {
		$voituresReturn = $voitures;
	} elseif(isset($_GET["marque"]) && isset($_GET["modele"])) {
		$voituresReturn = filterVoitureSelonMarqueEtModele($voitures, $_GET["marque"], $_GET["modele"]);
	} elseif(isset($_GET["marque"])) {
		$voituresReturn = filterVoitureSelonMarqueEtModele($voitures, $_GET["marque"]);
	}
	
	foreach ($voituresReturn as $voiture) {
		echo "<tr>
				<td>". $voiture->marque . "</td>
				<td>". $voiture->modele . "</td>
			</tr>";
	}

	function filterVoitureSelonMarqueEtModele(array $voitures, string $marque, string $modele=null) {
		$voituresReturn = [];
		foreach ($voitures as $voiture) {
			if($modele && $marque && $marque == $voiture->marque && $modele == $voiture->modele) {
				$voituresReturn[] = $voiture;
			} elseif(!$modele && $marque && $marque == $voiture->marque) {
				$voituresReturn[] = $voiture;
			} 
		}
		return $voituresReturn;
	}

	function afficherOptions(array $voituresReturn) {
		echo "<option value=''>Sélectionnez un modèle</option>";
		foreach ($voituresReturn as $voiture) {
			echo "<option value='" . $voiture->modele . "'>" . $voiture->modele . "</option>";
		}
	}
?> 