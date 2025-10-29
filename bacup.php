<?php include 'includes/LS_conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>FoodExpress</title>
  <link rel="stylesheet" href="css/LS_estilos.css">
</head>
<body>
<header>
  <h1>FoodExpress</h1>
  <nav>
    <div id="cart-icon">🛒 <span id="cart-count">0</span></div>
  </nav>
</header>

<main>
  <h2>Menú</h2>

  <form method="get">
    <label for="categoria">Filtrar por categoría:</label>
    <select name="categoria" id="categoria" onchange="this.form.submit()">
      <option value="">Todas</option>
      <?php
        $cats = $conn->query("SELECT DISTINCT categoria FROM productos");
        while ($c = $cats->fetch_assoc()) {
            $sel = (isset($_GET['categoria']) && $_GET['categoria'] == $c['categoria']) ? 'selected' : '';
            echo "<option $sel>{$c['categoria']}</option>";
        }
      ?>
    </select>
  </form>

  <div class="menu-grid">
  <?php
    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
    $sql = "SELECT * FROM productos";
    if ($categoria != '') $sql .= " WHERE categoria = '$categoria'";
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()):
  ?>
    <div class="producto">
      <img src="<?= $row['imagen'] ?>" alt="<?= $row['nombre'] ?>">
      <h3><?= $row['nombre'] ?></h3>
      <p><?= $row['descripcion'] ?></p>
      <strong>$<?= $row['precio'] ?></strong>
      <button class="add-to-cart" data-id="<?= $row['id'] ?>">Añadir al carrito</button>
    </div>
  <?php endwhile; ?>
  </div>
</main>
</body>
</html>
