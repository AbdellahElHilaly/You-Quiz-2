<?php
    include_once 'interface.php';
    

    class MySQLDatabase implements Database {
        private $pdo;
        private $dbname = 'youquiz';
        private $password  = '';
        private $username = 'root';
        private $host = 'localhost';

        public $id = 38;
        public $table; 
        public $data;



        public function __construct($host = null, $username = null, $password = null, $dbname = null) {
            if ($host !== null) {
                $this->host = $host;
            }
            if ($username !== null) {
                $this->username = $username;
            }
            if ($password !== null) {
                $this->password = $password;
            }
            if ($dbname !== null) {
                $this->dbname = $dbname;
            }

            // connect to the database using PDO
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
        }

        public function insert() {
            try {
                $columns = implode(", ", array_keys($this->data));
                $values = ":" . implode(", :", array_keys($this->data));
                $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($this->data);
                return true;
                } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
                }
        }

        public function select($where=NULL) {
            // select the data from the database
            $query = "SELECT * FROM $this->table $where ORDER BY RAND()";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function update($where=NULL) {
            try {
                $columns = implode(" = :, ", array_keys($this->data)) . " = :" . implode(" = :, ", array_keys($this->data));
                $sql = "UPDATE $this->table SET $columns  $where";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($this->data);
                return true;
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        public function delete($where=NULL) {
            // delete the data from the database
            $query = "DELETE FROM $this->table $where";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
        }
}


    









?>