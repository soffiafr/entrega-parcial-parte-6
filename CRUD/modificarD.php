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
    $miUpdate = $miPDO->prepare('UPDATE darkacademia SET Prenda = :Prenda, Precio = :Precio, Talla = :Talla, Color = :Color WHERE Prenda = :Prenda');
    $miUpdate->execute(
        [
            'Prenda' => $Prenda,
            'Precio' => $Precio,
            'Talla' => $Talla,
            'Color' => $Color
        ]
    );
    header('Location: indexD.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM darkacademia WHERE Prenda = ?;');
    $miConsulta->execute([ $Prenda]);
}
$darkacademia = $miConsulta->fetch();

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
            <input id="Prenda" type="text" name="Prenda" value="<?= $darkacademia['Prenda'] ?>">
        </p>
        <p>
            <label for="Precio">Precio</label>
            <input id="Precio" type="text" name="Precio" value="<?= $darkacademia['Precio'] ?>">
        </p>
        <p>
            <label for="Talla">Talla</label>
            <input id="Talla" type="text" name="Talla" value="<?= $darkacademia['Talla'] ?>">
        </p>
        <p>
            <label for="Color">Color</label>
            <input id="Color" type="text" name="Color" value="<?= $darkacademia['Color'] ?>">
        </p>
        <p>
            <input type="hidden" name="Prenda" value="<?= $Prenda ?>">
            <input type="submit" value="Modificar">
        </p>
    </form>
</body>
</html>
