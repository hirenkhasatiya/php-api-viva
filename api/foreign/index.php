<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Method: POST");

    include("../../config/config.php");

    $res = array();
    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $id = $_POST['id'];
        $name = $_POST['name'];
        $b_id = $_POST['b_id'];

        $res['msg'] = $config->insertfk($id,$name,$b_id);

    }
    else {
        $res['msg'] = "Only POST method is allowed...";
    }

    echo json_encode($res);

?>