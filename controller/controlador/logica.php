<?php
$stmt=$conexion->prepare("SELECT * FROM partida where id_partida = :id_partida");
$stmt->execute([":id_partida" => $Codigo_partida]);
$Resultado=$stmt->fetchAll();
$Tabla =$Resultado[0]->tablero;

if (isset($Datos['Posicion']) && isset($Tabla[$Datos['Posicion']]) && $Tabla[$Datos['Posicion']] !== "-") {
echo json_encode(["ok" => false]);
exit();
}

$Tabla[$Datos['Posicion']]=$Turno;

$stmt=$conexion->prepare("UPDATE partida SET tablero = :tablero where id_partida =:id_partida");
$stmt->execute([":tablero" => $Tabla,":id_partida" => $Codigo_partida]);
echo json_encode(["ok" => true])

?>