<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Checkout - FoodExpress</title>
  <link rel="stylesheet" href="../css/LS_estilos.css">
</head>
<body>
<h1>Finalizar pedido</h1>
<form action="LS_guardarpedido.php" method="post">
  <input type="text" name="nombre" placeholder="Tu nombre" required><br>
  <input type="text" name="telefono" placeholder="Teléfono"><br>
  <textarea name="direccion" placeholder="Dirección de entrega" required></textarea><br>
  <button type="submit">Confirmar pedido</button>
</form>
</body>
</html>
