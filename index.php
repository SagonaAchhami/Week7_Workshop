<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {

    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM students WHERE student_id = ?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($storedHash);
        $stmt->fetch();

        if (password_verify($password, $storedHash)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['student_id'] = $student_id;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Student not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Student Login Portal</h2>

<form method="POST">
    Enter your Student ID: <input type="text" name="student_id" required><br><br>
    Enter Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>
    <a href="register.php">Not registered? Register here</a>
</body>
</html>