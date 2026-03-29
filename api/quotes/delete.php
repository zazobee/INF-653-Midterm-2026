<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../models/Quote.php';

    $database = new Database();
    $db = $database->connect();
    $Quote = new Quote($db);
    $data = json_decode(file_get_contents("php://input"));

    if(!$quote->read_single()) {
        echo json_encode(array('message' => 'No Quotes Found'))
    }

    $quote->id = $data->id;

    if($quote->delete()) {
        echo json_encode(array('id' => $data->id));
    } else {
        echo json_encode(array('message' => 'Quote Not Deleted'));
    }    