<?php 

namespace App\Models;


use App\Models\EntityModel;

class ProductosModels extends EntityModel {

    protected string $table = "productos";
    protected string $alias = "p";

    private ?int $id = null;
    private string $producto = "";
    private string $descripcion;
    private float $precio;
    private string $imagen;
    private string $fecha_alta;
    private int $estado;

    // ID
    public function getId(): ?int {
        return $this->id;
    }
     
    // PRODUCTO
    public function getProducto(): string {
        return $this->producto;
    }
    public function setProducto(string $producto): void {
        $this->producto = $producto;
    }

    // DESCRIPCION
    public function getDescripcion(): string {
        return $this->descripcion;
    }
    public function setDescripcion(?string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    // PRECIO
    public function getPrecio(): float {
        return $this->precio;
    }
    public function setPrecio(float $precio): void {
        $this->precio = $precio;
    }

    // IMAGEN
    public function getImagen(): ?string {
        return $this->imagen;
    }
    public function setImagen(?string $imagen): void {
        $this->imagen = $imagen;
    }

    // FECHA_ALTA
    public function getFechaAlta(): string {
        return $this->fecha_alta;
    }
    public function setFechaAlta(string $fecha_alta): void {
        $this->fecha_alta = $fecha_alta;
    }

    // ESTADO
    public function getEstado(): int {
        return $this->estado;
    }
    public function setEstado(int $estado): void {
        $this->estado = $estado;
    }
    
}