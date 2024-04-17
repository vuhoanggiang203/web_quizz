<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Conttrol-Allow-Header:Access-Conttrol-Allow-Header,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once('../config/connect_db.php');
include_once('../model/question.php');
$db = new db();
$connect = $db->connect();
$question = new Question_model($connect);
$data = json_decode(file_get_contents("php://input"));
$question->id_cauhoi = $data->id_cauhoi;

if ($question->delete_question()) {
    echo json_encode(array('Message', 'Message DELETED'));
} else {
    echo json_encode(array('Message', 'Message Not DELETED'));
}
