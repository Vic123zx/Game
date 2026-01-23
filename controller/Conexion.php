<?php
$localhost="DESKTOP-G6TGRM0\SQLEXPRESS";
$users ="Cristofer";
$password="8094071465";
$BD="raya";

try{
$conexion = new PDO("sqlsrv:Server=$localhost;Database=$BD",$users,$password,[
    PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
}
catch(PDOException $e){
    echo $e;
}

?>
