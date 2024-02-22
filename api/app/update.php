<?php
// encabezados requeridos
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// incluir archivos de bases de datos y modelos
include_once '../config/db.php';
include_once '../models/task.php';
  
// obtener conexión a la base de datos
$database = new Database();
$db = $database->getConnection();
  
// preparar el objeto de tarea
$task = new Task($db);
  
// establecer la propiedad ID del registro para leer
$data = json_decode(file_get_contents("php://input"));
  
// establecer la propiedad ID de la tarea que se va a editar
$task->id = $data->id;
  
// establecer valores de propiedad de la tarea
$task->name = $data->name;
$task->date = $data->date;
$task->state = $data->state;
  
// actualizar la tarea
if($task->update()){
  
    // establecer código de respuesta - 200 OK
    http_response_code(200);
  
    // mensaje de tarea actualizada
    echo json_encode(array("message" => "task was updated."));
}
  
// Si la tarea no se puede actualizar, informe al usuario.
else{
  
    // establecer código de respuesta: servicio 503 no disponible
    http_response_code(503);
  
    // mensaje no se puede actualizar la tarea
    echo json_encode(array("message" => "Unable to update task."));
}
?>