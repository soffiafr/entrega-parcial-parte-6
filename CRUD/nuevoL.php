<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Prenda = isset($_REQUEST['Prenda']) ? $_REQUEST['Prenda'] : null;
    $Precio = isset($_REQUEST['Precio']) ? $_REQUEST['Precio'] : null;
    $Talla = isset($_REQUEST['Talla']) ? $_REQUEST['Talla'] : null;
    $Color = isset($_REQUEST['Color']) ? $_REQUEST['Color'] : null;
    $hostDB = '127.0.0.1';
    $nombreDB = 'ropa2';
    $usuarioDB = 'root';
    $contrasenyaDB = '530110Sofia.';
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    $miInsert = $miPDO->prepare('INSERT INTO lightacademia (Prenda, Precio, Talla, Color) VALUES (:Prenda, :Precio, :Talla, :Color )');
    $miInsert->execute(
        array(
            'Prenda' => $Prenda,
            'Precio' => $Precio,
            'Talla' => $Talla,
            'Color' => $Color,
        )
    );
    header('Location: indexL.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear</title>
</head>
<body>
    <form action="" method="post">
        <p>
            <label for="Prenda">Prenda</label>
            <input id="Prenda" type="text" name="Prenda">
        </p>
        <p>
            <label for="Precio">Precio</label>
            <input id="Precio" type="text" name="Precio">
        </p>
        <p>
            <label for="Talla">Talla</label>
            <input id="Talla" type="text" name="Talla">
        </p>
        <p>
            <label for="Color">Color</label>
            <input id="Color" type="text" name="Color">
        </p>
        <p>
            <input type="submit" value="Guardar">
        </p>
    </form>
</body>
</html>
</form>