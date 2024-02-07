<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Method: POST");

    include("../../config/config.php");

    $res = array();
    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $book_name = $_POST['book_name'];

        $result = $config->insert($book_name);

        $res['msg'] = $result ? "Inserted..." : "Failled...";

        http_response_code($result ? 201 : 403);

    }
    else {
        $res['msg'] = "Only POST method is allowed...";
    }

    echo json_encode($res);

?>