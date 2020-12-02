<?php 

    include_once 'Profil.php';
    include_once 'Personne.php';
    include_once 'Utilisateur.php';

    $profilMN = new Profil(1, "MN", "Manager");
    $profilDG = new Profil(2, "DG", "Directeur général");
    $profilCP = new Profil(3, "CP", "Chef de projet");
    
    $personne1 = new Personne(1, "David", "DUPOND", "d.d@gmail.com", "0610423765", 1000);
    $personne2 = new Personne(2, "Paul", "DUPOND", "Paul@gmail.com", "0618523024", 1000);
    $personne3 = new Personne(3, "Omar", "DUPOND", "Omar@gmail.com", "0610424859", 1000);

    $user1 = new Utilisateur($personne1, "dave", "123456", "Informatique", $profilMN);
    $user1->setLogin("dave")->setPassword("123456")->setService("Informatique")->setProfil($profilMN);
    $user2 = new Utilisateur($personne2, "Polo", "123456", "Informatique", $profilDG);
    $user3 = new Utilisateur($personne3, "dave", "azerty", "Informatique", $profilCP);
    
    var_dump($user1);

    echo $user2->calculerSalaire();
?>