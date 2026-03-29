<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../models/Author.php';

    $database = new Database();
    $db = $database->connect();
    $author = new Author($db);
    $data = json_decode(file_get_contents("php://input"));

    if(!isset($data->author) || empty($data->author)) {
        echo json_encode(array('message' => 'Missing Required Parameters'));
        exit();
    }

    $author->author = $data->author;
    $id = $author->create();

    if($id) {
        echo json_encode(array('id' => $id, 'author' => $data->author));
    } else {
        echo json_encode(array('message' => 'Author Not Created'));
    }





