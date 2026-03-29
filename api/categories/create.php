<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../models/Category.php';

    $database = new Database();
    $db = $database->connect();
    $category = new Category($db);
    $data = json_decode(file_get_contents("php://input"));

    if(!isset($data->category) || empty($data->category)) {
        echo json_encode(array('message' => 'Missing Required Parameters'));
        exit();
    }

    $category->category = $data->category;
    $id = $category->create();

    if($id) {
        echo json_encode(array('id' => $id, 'category' => $data->category));
    } else {
        echo json_encode(array('message' => 'Category Not Created'));
    }
