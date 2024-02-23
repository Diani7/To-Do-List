<?php
// encabezados requeridos
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// incluir archivos de bases de datos y modelos
include_once '../config/db.php';
include_once '../models/task.php';
  
// conexión base de datos
$database = new Database();
$db = $database->getConnection();
  
// prepare task object
$task = new Task($db);
  
// id de la tarea
$data = json_decode(file_get_contents("php://input"));
  
// set task id to be deleted
$task->id = $data->id;
  
// eliminar tarea
if($task->delete()){
  
    // establecer código de respuesta - 200 OK
    http_response_code(200);
  
    // mensaje al usuario
    echo json_encode(array("message" => "task was deleted."));
}
  
// cuano no se puede eliminar la tarea
else{
  
    // establecer código de respuesta - 503 service unavailable
    http_response_code(503);
  
    // mensaje al usuario
    echo json_encode(array("message" => "Unable to delete task."));
}
?>