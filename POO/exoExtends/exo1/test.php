 <?php 
    include_once 'Batiment.php';
    include_once 'Maison.php';

    $bat = new Batiment("20 Rue Nationale Lille");
    $maison = new Maison($bat->getAdresse(), 65.5, 4);

    echo $bat;

    var_dump($maison);  