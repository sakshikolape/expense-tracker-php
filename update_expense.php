<?php

session_start();
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM expenses WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['date'];

    $sql = "UPDATE expenses
            SET
            title='$title',
            amount='$amount',
            category='$category',
            expense_date='$date'
            WHERE id='$id'";

    mysqli_query($conn,$sql);

    header("Location: index.php");
}

?>

<h2>Update Expense</h2>

<form method="POST">

    <input type="text"
    name="title"
    value="<?php echo $row['title']; ?>"
    required>

    <br><br>

    <input type="number"
    name="amount"
    value="<?php echo $row['amount']; ?>"
    required>

    <br><br>

    <input type="text"
    name="category"
    value="<?php echo $row['category']; ?>"
    required>

    <br><br>

    <input type="date"
    name="date"
    value="<?php echo $row['expense_date']; ?>"
    required>

    <br><br>

    <button type="submit" name="update">
        Update Expense
    </button>

</form>