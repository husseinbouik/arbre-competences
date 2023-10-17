<?php 
class DatabaseConnection {
    private $host = "localhost"; // Update the host name if needed
    private $user = 'root'; // Update the database username
    private $dbname = 'gestion_competences'; // Update the database name
    private $password = ''; // Update the database password

    public function connect() {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
            $db = new PDO($dsn, $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $db;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}



?>