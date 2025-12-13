<?php
class DataBase {

    public static function connection() {
        try {
            $hostname = getenv('DB_HOST') ?: 'localhost';
            $port     = getenv('DB_PORT') ?: '3306';
            $database = getenv('DB_NAME') ?: 'database_php';
            $username = getenv('DB_USER');
            $password = getenv('DB_PASS');

            $dsn = "mysql:host=$hostname;port=$port;dbname=$database;charset=utf8";

            $pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            return $pdo;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new RuntimeException('Error de conexión a la base de datos');
        }
    }
}
        
        ## Conexión Azure
        // public static function connection(){
        //    $hostname = "serverphplimpio.mysql.database.azure.com";
        //    $port = "3306";
        //    $database = "database_php";
        //    $username = "admin_database";
        //    $password = getenv('DB_PASSWORD');
        //    $options = array(
        //        PDO::MYSQL_ATTR_SSL_CA => 'assets/database/DigiCertGlobalRootG2.crt.pem'
        //    );
        //    $pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password,$options);
        //    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //    return $pdo;
        //}
        
	}
?>