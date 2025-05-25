<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style3.css"/>
</head>
<body>
<?php
if (!isset($_GET['student_id']) ) {
    echo "Unauthorized access. Please log in.";
    exit();
}

$student_id = $_GET['student_id'];
$database = mysqli_connect("localhost", "root", "12345678","huproject");

$query = "SELECT course.course_name as course_name , course.room_id as room_id , course.start_time as start_time ,course.end_time as end_time  
FROM student_courses join course on student_courses.course_id = course.course_id 
    join student on student_courses.student_id = student.student_id where student.student_id = $student_id";
$result = mysqli_query($database, $query);

?>
<div class="container">
    <table border="1" class="t1">

        <thead>
        <tr>
            <th class="th1">وقت المحاضرة/رقم القاعة</th>
            <th class="th1">المادة</th>
        </tr>
        </thead>
        <tbody>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" .htmlspecialchars($row['room_id']) . "/  " . htmlspecialchars($row['start_time']) . " - " . htmlspecialchars($row['end_time'])  .  "</td>";
                echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";
                echo "</tr>";
            }
            ?>



        </tbody>
    </table>
</div>
</body>
</html>