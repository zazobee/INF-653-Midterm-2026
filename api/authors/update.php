<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../models/Author.php';

    $database = new Database();
    $db = $database->connect();
    $author = new Author($db);

    if(!isset($data->id) || !isset($data->author) || empty($data->author)) {
        echo json_encode(array('message' => 'Missing Required Parameters'));
        exit();
    }

    $author->id = $data->id;
    $author->author = $data->author;

    if($author->update()) {
        echo json_encode(array('id' => $data->id, 'author' => $data->author));
    } else {
        echo json_encode(array('message' => 'Author Not Updated'));
    }
