<?php 
    class DatabaseConnection {
        private static $_host = "localhost";
        private static $_databaseName = "bdd_criee2";
        private static $_username = "root";
        private static $_password = "";
        private static $_connection = null;

        public static function connect() {
            if (self::$_connection === null) {
                try {
                    self::$_connection = new PDO("mysql:host=" . self::$_host . ";dbname=" . self::$_databaseName , self::$_username , self::$_password);
                    self::$_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $exc) {
                    die("Erreur de connexion à la base de données : " . $exc->getMessage());
                }
            }
            return self::$_connection;
        }

        public static function disconnect() {
            self::$_connection = null;
        } 
    }
?>