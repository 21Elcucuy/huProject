<?php
$student_id = $_GET["student_id"];
$course_id = $_GET["course_id"];

$database = mysqli_connect("localhost", "root", "12345678","huproject");
$query = "INSERT INTO student_courses (student_id, course_id) VALUES (?, ?)";
$stmt = mysqli_stmt_init($database);
mysqli_stmt_prepare($stmt, $query);
mysqli_stmt_bind_param($stmt, "ii", $student_id, $course_id);
if(!mysqli_stmt_execute($stmt))
{
    print("Attend this course Already");
}
mysqli_stmt_close($stmt);
mysqli_close($database);
header("Location: indexAddCourseAsStudent.php?student_id=$student_id");
exit();


?>