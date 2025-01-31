<?php

class Db{
    
    private $host       = 'db';
    private $user       = 'root';
    private $password   = 'root';
    private $db         = 'blog_bis2bis';
    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db;
        $options = [
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->dbh = new PDO($dsn,$this->user, $this->password, $options);
        } catch (PDOException $e){
            print "Erro!: ".$e->getMessage().'<br/>';
            die();
        }
    }
    
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

        public function bind($parametro, $valor, $tipo = null){
            if(is_null($tipo)):
                switch (true):
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                    break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                    break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                    break;
                    default:
                    $tipo = PDO::PARAM_STR;
                endswitch;
            endif;
    
            $this->stmt->bindValue($parametro, $valor, $tipo);
        }
    
        public function executa(){
            return $this->stmt->execute();
        }
    
        public function result(){
            $this->executa();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
    
        public function results(){
            $this->executa();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
    
        public function totalResults(){
            return $this->stmt->rowCount();
        }

        public function ultimoIdInserido(){
            return $this->dbh->lastInsertId();
        }

}?>