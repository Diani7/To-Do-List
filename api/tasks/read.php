<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/db.php';
include_once '../objects/task.php';
  
// instantiate database and task object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$product = new Task($db);

// query tasks
$stmt = $product->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $tasks_arr=array();
    $tasks_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $task_item=array(
            "id" => $id,
            "name" => $name,
            "fecha" => $fecha,
            "comprobar" => $comprobar,

        );
  
        array_push($tasks_arr["records"], $task_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show task data in json format
    echo json_encode($tasks_arr);
}

?>