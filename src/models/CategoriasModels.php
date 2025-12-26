<?php 

namespace App\Models;

use PDO;

class CategoriasModels {

    private int $id;
    private string $categoria;
    private PDO $pdo;

    public function getId(): int {
        return $this->id;
    }

    public function getCategoria(): string {
        return $this->categoria;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setCategoria(string $categoria): void {
        $this->categoria = $categoria;
    }

    public function connect(){
        $server = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;        
        $this->pdo = new PDO($server, DB_USER, DB_PASS);
    }

    public function all(){
        $this->connect();
        $stmt = $this->pdo->prepare('SELECT ID AS id, NOMBRE AS categoria FROM categorias');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, CategoriasModels::class);
        return $stmt->fetchAll();
    }

    public function find(int $id){
        $this->connect();       
        $stmt = $this->pdo->prepare('SELECT ID AS id, NOMBRE AS categoria FROM categorias WHERE ID = :id');
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, CategoriasModels::class);
        return $stmt->fetch();
    }

    public function insert(array $post){
        $this->connect();       
        $stmt = $this->pdo->prepare('INSERT INTO categorias SET NOMBRE = :nombre');
        $stmt->execute([':nombre' => $post['nombre']]);
    }

    public function update(array $post, int $id){
        $this->connect();       
        $stmt = $this->pdo->prepare('UPDATE categorias SET NOMBRE = :nombre WHERE ID = :id');
        $stmt->execute([':nombre' => $post['nombre'], ':id' => $id]);
    }
    public function delete(int $id){
        $this->connect();       
        $stmt = $this->pdo->prepare('DELETE FROM categorias WHERE ID = :id');
        $stmt->execute([':id' => $id]);
    }   


}