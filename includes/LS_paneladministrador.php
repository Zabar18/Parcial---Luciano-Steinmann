<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Admin - FoodExpress</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<h1>Panel de administración</h1>

<h2>Productos</h2>
<table>
<tr><th>Nombre</th><th>Precio</th><th>Categoría</th></tr>
<?php
$res = $conn->query("SELECT * FROM productos");
while($r = $res->fetch_assoc()):
?>
<tr>
  <td><?= $r['nombre'] ?></td>
  <td>$<?= $r['precio'] ?></td>
  <td><?= $r['categoria'] ?></td>
</tr>
<?php endwhile; ?>
</table>

<h2>Pedidos</h2>
<table>
<tr><th>Cliente</th><th>Total</th><th>Fecha</th></tr>
<?php
$res = $conn->query("SELECT * FROM pedidos ORDER BY fecha DESC");
while($p = $res->fetch_assoc()):
?>
<tr>
  <td><?= $p['nombre_cliente'] ?></td>
  <td>$<?= $p['total'] ?></td>
  <td><?= $p['fecha'] ?></td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
