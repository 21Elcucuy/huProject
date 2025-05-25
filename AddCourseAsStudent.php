<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style3.css"/>
    <style>
    </style>
</head>
<body>
<?php
$database = mysqli_connect("localhost", "root", "12345678","huproject");
$student_id = $_GET['student_id'];
$query = "Select *  from course";
$result = mysqli_query($database, $query);

?>

<div class="container">
    <table border="1" class="t1">

        <thead>
        <tr>
            <th class="th1">Course</th>
            <th class="th1">Time</th>
            <th class="th1"></th>
        </tr>
        </thead>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";
            echo "<td>" .  htmlspecialchars($row['course_name']) . "</td>";
            echo "<td>" .  htmlspecialchars($row['start_time']) . "-".  htmlspecialchars($row['end_time'])  . "</td>";

            ?>
            <td>
                <a href="SaveCourseForStudent.php?student_id=<?php echo htmlspecialchars($student_id);?>&course_id=<?php echo htmlspecialchars($row['course_id']);?>" class="btn edit-btn">➕Add</a>
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