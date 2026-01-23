<?php


$stmt=$conexion->prepare("SELECT * FROM partida where id_partida = :id_partida");
$stmt->execute([":id_partida" => $Codigo_partida]);
$Resultado=$stmt->fetchAll();
$Tabla =$Resultado[0]->tablero;

if (isset($Datos['Posicion']) && isset($Tabla[$Datos['Posicion']]) && $Tabla[$Datos['Posicion']] !== "-") {
echo json_encode(["ok" => false,
'msg' => "Posicion ocupada"
]);
exit();
}

$Tabla[$Datos['Posicion']]=$Turno;

try{

$stmt=$conexion->prepare(
                "UPDATE partida set turno = case 
                                when turno = jugador1_id then jugador2_id
                                when turno = jugador2_id then jugador1_id
                                end
                                where id_partida =:id_partida"
);

$stmt->execute([":id_partida" => $Codigo_partida]);

if ($stmt->rowCount()<0) {
echo json_encode(["ok" => false]);
exit();
}

$stmt= $conexion->prepare("UPDATE partida SET tablero = :tablero where id_partida =:id_partida");
$stmt->execute([":tablero" => $Tabla,":id_partida" => $Codigo_partida]);

if ($stmt->rowCount()<0) {
echo json_encode(["ok" => false]);
exit();
}
echo json_encode(["ok" => true,
'msg'=> "$Turno"]
);


}
catch (PDOException $e) {
   echo json_encode(["ok" => false,
   "msg" =>"A ocurrido un error en el servidor intentar mas tarde"]);
}

?>