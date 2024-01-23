<?php
$hostDB = '127.0.0.1';
$nombreDB = 'ropa2';
$usuarioDB = 'root';
$contrasenyaDB = '530110Sofia.';
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$Prenda = isset($_REQUEST['Prenda']) ? $_REQUEST['Prenda'] : null;
$miConsulta = $miPDO->prepare('DELETE FROM lightacademia WHERE Prenda = ?');
$miConsulta->execute([ $Prenda]);
header('Location: indexL.php');
?>