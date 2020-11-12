<?php 
    //*PRINT TH
    function printServTableHeader() : Void { 
        ?>
        <th scope='col'>idService</th>
        <th scope='col'>Service</th>
        <th scope='col'>Ville</th>
        <?php if(ifAdmin()) { echo "<th scope='col'>Modifier</th> <th scope='col'>Supprimer</th>"; }
    }

    //*PRINT ARRAY ROW
    function printServTableRow(Int $i) :Void {
        echo "<tr id=trNo-$i>";
    }

    //*PRINT ROWCONTENT
    function printServTableContent($v) :Void {
        echo "<td>$v</td>";
    }

    //*PRINT BUTTONS
    function printServArrayButton(Int $idServ) :Void {
        echo "<td><a type='button' class='btn btn-primary' href='form_add_service.PHP?action=modify&idService=$idServ;'>Modifier</a></td>";
        echo "<td><a type='button' class='btn btn-danger' href='tableau_service.php?action=delete&idService=$idServ'>Supprimer</a></button><td>";
    }
?>