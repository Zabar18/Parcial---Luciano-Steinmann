<?php
session_start();
include 'LS_conexion.php';

$carrito = $_SESSION['carrito'];
if (empty($carrito)) die("Carrito vacío.");

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

$total = 0;
foreach ($carrito as $c) $total += $c['precio'] * $c['cantidad'];

$conn->query("INSERT INTO pedidos (nombre_cliente, telefono, direccion, total) VALUES 
('$nombre', '$telefono', '$direccion', $total)");

$pedido_id = $conn->insert_id;

foreach ($carrito as $id => $item) {
  $precio = $item['precio'];
  $cant = $item['cantidad'];
  $conn->query("INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad, precio) VALUES 
  ($pedido_id, $id, $cant, $precio)");
}

unset($_SESSION['carrito']);
echo "<h2>¡Pedido realizado con éxito!</h2><a href='index.php'>Volver al menú</a>";
