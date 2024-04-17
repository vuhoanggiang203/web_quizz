<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
include_once('../config/connect_db.php');
include_once('../model/question.php');
$db = new db();
$connect = $db->connect();
$question = new Question_model($connect);
$question->id_cauhoi = isset($_GET['id']) ? $_GET['id'] : die();
$question->read_one();
$question_item = array(
    'id_cauhoi' => $question->id_cauhoi,
    'title' =>  $question->title,
    'dapan1' =>  $question->dapan1,
    'dapan2' =>  $question->dapan2,
    'dapan3' =>  $question->dapan3,
    'dapan4' =>  $question->dapan4,
    'dapan' =>  $question->dapan,
);
print_r(json_encode($question_item));