<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/database.php';
    include_once '../../models/Category.php';

    $database = new Database();
    $db = $database->connect();
    $category = new Category($db);


    $category->id = isset($_GET['id']) ? $_GET['id'] : die();

    $result = $category->read_single();
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if($row) {
        $category->id = $row['id'];
        $cateogry->category = $row['category'];

        $category_arr = array('id' => $category->id, 'category' => $category->category);

        echo json_encode($category_arr);
    } else {
        echo json_encode(array('message' => 'category_id Not Found'));
    }
