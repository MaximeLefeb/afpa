<?php 
    include_once 'Personne.php';
    include_once 'Developpeur.php';
    include_once 'Manager.php';

    //TODO 
    $dev1 = new Developpeur(1,"SALIM", "Martin", "SALIMmartin@gmail.com", "06 37 88 12 64", 3500, "java");
    $dev1 = new Developpeur(2,"LEFEBVRE", "Maxime", "lefebvremaximee@gmail.com", "06 10 42 37 65", 2000, "php");
    $dev1->getSalaire();
    $dev1->calculerSalaire();
    echo Personne::$counter;
    
    // $dev2 = new Developpeur();
    // var_dump($dev1);
    
    //TODO
    // $manager1 = new Manager();
    // $manager2 = new Manager();
    // var_dump($manager1);

?>