<?php
// encabezados requeridos
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// incluir archivos de bases de datos y modelos
include_once '../config/db.php';
include_once '../models/task.php';
  
// obtener conexión a la base de datos
$database = new Database();
$db = $database->getConnection();
  
// preparar el objeto de tarea
$task = new Task($db);
  
// establecer la propiedad ID del registro para leer
$task->id = isset($_GET['id']) ? $_GET['id'] : die();
  
// leer los detalles de la tarea a editar
$task->readOne();
  
if($task->name!=null){
    // crear array
    $task = array(
        "id" =>  $task->id,
        "name" => $task->name,
        "date" => $task->date,
        "state" => $task->state
  
    );
  
    // establecer código de respuesta - 200 OK
    http_response_code(200);
  
    // mostrar datos de la tarea en formato json
    echo json_encode($task_arr);
}
  
else{
    // establecer código de respuesta - 404 No encontrado
    http_response_code(404);
  
    // mensaje no se encontraron tareas
    echo json_encode(array("message" => "task does not exist."));
}
?>
