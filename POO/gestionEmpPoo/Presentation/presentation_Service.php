<?php 
    function printServiceArray() :Void {
        $dataServ = searchAllServ();
        $i = 1;
        foreach ($dataServ as $key => $value) {
            echo "<tr id=trNo-".$i.">";
            foreach ($value as $k => $v) {
                echo "<td>$v</td>";
            }

            if ($_SESSION['tou'] == 'Administrateur') {
                ?>

                <td><a type='button' class='btn btn-primary' href='form_add_service.php?action=modify&idService=<?php echo $value["idService"];?>'>Modifier</a></td>";
                <td><a type='button' class='btn btn-danger ' href='tableau_service.php?action=delete&idService=<?php echo $value["idService"];?>'>Supprimer</a></button></td>
            
                <?php
            }

            echo"</tr>";
            $i++;
        }
    }
?>