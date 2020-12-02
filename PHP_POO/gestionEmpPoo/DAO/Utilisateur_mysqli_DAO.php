<?php 
    include_once '../class/Utilisateur.php';
    include_once '../Divers/ConnectBdd.php';
    
    Class Utilisateur_mysqli_DAO {
        public static function AddUser(String $mail, String $pwd) :Void {
            $pwdHash = service_Utilisateur::hashPwd($pwd);
            $ToU = 'Utilisateur';
            
            $user = new Utilisateur;
            $user->setMail($mail)->setPwd($pwdHash);

            //* DB connexion
            $mysqli = new mysqli('localhost', 'root', '', 'sqlipoo');

            //* SQL request
            $stmt = $mysqli->prepare("INSERT INTO user (`id`, `mail`, `typeOfUser`, `password`) VALUES (NULL, ?, ?, ?)");
            $stmt->bind_param("sss", $mail, $ToU, $pwdHash);

            //* Verify request
            try {
                $stmt->execute();
            } catch (mysqli_sql_exception $e) {
                throw new DaoSqlException($e->getMessage(), $e->getCode());
            } finally {
                $mysqli->close();
            }
        }

        public static function searchUser(String $mail) :?Array {
            //* DB connexion
            $dbUser = ConnectBdd();

            //* SQL REQUEST
            $selectRequest = $dbUser->prepare("SELECT * FROM user WHERE mail = ?");
            $selectRequest->bind_param("s", $mail);

            try {
                $selectRequest->execute();
            } catch (mysqli_sql_exception $e) {
                throw new DaoSqlException($e->getMessage(), $e->getCode());
            }

            $rs   = $selectRequest->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);

            //* Close connection
            $rs->free();
            $dbUser->close();

            return $data;
        }
        
    }
?>