<?php
    // encabezados requeridos
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // conexión base de datos
    include_once '../config/db.php';
    
    // instancia la tarea
    include_once '../models/task.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $task = new Task($db);
    
    // obtener datos publicados
    $data = json_decode(file_get_contents("php://input"));
    
    // validar que los datos no esten vacios
    // 
    if(
        !empty($data->name) &&
        !empty($data->state)
    ){
  
        // establecer valores de tarea
        $task->name = $data->name;
        $task->state = $data->state;

    
        // crea la tarea
        if($task->create()){
    
            // establecer código de respuesta - 200 OK
            http_response_code(201);
    
            // mensaje al usuario
            echo json_encode(array("message" => "task was created."));

        // cuando no se puede crear la tarea
        } else { 

            //  establecer código de respuesta  - 503 service unavailable
            http_response_code(503);
    
            // mensaje
            echo json_encode(array("message" => "Unable to create task."));
        }

    // datos incompletos
    } else {
    
        //  establecer código de respuesta  - 400 bad request
        http_response_code(400);
    
        // mensaje
        echo json_encode(array("message" => "Unable to create task. Data is incomplete."));
    }
?>