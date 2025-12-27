DROP DATABASE IF EXISTS PHPVanillaMVC;
CREATE DATABASE PHPVanillaMVC CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE PHPVanillaMVC;

CREATE TABLE productos (
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(200) NOT NULL,
    DESCRIPCION TEXT,
    PRECIO DECIMAL(6,2) NOT NULL,
    IMAGEN VARCHAR(200),
    FECHA_ALTA DATETIME DEFAULT CURRENT_TIMESTAMP,
    ESTADO TINYINT(1) NOT NULL DEFAULT 1
)engine=InnoDB;

INSERT INTO `productos` (`ID`, `NOMBRE`, `DESCRIPCION`, `PRECIO`, `IMAGEN`, `FECHA_ALTA`, `ESTADO`) VALUES
(1, 'Pizza Margarita', 'Una pizza clásica y elegante que celebra la simplicidad en su máxima expresión. Una base fina y crujiente cubierta con una suave salsa de tomate natural, mozzarella fundida y hojas frescas de albahaca que aportan un aroma irresistible. Su equilibrio perfecto entre frescura, sabor y tradición la convierte en un icono de la cocina italiana.', 8.99, '/assets/img/pizza/margarita.jpg', '2024-01-15 12:30:00', 1),
(2, 'Pizza Anana', 'Una pizza de carácter suave y aromático que combina ingredientes frescos y sabores equilibrados. Sobre una base fina y dorada se extiende una crema ligera de queso, acompañada de mozzarella fundida, tomates cherry asados y un toque de rúcula fresca que aporta contraste y frescura. Finalizada con un hilo de aceite de oliva virgen extra y un toque de orégano, la Pizza Anna destaca por su elegancia y sencillez.', 9.50, '/assests/img/pizza/anna.jpg', '2024-02-10 14:45:00', 1),
(3, 'Bebida cola', 'Refrescante, burbujeante y con su inconfundible sabor original. Servida bien fría, Coca‑Cola es la bebida perfecta para acompañar cualquier comida o para disfrutar en cualquier momento del día. Su mezcla equilibrada de dulzor y acidez la convierte en un clásico que nunca pasa de moda.', 1.75, '/assets/img/bebidas/cocacola.jpg', '2024-03-05 11:20:00', 1);

CREATE TABLE categorias (
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(100) NOT NULL UNIQUE
)engine=InnoDB;

INSERT INTO categorias (NOMBRE) VALUES 
('Pizza'),
('Bebidas'),
('Postres'),
('Pastas'),
('Cafeteria');

CREATE TABLE categorizacion (
    FKPRODUCTO INT UNSIGNED NOT NULL,
    FKCATEGORIA INT UNSIGNED NOT NULL,
    PRIMARY KEY (FKPRODUCTO, FKCATEGORIA),
    CONSTRAINT CATEGORIZACION_PRODUCTO FOREIGN KEY (FKPRODUCTO) REFERENCES productos(ID) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT CATEGORIZACION_CATEGORIA FOREIGN KEY (FKCATEGORIA) REFERENCES categorias(ID) ON DELETE CASCADE  
)engine=InnoDB;

INSERT INTO categorizacion (FKPRODUCTO, FKCATEGORIA) VALUES 
(1, 1),
(2, 1),
(3, 2);
