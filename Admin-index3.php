<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style3.css"/>
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #3498db;
        }

        .edit-btn:hover {
            background-color: #2980b9;
        }

        .add-btn {
            background-color: #2ecc71;
            float :right;

        }

        .add-btn:hover {
            background-color: #27ae60;
        }

        .delete-btn {
            background-color: #e74c3c;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<?php
$database = mysqli_connect("localhost", "root", "12345678","huproject");

$query = "Select * from course";
$result = mysqli_query($database, $query);

?>

<div class="container">
    <table border="1" class="t1">
        <a href="AddCourse.php" class="btn add-btn">➕ Add</a>
        <thead>
        <tr>
            <th class="th1">ID</th>
            <th class="th1">Name</th>
            <th class="th1">start_time</th>
            <th class="th1">end_time</th>
            <th class="th1">room_number</th>
            <th class="th1">prof_id</th>
            <th class="th1"></th>
        </tr>
        </thead>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['course_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['start_time']) . "</td>";
            echo "<td>" . htmlspecialchars($row['end_time']) . "</td>";
            echo "<td>" . htmlspecialchars($row['room_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['prof_id']) . "</td>";
        ?>
                       <td>
                           <a href="EditCourse.php?course_id=<?php echo htmlspecialchars($row['course_id']);?>" class="btn edit-btn">✏️ Edit</a>
                           <a href="DeleteCourseFromDatabase.php?course_id=<?php echo htmlspecialchars($row['course_id']);?>"" class="btn delete-btn">🗑️ Delete</a>
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