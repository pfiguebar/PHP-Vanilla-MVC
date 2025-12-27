<?php 

namespace App\Models;

use PDO;
use App\Models\EntityModel;

class ProductosModels extends EntityModel {

    protected PDO $pdo;
    protected $table = 'productos';

    private int $id;
    private string $nombre;
    private ?string $descripcion;
    private float $precio;
    private ?string $imagen;
    private string $fecha_alta;
    private int $estado;

    // ID
    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }

    // NOMBRE
    public function getNombre(): string {
        return $this->nombre;
    }
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    // DESCRIPCION
    public function getDescripcion(): ?string {
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