<?php
try{
$stmt = $conexion->prepare("SELECT  tablero  from partida where id_partida=:Codigo ");
$stmt->execute(["Codigo" =>$Codigo_partida]);
$Resultado =$stmt->fetch();

if (empty($Resultado)) {
echo json_encode(["ok" => false]);
}
echo json_encode(["ok" => true,"tabla"=> $Resultado]);
}
catch(PDOException $e){

}

?>