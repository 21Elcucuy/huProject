<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style3.css"/>

</head>
<body>
<?php
$database = mysqli_connect("localhost", "root", "12345678","huproject");

$query = "Select * from student";
$result = mysqli_query($database, $query);

?>

<div class="container">
    <table border="1" class="t1">
        <a href="AddStudent.php" class="btn add-btn">➕ Add</a>
        <thead>
        <tr>
            <th class="th1">ID</th>
            <th class="th1">Name</th>
            <th class="th1">Birh Date</th>
            <th class="th1">Email</th>
            <th class="th1"></th>


        </tr>
        </thead>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['birth_date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";

            ?>
            <td>
                <a href="EditStudent.php?student_id=<?php echo htmlspecialchars($row['student_id']);?>" class="btn edit-btn">✏️ Edit</a>
                <a href="DeleteStudentFromDatabase.php?student_id=<?php echo htmlspecialchars($row['student_id']);?>" class="btn delete-btn">🗑️ Delete</a>
            </td>
            <?php
            echo "</tr>";
        }
        ?>

        </tbody>
    </table>
</div>
</body>
</html>