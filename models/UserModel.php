<?php
    class UserModel {
        public function authenticate($username, $password) {
            $connection = DatabaseConnection::connect();

            $query = "SELECT u.nomUtilisateur, u.nom, u.prenom, r.nomRole FROM utilisateurs AS u INNER JOIN roles AS r ON u.idRole = r.id WHERE u.nomUtilisateur = ? AND u.motdepasse = ?";
            $stmt = $connection->prepare($query);
            $stmt->execute([$username, $password]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                session_start();
                $_SESSION["username"] = $result["nomUtilisateur"];
                $_SESSION["firstname"] = $result["prenom"];
                $_SESSION["lastname"] = $result["nom"];
                $_SESSION["role"] = $result["nomRole"];
                return true;
            }
            return false;
        }

        function set_username($_username) {
            $this->_username = $_username;
        }

        function get_username() {
            return $this->_username;
        }

        function set_firstname($_firstname) {
            $this->_firstname = $_firstname;
        }

        function get_firstname() {
            return $this->_firstname;
        }

        function set_lastname($_lastname) {
            $this->_lastname = $_lastname;
        }

        function get_lastname() {
            return $this->_lastname;
        }

        function set_role($_role) {
            $this->_role = $_role;
        }
        
        function get_role() {
            return $this->_role;
        }
    }
?>
