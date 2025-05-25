<?php
$course_id = $_GET['course_id'];
$database = mysqli_connect("localhost", "root", "12345678", "huproject");
if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "DELETE FROM course WHERE course_id = ?";
$stmt = mysqli_prepare($database, $query);

mysqli_stmt_bind_param($stmt, "i", $course_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($database);
header("Location:Admin-index3.php");
?>