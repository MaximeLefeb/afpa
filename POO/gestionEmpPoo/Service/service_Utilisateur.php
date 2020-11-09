<?php 
    include_once '../DAO/Utilisateur_mysqli_DAO.php';
    include_once '../Controleur/controleur_Utilisateur.php';

    Class service_Utilisateur {

        public static function hashPwd(String $pwd) :String {
            $beHashed = password_hash($pwd, PASSWORD_DEFAULT);
            return $beHashed;
        }

        public static function verifyPwd(string $mail, string $pwd) :String {
            $data = Utilisateur_mysqli_DAO::searchUser($mail);
            $isPasswordCorrect = password_verify($pwd, $data['password']);
            return $isPasswordCorrect;
        }

        public static function service_searchUser(String $mail) :?Array {
            $data = Utilisateur_mysqli_DAO::searchUser($mail);
            return $data;
        }
        
    }

?> 