<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/database.php';
    include_once '../../models/Quote.php';

    $database = new Database();
    $db = $database->connect();
    $quote = new Quote($db);


    $quote->id = isset($_GET['id']) ? $_GET['id'] : die();

    $result = $quote->read_single();
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if($row) {
        $quote_arr = array('id' => $row['id'], 'quote' => $row['quote'], 'author' => $row['author'], 'category' => $row['category'] );

        echo json_encode($quote_arr);
    } else {
        echo json_encode(array('message' => 'No Quotes Found'));
    }
