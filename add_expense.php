<?php
session_start();
include 'db.php';

if(isset($_POST['add'])){

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['date'];

    $sql = "INSERT INTO expenses(user_id,title,amount,category,expense_date)
            VALUES('$user_id','$title','$amount','$category','$date')";

    mysqli_query($conn,$sql);

    header("Location: index.php");
}
?>

<form method="POST">

    <input type="text" name="title" placeholder="Expense Title" required><br><br>

    <input type="number" name="amount" placeholder="Amount" required><br><br>

    <input type="text" name="category" placeholder="Category" required><br><br>

    <input type="date" name="date" required><br><br>

    <button type="submit" name="add">Add Expense</button>
</form>