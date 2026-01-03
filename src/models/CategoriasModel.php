<?php 

namespace App\Models;

use App\Models\EntityModel;

class CategoriasModels extends EntityModel {

    protected string $table = "categorias";
    protected string $alias = "c";    

    private ?int $id = null;
    private string $categoria = "";
    
    // ID
    public function getId(): ?int {
        return $this->id;
    }    

    // CATEGORIA
    public function getCategoria(): string {
        return $this->categoria;
    }
   
    public function setCategoria(string $categoria): void {
        $this->categoria = $categoria;
    }    


}