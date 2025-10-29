CREATE DATABASE foodexpress;
USE foodexpress;

CREATE TABLE productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT,
  precio DECIMAL(10,2) NOT NULL,
  categoria VARCHAR(50),
  imagen VARCHAR(200)
);

CREATE TABLE pedidos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre_cliente VARCHAR(100),
  telefono VARCHAR(20),
  direccion TEXT,
  total DECIMAL(10,2),
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE detalle_pedido (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pedido_id INT,
  producto_id INT,
  cantidad INT,
  precio DECIMAL(10,2),
  FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
  FOREIGN KEY (producto_id) REFERENCES productos(id)
);