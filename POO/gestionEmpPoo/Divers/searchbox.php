<?php 
    include_once '../Service/service_Employe.php';
    include_once '../Presentation/presentation_Employe.php';

    //*SEARCH BAR

    $data = service_Employe::service_searchAllEmp();
    $ReturnedEmploye = filterByName($data, $_GET["nom"]);
    echo json_encode($ReturnedEmploye);

    function filterByName(array $employeList, String $searchedName) :Array {
        $ReturnedEmploye = [];
        $searchedName = '/' . $searchedName . '/';
        foreach ($employeList as $emp) {
            if($searchedName && preg_match($searchedName, $emp->getNom())) {
                $ReturnedEmploye[] = $emp;
            }
        }
        return $ReturnedEmploye;
    }
?> 