<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object file
include_once '../config/db.php';
include_once '../models/task.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare task object
$task = new Task($db);
  
// get task id
$data = json_decode(file_get_contents("php://input"));
  
// set task id to be deleted
$task->id = $data->id;
  
// delete the product
if($task->delete()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "task was deleted."));
}
  
// if unable to delete the product
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to delete task."));
}
?>