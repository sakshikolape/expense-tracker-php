<?php
session_start();
include 'db.php';

// Check user login
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

// Fetch expenses
$sql = "SELECT * FROM expenses WHERE user_id='$user_id'";

$result = mysqli_query($conn, $sql);

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker Dashboard</title>
</head>

<body>

<h2>
    Welcome <?php echo $_SESSION['name']; ?>
</h2>

<a href="add_expense.php">
    Add Expense
</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>Title</th>
    <th>Amount</th>
    <th>Category</th>
    <th>Date</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td>
        <?php echo $row['title']; ?>
    </td>

    <td>
        ₹<?php echo $row['amount']; ?>
    </td>

    <td>
        <?php echo $row['category']; ?>
    </td>

    <td>
        <?php echo $row['expense_date']; ?>
    </td>

    <td>

        <a href="update_expense.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        |

        <a href="delete.php?id=<?php echo $row['id']; ?>">
            Delete
        </a>

    </td>

</tr>

<?php
$total += $row['amount'];
} ?>

</table>

<br>

<h3>
    Total Expense: ₹<?php echo $total; ?>
</h3>

<br>

<a href="logout.php">
    Logout
</a>

</body>
</html>