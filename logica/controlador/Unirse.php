<?php
 if (!isset($Codigo_partida)  || empty($Codigo_partida)) {
                   echo json_encode(["ok" => false,
                      "msg" => "Error con el codigo partida"]); 
                      exit();
                    }

  try{    

    
         $Comprobacion=$conexion->prepare("SELECT COUNT(*) FROM partida where id_partida=:codigo and jugador1_id =:id_juagdor");
         $Comprobacion->bindParam(":codigo",$Codigo_partida);
         $Comprobacion->bindParam(":id_juagdor",$Id_jugador);
         $Comprobacion->execute();

       if ($Comprobacion->fetchColumn()>0) {
        echo json_encode(["ok" => false,
                          "msg" => "jugador ya existente"]);
                          exit();
    }
                          

         $Comprobacion=$conexion->prepare("SELECT COUNT(estado) FROM partida where id_partida=:codigo AND estado = 'Jugando'");
         $Comprobacion->bindParam(":codigo",$Codigo_partida);
         $Comprobacion->execute();

       if ($Comprobacion->fetchColumn()>0) {
        echo json_encode(["ok" => false,
                          "msg" => "Partida esta juego"]);
                          exit();
    }

                     
         $Comprobacion=$conexion->prepare('SELECT COUNT(*) FROM partida where id_partida=:codigo');
         $Comprobacion->bindParam(":codigo",$Codigo_partida);
         $Comprobacion->execute();


       if ($Comprobacion->fetchColumn() <= 0) {
        echo json_encode(["ok" => false,
                          "msg" => "Partida no existe"]);
                          exit();
    }

    $Unirse = $conexion->prepare("UPDATE partida SET jugador2_id=:jugador2_id,estado='Jugando' where id_partida=:Codigo_partida");
    $Unirse->bindParam(":jugador2_id",$Id_jugador);
    $Unirse->bindParam(":Codigo_partida",$Codigo_partida);
    $Unirse->execute();

     echo json_encode(["ok" => true,
                          "msg" => "Se unido juagdor a la partida ".$Codigo_partida]);

  }


  catch(PDOException $e){
    echo json_encode(["error" => $e->getMessage()]);
  }

         ?>