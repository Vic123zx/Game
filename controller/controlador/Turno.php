<?php
try{
// Turno de la x

    $stmt=$conexion->prepare("SELECT COUNT(*) FROM partida where id_partida =:id_partida and turno =:Id_jugador and jugador1_id=:jugador");
    $stmt->execute([":id_partida" => $Codigo_partida,
                    ":Id_jugador" => $Id_jugador,
                     ":jugador"=>$Id_jugador
]);

    if ($stmt->fetchColumn()>0) {
       $Turno="X";
       include "logica.php";
       exit();
    }

// Turno de la 0

    $stmt=$conexion->prepare("SELECT COUNT(*) FROM partida where id_partida =:id_partida and turno =:Id_jugador and jugador2_id=:jugador");
    $stmt->execute([":id_partida" => $Codigo_partida,
                    ":Id_jugador" => $Id_jugador,
                    ":jugador"=>$Id_jugador
]);

    if ($stmt->fetchColumn()>0) {
       $Turno="0";
       include "logica.php";
       exit();
    }

    echo json_encode(['ok'=> true,
    'msg'=>"No es tu turno"]);

}





catch(PDOException $e){
    echo json_encode(["error" => $e->getMessage()]);
}