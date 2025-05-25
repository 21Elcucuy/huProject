<?php
$ID = $_POST["course_id"];
$Name = $_POST['course_name'];
$Time = preg_split("/\s*-\s*/",$_POST["course_time"]);
$start_time = $Time[0];
$end_time = $Time[1];
$prof_id = $_POST["course_prof_id"];
$room_id = $_POST["course_room_id"];

$database = mysqli_connect("localhost", "root", "12345678","huproject");
if(!$database)
{
    die("connection failed: ");
}
$query = "INSERT INTO course (course_id, course_name, start_time, end_time ,room_id, prof_id ) 
          VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($database, $query);
mysqli_stmt_bind_param($stmt, "isssii", $ID, $Name, $start_time, $end_time, $room_id, $prof_id);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($database);

    header("Location:Admin-index3.php");

 exit();
?>