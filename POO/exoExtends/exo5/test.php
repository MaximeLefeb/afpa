<?php 
    include_once 'Cadre.php';
    include_once 'Ouvrier.php';
    include_once 'Patron.php';

    $cadre = new Cadre();
    $cadre->setMatricule("1593")->setPrenom("Maxime")->setNom("Lefebvre")->setBirthday("26/12/99")->setIndice(3);
    echo $cadre->getSalaire(); 

    $ouvrier = new Ouvrier();
    $ouvrier->setMatricule("1596")->setPrenom("Jean")->setNom("Pastèque")->setBirthday("05/08/91")->setDateEntree(new DateTime("01/01/1996"));
    echo $ouvrier->getSalaire();

    $patron = new Patron();
    $patron->setMatricule("1596")->setPrenom("Patrick")->setNom("Dupuit")->setBirthday("11/01/74")->setPourcentage(50));
    echo $patron->getSalaire();

    function bonjour(String $name, ?String $prenom = "Bonjour Monsieur/Madame") :void {
        echo "Bonjour $prenom $name";
    }

    bonjour("Legrand");
?>