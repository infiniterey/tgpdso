<?php
  class Pdolib {
    private $db;
      
    public function __construct(){
      try{
        $mysql = new PDO("mysql:host=localhost", 'root', '');
        $pstatement = $mysql->prepare("CREATE DATABASE IF NOT EXISTS tgpdso_db");
        $pstatement->execute();
        $this->db = new PDO("mysql:host=localhost;dbname=tgpdso_db", 'root', '');
      }
      catch(PDOException $e){
        die($e->getMessage());
      }
    }
      
    public function createTable($tableName,$tableStruc){
      try{
        $this->db->exec("$tableStruc");
      }
      catch(Exception $e){
        echo "Table $tableName not successfully created! <br/> <br/>";
      }
    }
      
    public function insertRecord($insertSql){
      try{
        $this->db->exec("$insertSql");
      }
      catch(Exception $e){
        echo "Insert record not successfully done! <br/> <br/>";
      }
    }
     
    public function tableExists($table){
      $db_tables = array_keys($this->db->query('show tables')->fetchAll (PDO::FETCH_GROUP));
    
      if(in_array($table, $db_tables)){
        return TRUE;
      }
      else{
        return FALSE;
      }
    }
  }
?>