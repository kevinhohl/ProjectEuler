<?php
include(dirname(__FILE__).'/config/dbconfig.php');
/*
 * Class to connect to the database
 */
class DBInterface {

    public function __construct(){}

    private function dbConnect() {
        try {
            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "DB Connection failed " . $e->getMessage();
            die; // don't continue without db
        }
        return $conn;
    }

    protected function dbQuery($sql) {
        $conn = $this->dbConnect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $conn = null;
        return $result;
    }

    protected function dbUpdateOrInsert($sql) {
        $conn = $this->dbConnect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;
    }
    
}
?>