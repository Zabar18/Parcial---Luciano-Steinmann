<?php
session_start();
include 'LS_conexion.php';

if (!isset($_SESSION['carrito'])) $_SESSION['carrito'] = [];

$carrito = $_SESSION['carrito'];
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Carrito - FoodExpress</title>
  <link rel="stylesheet" href="../css/LS_estilos.css">
</head>
<body>
<h1>Tu carrito</h1>
<a href="../LS_index.php">← Volver al menú</a>

<?php if (empty($carrito)): ?>
  <p>No hay productos en el carrito.</p>
<?php else: ?>
  <table>
    <tr><th>Producto</th><th>Cantidad</th><th>Subtotal</th></tr>
    <?php foreach ($carrito as $id => $item): 
      $subtotal = $item['precio'] * $item['cantidad'];
      $total += $subtotal;
    ?>
      <tr>
        <td><?= $item['nombre'] ?></td>
        <td><?= $item['cantidad'] ?></td>
        <td>$<?= $subtotal ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <h3>Total: $<?= $total ?></h3>
  <a href="LS_checkout.php" class="btn">Finalizar pedido</a>
<?php endif; ?>
</body>
</html>
