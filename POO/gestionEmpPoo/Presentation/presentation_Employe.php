<?php 
    //*PRINT ARRAYBUTTON
    function printArrayButton(Int $id) :Void {
        echo "<td><a type='button' class='btn btn-primary' href='form_add_employe.PHP?action=modify&id=$id;'>Modifier</a></td>";
        echo "<td>"; if(!disabled($id)) {  echo "<a type='button' class='btn btn-danger' href='tableau_employe.php?action=delete&id=$id'>Supprimer</a></button>"; } echo "<td>";
    }

    //*PRINT ROWCONTENT
    function printTableContent($v) :Void {
        echo "<td>$v</td>";
    }

    //*PRINT ARRAY ROW
    function printTableRow(Int $i) :Void {
        echo "<tr id=trNo-$i>";
    }

    //*PRINT TH
    function printTableHeader() : Void { 
        ?>
        <th scope="col">id</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Emploi</th>
        <th scope="col">Supérieur</th>
        <th scope="col">Date d'embauche</th>
        <th scope="col">Salaire</th>
        <th scope="col">Commission</th>
        <th scope="col">Numéro de service</th>
        <th scope="col">Numéro de projet</th>
        <?php if(ifAdmin()) { echo "<th scope='col'>Modifier</th> <th scope='col'>Supprimer</th>"; }
    }
?>