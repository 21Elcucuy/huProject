<?php
$ID = $_POST["student_id"];
$Name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$birth_date = $_POST['birth_date'];
$database = mysqli_connect("localhost", "root", "12345678","huproject");
if(!$database)
{
    die("connection failed: ");
}
$query = "INSERT INTO student (student_id, name, birth_date, email ,password_) 
          VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($database, $query);
if (!$stmt) {
    die("Prepare failed: " . mysqli_error($database));
}
mysqli_stmt_bind_param($stmt, "issss", $ID, $Name, $birth_date, $email, $password);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($database);

header("Location:Admin-index3-1.php");

exit();
?>