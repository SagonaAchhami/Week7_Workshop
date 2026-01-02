<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
}

if (isset($_POST['save'])) {
    setcookie("theme", $_POST['theme'], time()+86400*30);
    header("Location: dashboard.php");
}
?>

<form method="post">
    Theme:
    <select name="theme">
        <option value="light">Light</option>
        <option value="dark">Dark</option>
    </select>
    <br><br>
    <button name="save">Save</button>
</form>
