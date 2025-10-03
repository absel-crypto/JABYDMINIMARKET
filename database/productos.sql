CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255),
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255),
    stock INT NOT NULL DEFAULT 0,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar productos de ejemplo
INSERT INTO productos (nombre, categoria, descripcion, precio, imagen, stock) VALUES
-- Frutas y Verduras
('Banano (Kg)', 'Frutas y Verduras', 'Banano fresco colombiano', 3200.00, 'assets/frutas/banano.jpg', 50),
('Manzana Roja (Kg)', 'Frutas y Verduras', 'Manzana roja importada', 6500.00, 'assets/frutas/manzana.jpg', 30),
('Tomate Chonto (Kg)', 'Frutas y Verduras', 'Tomate chonto fresco', 4200.00, 'assets/frutas/tomate.jpg', 40),
('Papa Pastusa (Kg)', 'Frutas y Verduras', 'Papa pastusa de calidad', 3800.00, 'assets/frutas/papa.jpg', 60),

-- Lácteos y Derivados
('Leche Entera (1L)', 'Lácteos y Derivados', 'Leche entera fresca', 4200.00, 'assets/lacteos/leche.jpg', 100),
('Queso Campesino (500g)', 'Lácteos y Derivados', 'Queso campesino artesanal', 8500.00, 'assets/lacteos/queso.jpg', 80),
('Yogurt de Fresa (1L)', 'Lácteos y Derivados', 'Yogurt sabor fresa', 7000.00, 'assets/lacteos/yogurt.jpg', 50),

-- Bebidas
('Coca Cola (1.5L)', 'Bebidas', 'Refresco Coca Cola', 5500.00, 'assets/bebidas/coca_cola.jpg', 120),
('Jugo HIT (1.5L)', 'Bebidas', 'Jugo HIT sabor frutas', 4200.00, 'assets/bebidas/jugo_hit.jpg', 90),
('Agua Brisa (600ml)', 'Bebidas', 'Agua purificada Brisa', 2000.00, 'assets/bebidas/agua.jpg', 150),

-- Aseo y Hogar
('Jabón en Polvo (1Kg)', 'Aseo y Hogar', 'Jabón en polvo para ropa', 10500.00, 'assets/aseo/jabon.jpg', 40),
('Shampoo Savital (550ml)', 'Aseo y Hogar', 'Shampoo para todo tipo de cabello', 13000.00, 'assets/aseo/shampoo.jpg', 35),
('Papel Higiénico Familia (4 rollos)', 'Aseo y Hogar', 'Papel higiénico familiar', 8000.00, 'assets/aseo/papel.jpg', 60),

-- Snacks y Otros
('Papas Margarita (25g)', 'Snacks y Otros', 'Papas fritas sabor original', 2200.00, 'assets/snacks/margarita.jpg', 200),
('Chocoramo', 'Snacks y Otros', 'Bizcocho chocolatoso colombiano', 3000.00, 'assets/snacks/chocoramo.jpg', 150),
('Chocolate Jet (12g)', 'Snacks y Otros', 'Chocolate Jet clásico', 1000.00, 'assets/snacks/jet.jpg', 180);