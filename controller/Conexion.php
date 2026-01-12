<?php
$localhost="PCGAMER";
$users ="Vic";
$password="8094071465";
$BD="raya";

$conexion = new pdo("sqlsrv:Server=$localhost;Database=$BD",$users,$password,[
    PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

?>
