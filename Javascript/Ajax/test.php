<!-- <option value="FR">France</option>
<option value="GB">Grande Bretagne</option>
<option value="PO">Pologne</option>
<option value="RU">Russie</option>
<option value="ES">Espagne</option>
<option value="CA">Canada</option> 
<p> Hello World ! </p> -->

<?php
	include_once "Voiture.php";
	$Voiture_Array = array();

	$car1 = new Voiture();
	$car1->setMarque('Volkswagen')->setModele('Golf');

	$car2 = new Voiture();
	$car2->setMarque('Fiat')->setModele('500');

	$car3 = new Voiture();
	$car3->setMarque('Fiat')->setModele('Panda');

	array_push($Voiture_Array, $car1);
	array_push($Voiture_Array, $car2);
	array_push($Voiture_Array, $car3);

	foreach ($Voiture_Array as $key => $value) {
		
	}
?> 