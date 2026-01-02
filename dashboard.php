<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// Theme using cookie
$theme = "light";
if (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard page</title>
    <style>
        body {
            background-color: <?php echo ($theme == "dark") ? "black" : "white"; ?>;
            color: <?php echo ($theme == "dark") ? "white" : "black"; ?>;
        }
    </style>
</head>
<body>

<h2>Welcome to the Dashboard</h2>
<p>Student ID: <?php echo $_SESSION['student_id']; ?></p>

<a href="preference.php">Change Theme</a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>