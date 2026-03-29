<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/database.php';
    include_once '../../models/Author.php';

    $database = new Database();
    $db = $database->connect();
    $author = new Author($db);

    $author->id = isset($_GET['id']) ? $_GET['id'] : die();

    $result = $author->read_single();
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if($row) {
        $author->id = $row['id'];
        $author->author = $row['author'];

        $author_arr = array('id' => $author->id, 'author' => $author->author);

        echo json_encode($author_arr);
    } else {
        echo json_encode(array('message' => 'author_id Not Found'));
    }
