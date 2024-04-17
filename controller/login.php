<?php
include_once('../config/connect_db.php');

session_start(); // Start the session
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST["username"];
    $user_pass = $_POST["password"];
    $sql = "SELECT user_name,role,pass FROM account WHERE user_name = $user_name";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $role = $row["role"];
        if ($role == 0) {
            // Chuyển hướng đến trang admin
            header("Location: ./View/admin.php");
            exit();
        } else if ($role == 1) {
            // Lưu dữ liệu tài khoản vào session
            $_SESSION["username"] = $row["username"];
            // Chuyển hướng đến trang đăng nhập
            header("Location: ./View/Home.php");
            exit();
        }
    } else {
        $error = "Tài khoản hoặc mật khẩu không đúng.";
    }
}
$conn->close();
