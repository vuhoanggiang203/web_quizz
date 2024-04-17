<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
include_once('../config/connect_db.php');
include_once('../model/question.php');
$db = new db();
$connect = $db->connect();
$question = new Question_model($connect);
$read = $question->read();
$num = $read->rowCount();
if ($num > 0) {
    $question_array = [];
    $question_array['question'] = [];
    while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $question_item = array(
            'id_cauhoi' => $id_cauhoi,
            'title' => $title,
            'dapan1' => $dapan1,
            'dapan2' => $dapan2,
            'dapan3' => $dapan3,
            'dapan4' => $dapan4,
            'dapan' => $dapan,
        );
        array_push($question_array['question'], $question_item);
    }
    echo json_encode($question_array);
}
