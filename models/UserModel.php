<?php
    class UserModel {
        public $_username = null;
        public $_firstname = null;
        public $_lastname = null;
        public $_role = null;

        public function fill($username, $password) {
            $connection = DatabaseConnection::connect();

            $query = "SELECT u.nomUtilisateur, u.nom, u.prenom, r.nomRole FROM utilisateurs AS u INNER JOIN roles AS r ON u.idRole = r.id WHERE u.nomUtilisateur = ? AND u.motdepasse = ?";
            $stmt = $connection->prepare($query);
            $stmt->execute([$username, $password]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $this->_username = $result["nomUtilisateur"];
                $this->_firstname = $result["prenom"];
                $this->_lastname = $result["nom"];
                $this->_role = $result["nomRole"];
            }
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
