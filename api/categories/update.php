<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../models/Category.php';

    $database = new Database();
    $db = $database->connect();
    $category = new Category($db);

    if(!isset($data->id) || !isset($data->category) || empty($data->category)) {
        echo json_encode(array('message' => 'Missing Required Parameters'));
        exit();
    }

    $category->id = $data->id;
    $category->category = $data->category;

    if($category->update()) {
        echo json_encode(array('id' => $data->id, 'category' => $data->category));
    } else {
        echo json_encode(array('message' => 'Category Not Updated'));
    }
