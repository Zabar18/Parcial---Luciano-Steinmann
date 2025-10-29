<?php
session_start();
include 'LS_conexion.php';

$id = $_POST['id'];
$p = $conn->query("SELECT * FROM productos WHERE id=$id")->fetch_assoc();

if (!$p) die("Producto no encontrado");

if (!isset($_SESSION['carrito'])) $_SESSION['carrito'] = [];

if (isset($_SESSION['carrito'][$id])) {
  $_SESSION['carrito'][$id]['cantidad']++;
} else {
  $_SESSION['carrito'][$id] = [
    'nombre' => $p['nombre'],
    'precio' => $p['precio'],
    'cantidad' => 1
  ];
}

header("Location: LS_carrito.php");
