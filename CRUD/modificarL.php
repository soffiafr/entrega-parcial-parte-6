<?php
$hostDB = '127.0.0.1';
$nombreDB = 'ropa2';
$usuarioDB = 'root';
$contrasenyaDB = '530110Sofia.';
$Prenda = isset($_REQUEST['Prenda']) ? $_REQUEST['Prenda'] : null;
$Precio = isset($_REQUEST['Precio']) ? $_REQUEST['Precio'] : null;
$Talla = isset($_REQUEST['Talla']) ? $_REQUEST['Talla'] : null;
$Color = isset($_REQUEST['Color']) ? $_REQUEST['Color'] : null;

$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $miUpdate = $miPDO->prepare('UPDATE lightacademia SET Prenda = :Prenda, Precio = :Precio, Talla = :Talla, Color = :Color WHERE Prenda = :Prenda');
    $miUpdate->execute(
        [
            'Prenda' => $Prenda,
            'Precio' => $Precio,
            'Talla' => $Talla,
            'Color' => $Color
        ]
    );
    header('Location: indexL.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM lightacademia WHERE Prenda = ?;');
    $miConsulta->execute([ $Prenda]);
}
$lightacademia = $miConsulta->fetch();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
</head>
<body>
    <form method="post">
        <p>
            <label for="Prenda">Prenda</label>
            <input id="Prenda" type="text" name="Prenda" value="<?= $lightacademia['Prenda'] ?>">
        </p>
        <p>
            <label for="Precio">Precio</label>
            <input id="Precio" type="text" name="Precio" value="<?= $lightacademia['Precio'] ?>">
        </p>
        <p>
            <label for="Talla">Talla</label>
            <input id="Talla" type="text" name="Talla" value="<?= $lightacademia['Talla'] ?>">
        </p>
        <p>
            <label for="Color">Color</label>
            <input id="Color" type="text" name="Color" value="<?= $lightacademia['Color'] ?>">
        </p>
        <p>
            <input type="hidden" name="Prenda" value="<?= $Prenda ?>">
            <input type="submit" value="Modificar">
        </p>
    </form>
</body>
</html>
