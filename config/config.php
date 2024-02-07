<?php

    class Config {

        private $HOST = "127.0.0.1";
        private $USERNAME = "root";
        private $PSW = "";
        private $DB_NAME = "php-viva";
        private $table_name = "library";
        private $t_name = "book";
        public $connect;                               

        public function __construct() {
            $this->connect = mysqli_connect($this->HOST,$this->USERNAME,$this->PSW,$this->DB_NAME);

            if($this->connect) {
            }
            else {
                echo "Failled to connect...";
            }
        }

        public function insert($book_name) {

            $query = "INSERT INTO $this->t_name (book_name) VALUES ($book_name)";

            $res = mysqli_query($this->connect,$query); 

            return $res;

        }

        public function insertfk($id,$name,$b_id) {

            $q = "SELECT * FROM book WHERE book_id IN ('$b_id')";

            $r = mysqli_query($this->connect,$q); 
            
            if(mysqli_num_rows($r) == 1) {

                if($r) {
                     $query = "INSERT INTO library(id,name,b_id) VALUES('$id','$name','$b_id')";
                     $res = mysqli_query($this->conn,$query); 
                     return "book is Match Insert Success !!";
                }

            }
            else {
                return "book Is Not Valid !!!";
            }

        }

        // public function getAllData() {

        //     $query = "SELECT * FROM $this->table_name";

        //     $res = mysqli_query($this->conn,$query);  
            
        //     return $res;

        // }

        // public function delete($id) {
        //     $query = "DELETE FROM $this->table_name WHERE id=$id";
        //     return mysqli_query($this->conn,$query);   
        // }

        // public function update($id,$name,$age,$course) {
        //     $query = "UPDATE $this->table_name SET name='$name',age=$age,course='$course' WHERE id=$id";
        //     $res = mysqli_query($this->conn,$query);
        //     print_r($res);
        // }

    }

?>