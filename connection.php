<?php

    class Database{

        private $dsn = 'mysql:host=localhost;dbname=crudoops';
        private $user= 'root';
        private $pass= '';
        public $conn;

        public function __construct(){

            try{
                $this->conn = new PDO($this->dsn, $this->user, $this->pass);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }

        }

        public function insert($nome, $sobrenome, $email, $telefone){

            $sql = "INSERT INTO tbl_user(nome, sobrenome, email, telefone) VALUES (:nome, :sobrenome, :email, :telefone)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['nome'=>$nome, 'sobrenome'=>$sobrenome, 'email'=>$email, 'telefone'=>$telefone]);

            return true;

        }

        public function read(){

            $data = array();

            $sql = "SELECT * FROM tbl_user";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($result as $row){
                $data[] = $row;
            }

            return $data;

        }

        public function getUserById($id){

            $sql = "SELECT * FROM tbl_user WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;

        }

        public function update($id, $nome, $sobrenome, $email, $telefone){

            $sql = "UPDATE tbl_user SET nome = :nome, sobrenome = :sobrenome, email = :email, telefone = :telefone WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['nome'=>$nome, 'sobrenome'=>$sobrenome, 'email'=>$email, 'telefone'=>$telefone, 'id'=>$id]);

            return true;

        }

        public function delete($id){

            $sql = "DELETE FROM tbl_user WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            return true;

        }

        public function totalRowCount(){

            $sql = "SELECT * FROM tbl_user";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $t_rows = $stmt->rowCount();

            return $t_rows;

        }

    }