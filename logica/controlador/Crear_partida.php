<?php

 if (!isset($Codigo_partida)  || empty($Codigo_partida)) {
                   echo json_encode(["ok" => false,
                      "msg" => "Error con el codigo"]); 
                      exit();}
                    
try{

         $Comprobacion=$conexion->prepare('SELECT COUNT(*) AS partidas FROM partida where id_partida=:codigo');
         $Comprobacion->bindParam(":codigo",$Codigo_partida);
         $Comprobacion->execute();

       if ($Comprobacion->fetchColumn()>0) {
        echo json_encode(["ok" => false,
                          "msg" => "Partida ya existe"]);
                          exit();
    }
   
    $Crear = $conexion->prepare('INSERT INTO partida (id_partida,jugador1_id,turno) values (:id_partida,:jugador1_id,:turno)');
    $Crear->bindParam(":id_partida",$Codigo_partida);
    $Crear->bindParam(":jugador1_id",$Id_jugador);
    $Crear->bindParam(":turno",$Id_jugador);
    $Crear->execute();

      echo json_encode(["ok" => true,
                          "msg" => "Partida creada"]);
                          exit();
  }
  catch (PDOException $e){

    echo $e->getMessage();
  }


         ?>