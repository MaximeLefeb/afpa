<?php 
    function printEmployeArray() :Void{
        $dataEmp = searchAllEmp();
        $i = 1;

        foreach ($dataEmp as $value) {
            echo "<tr id=trNo-".$i.">";
            foreach ($value as $v) {
                echo "<td>$v</td>";
            }

            if ($_SESSION['tou'] == 'Administrateur') {
                ?>
                <td><a type='button' class='btn btn-primary' href='form_add_employe.PHP?action=modify&id=<?php echo $value["id"];?>'>Modifier</a></td>";
                <td><a type='button' class='btn btn-danger <?php if(disabled($value["id"])){ echo "isDisabled'";} if(!disabled($value["id"])){ ?>href='tableau_employe.php?action=delete&id=<?php echo $value["id"];}?>'>Supprimer</a></button></td>
                <?php
            }
            echo"</tr>";
            $i++;
        }
    }

    function ifAdmin(String $printContant1, String $printContant2) :Void {
        if ($_SESSION['tou'] == 'Administrateur') {
            echo $printContant1;
            echo $printContant2;
        }
    }
?>