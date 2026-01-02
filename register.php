<?php
include 'db.php';

if (isset($_POST['register'])) {

    try{
     $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    //making hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    //use of prepare statement
    $stmt = $conn->prepare("INSERT INTO students (student_id, name, password) VALUES (?, ?, ?)");
    $stmt->bind_param('sss',$student_id, $name, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Registration failed!";
    }
    }catch(Exception $e){
        echo $e->getMessage();
    }    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
</head>
<body>

<h2>Student Registration Portal</h2>

<form method="POST">
    Enter your Student ID: <input type="text" name="student_id" required><br><br>
    Enter Your Name: <input type="text" name="name" required><br><br>
    Enter Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="register">Register</button>
</form>

<a href="index.php">Already registered? Login</a>

</body>
</html>