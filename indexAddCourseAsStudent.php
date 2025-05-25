<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style3.css"/>
</head>
<body>
<?php
//if (!isset($_GET['student_id']) ) {
//    echo "Unauthorized access. Please log in.";
//    exit();
//}

$student_id = $_GET['student_id'];
$database = mysqli_connect("localhost", "root", "12345678","huproject");

$query = "SELECT course.course_id as course_id,course.course_name as course_name , course.room_id as room_id , course.start_time as start_time ,course.end_time as end_time  
FROM student_courses join course on student_courses.course_id = course.course_id 
    join student on student_courses.student_id = student.student_id where student.student_id = $student_id";
$result = mysqli_query($database, $query);

?>
<div class="container">
    <table border="1" class="t1">
        <a href="AddCourseAsStudent.php?student_id=<?php echo htmlspecialchars($student_id);?>" class="btn add-btn">➕ Add</a>
        <thead>
        <tr>
            <th class="th1">وقت المحاضرة/رقم القاعة</th>
            <th class="th1">المادة</th>
            <th></th>
        </tr>
        </thead>
        <tbody>


        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>"  . htmlspecialchars($row['start_time']) . " - " . htmlspecialchars($row['end_time'])  .  "</td>";
            echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";

            ?>
        <td>
            <a href="DeleteCourseFromStudent.php?student_id=<?php echo htmlspecialchars($student_id); ?>&course_id=<?php echo htmlspecialchars($row['course_id']);?>" class="btn delete-btn">🗑️ Delete</a>
        </td>
        <?php
            echo "</tr>";
            }
         mysqli_close($database);
        ?>



        </tbody>
    </table>
</div>
</body>
</html>