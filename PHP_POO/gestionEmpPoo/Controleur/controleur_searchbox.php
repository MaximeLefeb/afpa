<?php 
    include_once '../Service/serviceSearchBox.php';
    $searched = htmlentities($_POST['prenom']);
    $data = ServiceSearchBox::serviceFilter($searched);
?>