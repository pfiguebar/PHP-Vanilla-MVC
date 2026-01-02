<?php 

namespace App\Models;

use PDO;

// propiedades y métodos comunes para todas las entidades
class EntityModel {
    
    protected PDO $pdo;
    protected $table = 'tbl';
    protected $alias = 't';

    private $query = '';
    private $replaces = [];

    public function connect(){
        $server = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;        
        $this->pdo = new PDO($server, DB_USER, DB_PASS);
    }


    /*
    UNA CONSULTA SELECT COMPLETA ESTA FORMADA POR:
    SELECT columna1, columna2, COUNT(columnaN) | *
    FROM tabla AS alias

    $filters['join'] => array ( 
        ['table' => 'otra_tabla AS ot', 'on' => 'ot.PK = alias.FK', 'type' => '' ] ,
        ['table' => 'otra_tabla_mas AS otm', 'on' => 'otm.ID = ot.FK', 'type' => 'left' ] ,
        ['table' => 'ultima_tabla AS ut', 'on' => 'ut.PK = alias.ID', 'type' => 'right' ]
    )
    JOIN otra_tabla AS ot ON ot.PK = alias.FK
    LEFT JOIN otra_tabla_mas AS otm ON otm.ID = ot.FK
    RIGHT JOIN ultima_tabla AS ut ON ut.PK = alias.ID
    
    $filters['where'] => 'condicion1 AND|OR condicion2 AND|OR condicionN'
    WHERE condicion1 AND|OR condicion2 AND|OR condicionN
        
    $filters['group'] => 'columna1, columna2, columna3'
    GROUP BY columna1, columna2, columna3
        
    $filters['having'] => 'condicion1 AND|OR condicion2 AND|OR condicionN'
    HAVING condicion1 AND|OR condicion2 AND|OR condicionN

    $filters['order'] => 'columna1 ASC|DESC, columna2 ASC|DESC'
    ORDER BY columna1 ASC|DESC, columna2 ASC|DESC

    $filters['limit'] => 'inicio, cantidad'
    LIMIT inicio, cantidad
    */
    public function select($columns = '*', $filters = [], $onlyOne = false){
        
        $this->query ="SELECT $columns FROM $this->table AS $this->alias";
        
        if (isset($filters['join'])) {
            foreach ($filters['join'] as $join) {
                $type = isset($join['type']) ? strtoupper($join['type']) . ' ' : '';
                $this->query .= " {$type}JOIN {$join['table']} ON {$join['on']}";
            }
        }
        
        if (isset($filters['where'])) { 
            $this->query .= " WHERE {$filters['where']}";
        }
        
        
        if (isset($filters['group'])) {
            $this->query .= " GROUP BY {$filters['group']}";
        }
        
        if (isset($filters['having'])) {
            $this->query .= " HAVING {$filters['having']}";
        }
        
        if (isset($filters['order'])) {
            $this->query .= " ORDER BY {$filters['order']}";
        }
        
        if (isset($filters['limit'])) {
            $this->query .= " LIMIT {$filters['limit']}";
        }
        
        $this->replaces = $filters['replaces'] ?? null;
        return $this->execute( true, $onlyOne );        
        
    }
    

    public function insert( $columns, $replaces){       
        $this->query = "INSERT INTO $this->table SET $columns";
        $this->replaces = $replaces;
        $this->execute();
    }

    public function update($columns, $replaces, int $id){       
        $this->query = "UPDATE $this->table SET $columns WHERE ID = :id"; 
        $this->replaces = $replaces;
        $this->replaces[':id'] = $id;     
        $this->execute();
    }

    public function delete(int $id){          
        $this->query = "DELETE FROM $this->table WHERE ID = :id";        
        $this->replaces = [':id' => $id];
        $this->execute();
    }  
    
    private function execute( $fetch = false, $onlyOne = false){
        $this->connect();
        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute($this->replaces ?? null);

        if ($fetch){
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));
            return $onlyOne ? $stmt->fetch() : $stmt->fetchAll();
        }
    }
    
}   