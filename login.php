<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students WHERE student_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$student_id]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['full_name'] = $user['full_name'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid login";
    }
}
?>

<form method="post">
    Student ID: <input type="text" name="student_id" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button name="login">Login</button>
    <a href="register.php">Not registered? Register here</a>
</form>
