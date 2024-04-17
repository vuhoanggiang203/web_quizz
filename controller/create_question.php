<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Conttrol-Allow-Header:Access-Conttrol-Allow-Header,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once('../config/connect_db.php');
include_once('../model/question.php');
$db = new db();
$connect = $db->connect();
$question = new Question_model($connect);
$data = json_decode(file_get_contents("php://input"));
$question->title = $data->title;
$question->dapan1 = $data->dapan1;
$question->dapan2 = $data->dapan2;
$question->dapan3 = $data->dapan3;
$question->dapan4 = $data->dapan4;
$question->dapan = $data->dapan;
if ($question->creat_question()) {
    echo json_encode(array('Message', 'Message Created'));
} else {
    echo json_encode(array('Message', 'Message Not Created'));
}