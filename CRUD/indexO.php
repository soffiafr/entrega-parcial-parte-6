<?php
$hostDB = '127.0.0.1';
$nombreDB = 'ropa2';
$usuarioDB = 'root';
$contrasenyaDB = '530110Sofia.';
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$miConsulta = $miPDO->prepare('SELECT * FROM darkacademia;');
$miConsulta->execute();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td {
            border: 1px solid  gold;
            text-align: center;
            padding: 1.3rem;
        }
        .button {
            border-radius: .5rem;
            color: white;
            background-color: gold;
            padding: 1rem;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <p><a class="button" href="nuevoO.php">Crear</a></p>
    <table>
        <tr>
            <th>Prenda</th>
            <th>Precio</th>
            <th>Talla</th>
            <th>Color</th>
            <td></td>
            <td></td>
        </tr>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
        <tr>
           <td><?= $valor['Prenda']; ?></td>
           <td><?= $valor['Precio']; ?></td>
           <td><?= $valor['Talla']; ?></td>
           <td><?= $valor['Color']; ?></td>
           <td><a class="button" href="modificarO.php?Prenda=<?= $valor['Prenda'] ?>">Modificar</a></td>
           <td><a class="button" href="borrarO.php?Prenda=<?= $valor['Prenda'] ?>">Borrar</a></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>