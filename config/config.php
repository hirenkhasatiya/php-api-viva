<?php

    class Config {

        private $HOST = "127.0.0.1";
        private $USERNAME = "root";
        private $PSW = "";
        private $DB_NAME = "php-viva";
        private $table_name = "library";
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

            $query = "INSERT INTO book(book_name) VALUES ('$book_name')";

            $res = mysqli_query($this->connect,$query); 

            return $res;

        }

        public function insertfk($name,$b_id) {

            $q = "SELECT * FROM book WHERE book_id IN ('$b_id')";

            $r = mysqli_query($this->connect,$q); 
            
            if(mysqli_num_rows($r) == 1) {

                if($r) {
                     $query = "INSERT INTO library(name,b_id) VALUES('$name','$b_id')";
                     $res = mysqli_query($this->connect,$query); 
                     return "book is Match Insert Success !!";
                }

            }
            else {
                return "book Is Not Valid !!!";
            }

        }

        public function getAllData() {

            $query = "SELECT * FROM book";

            $res = mysqli_query($this->connect,$query);  
            
            return $res;

        }

        public function update($id,$name,$b_id) {
            $query = "UPDATE $this->table_name SET name='$name',b_id=$b_id WHERE id=$id";
            $res = mysqli_query($this->connect,$query);
            return $res ? "$id updated..." : "$id failed to update...";
        }

        public function getSingleData($id) {
            $query = "SELECT * FROM $this->table_name WHERE id=$id";
            return mysqli_query($this->connect,$query);
        }

        public function delete($id) {
            $query = "DELETE FROM $this->table_name WHERE id=$id";
            return mysqli_query($this->connect,$query);  
        }
    }

?>