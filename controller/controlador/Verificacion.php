<?php

try{
$Verificacion = $conexion->prepare("SELECT COUNT(*) FROM partida WHERE id_partida = :id_partida AND jugador2_id IS NULL");
$Verificacion->execute([":id_partida" => $Codigo_partida]);

if ($Verificacion->fetchColumn()>0) {
         echo json_encode(["ok" => false,
                          "msg" => "Esperando Juagdor 2 "]);
                          exit();
}
       echo json_encode(["ok" => true,
                          "msg" => "Juagador se unido"]);
}

  catch(PDOException $e){
    echo json_encode(["error" => $e->getMessage()]);
  }

?>