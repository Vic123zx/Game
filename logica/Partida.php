<?php
session_start();
require_once("Conexion.php");

$Datos =json_decode(file_get_contents("php://input"),true);
$Accion=$Datos['Accion'];
$Codigo_partida =$Datos['Codigo'];

$Id_jugador = session_id();


switch ($Accion) {
    case 'Crear':
      include "controlador/Crear_partida.php";
        break;

            case 'Unirse':
      include "controlador/Unirse.php";
      
        break;
                case 'Verificar':
      include "controlador/Verificacion.php";
      
        break;
        case 'Insertar';
        include "controlador/Logica.php";
    
    break;
    default: echo json_encode(["status" => "error",
                      "msg" => "Accion no existe"]); 
        break;
}

?>