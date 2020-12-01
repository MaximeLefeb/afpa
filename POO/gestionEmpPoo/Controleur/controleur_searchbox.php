<?php 
    include_once '../Service/serviceSearchBox.php';
    $searched = $_POST['prenom'];
    $data = ServiceSearchBox::serviceFilter($searched);
    var_dump($data);
    
?>