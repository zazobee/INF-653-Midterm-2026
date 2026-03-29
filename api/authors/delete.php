<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../models/Author.php';

    $database = new Database();
    $db = $database->connect();
    $author = new Author($db);
    $data = json_decode(file_get_contents("php://input"));
    $author->id = $data->id;

    if($author->delete()) {
        echo json_encode(array('id' => $data->id));
    } else {
        echo json_encode(array('message' => 'Author Not Deleted'));
    }


