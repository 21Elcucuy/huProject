<?php
$student_id = $_GET['student_id'];
$course_id = $_GET['course_id'];
$database = mysqli_connect("localhost", "root", "12345678", "huproject");
if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "DELETE FROM student_courses WHERE student_id = ? and course_id = ?";
$stmt = mysqli_prepare($database, $query);
if(!$stmt){
    print("Error: " . mysqli_error($database));
}
mysqli_stmt_bind_param($stmt, "ii", $student_id, $course_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($database);
header("Location: indexAddCourseAsStudent.php?student_id=$student_id");

?>