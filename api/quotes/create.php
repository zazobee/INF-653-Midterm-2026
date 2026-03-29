<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../models/Quote.php';

    $database = new Database();
    $db = $database->connect();
    $quote = new Quote($db);
    $data = json_decode(file_get_contents("php://input"));

    if(!isset($data->quote) || empty($data->quote) || ($data->category_id) || empty($data->quote)) {
        echo json_encode(array('message' => 'Missing Required Parameters'));
        exit();
    }

    $quote->quote = $data->quote;
    $quote_>author_id = $data->author_id;
    $quote->category_id = $data->category_id;
    $id = $quote->create();

    if($id) {
        echo json_encode(array('id' => $quote->id, 
                                'quote' => $data->quote,
                                'author_id' => $data->author_id,
                                'category_id' => $data->category_id));
    } else {
        echo json_encode(array('message' => 'Quote Not Created'));
    }
