<?php 

namespace App\Models;

use PDO;

// propiedades y métodos comunes para todas las entidades
class EntityModel {
    
    protected PDO $pdo;
    protected $table = 'tbl';

    public function connect(){
        $server = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;        
        $this->pdo = new PDO($server, DB_USER, DB_PASS);
    }

    public function all($columns = '*'){
        $this->connect();
        $query ="SELECT $columns FROM $this->table";
        $clase = get_class($this);
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $clase);
        return $stmt->fetchAll();
    }

    public function find( $columns, int $id){
        $this->connect();   
        $query = "SELECT $columns FROM $this->table WHERE ID = :id";   
        $clase = get_class($this); 
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $clase);
        return $stmt->fetch();
    }

    public function insert( $columns, $replaces){
        $this->connect();  
        $query = "INSERT INTO $this->table SET $columns";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute( $replaces ); 
    }

    public function update($columns, $replaces, int $id){
        $this->connect(); 
        $query = "UPDATE $this->table SET $columns WHERE ID = :id";      
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($replaces);
    }
    public function delete(int $id){
        $this->connect();  
        $query = "DELETE FROM $this->table WHERE ID = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
    }   
    
}   