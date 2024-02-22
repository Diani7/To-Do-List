<?php
// encabezados requeridos
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// incluir archivos de bases de datos y modelos
include_once '../config/db.php';
include_once '../models/task.php';
  
// crear instancias de bases de datos y modelos de tareas
$database = new Database();
$db = $database->getConnection();
  
// inicializar objeto
$task = new Task($db);

// query de tareas
$result = $task->read();
$count = $result->rowCount();
  
// comprobar si se encontraron más de 0 registros
if ($count > 0) {
  
    // array de tareas
    $tasks_arr = array();
    $tasks_arr["results"] = array();
  
    // recuperar el contenido de nuestra tabla
    // fetch() es más rápido fetchAll()
    while ($row = $result -> fetch(PDO::FETCH_ASSOC)){
  
        $task_item = array(
            "id" => $row["id"],
            "name" => $row["name"],
            "date" => $row["date"],
            "state" => $row["state"],

        );
  
        array_push($tasks_arr["results"], $task_item);
    }
  
    // establecer código de respuesta - 200 OK
    http_response_code(200);
  
    // mostrar datos de la tarea en formato json
    echo json_encode($tasks_arr);

} else {
  
    // establecer código de respuesta - 404 No encontrado
    http_response_code(404);
  
    // mensaje no se encontraron tareas
    echo json_encode(
        array("message" => "No tasks found.")
    );
}

?>