<?php 
    include_once 'Personne.php';
    include_once 'Etudiant.php';
    include_once 'Employe.php';
    include_once 'Professeur.php';

    //*OK
    $employe_1 = new Employe("DOUK","Rachid",10000.0);
    $employe_2 = new Employe("NGOYE","Roland",10000.0);
    echo "La liste des employes : \n" . $employe_1 . "\n" . $employe_2 . "\n";

    //*OK
    $etudiant_1 = new Etudiant("OBAKA","Med",65678754);
    $etudiant_2 = new Etudiant("ALSENY","Thomas",87543543);
    echo "La liste des étudiants : \n" . $etudiant_1 . "\n" . $etudiant_2 . "\n";

    //*OK
    $prof_1 = new Professeur("OBA","Kevin",5700.0,"JAVA/JEE");
    $prof_2 = new Professeur("MAGASSOUBA","Cheick",5000.0,"PHP");
    echo "La liste des Professeurs : \n" . $prof_1 . "\n" . $prof_2 . "\n";

?>