<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
include_once('../config/connect_db.php');
include_once('../model/model_account.php');
$db = new db();
$connect = $db->connect();
$acc = new model_account($connect);
$read = $acc->read();
$num = $read->rowCount();
if ($num > 0) {
    $question_array = [];
    $question_array['account'] = [];
    while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $question_item = array(
            'id_user' => $id_user,
            'name' => $name,
            'user_name' => $user_name,
            'pass' => $pass,
            'sdt' => $sdt,
            'role' => $role

        );
        array_push($question_array['account'], $question_item);
    }
    echo json_encode($question_array);
}