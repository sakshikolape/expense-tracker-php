<?php
include 'db.php';

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users(name,email,password)
            VALUES('$name','$email','$password')";

    mysqli_query($conn,$sql);

    header("Location: login.php");
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Enter Name" required><br><br>

    <input type="email" name="email" placeholder="Enter Email" required><br><br>

    <input type="password" name="password" placeholder="Enter Password" required><br><br>

    <button type="submit" name="register">Register</button>
</form>