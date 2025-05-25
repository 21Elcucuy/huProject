<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HU website</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="container">
    <form method="post" action="saveInsertCourseToDatabase.php">

        <?php
        $database = mysqli_connect("localhost", "root", "12345678","huproject");

        $query = "Select * from prof";
        $result = mysqli_query($database, $query);
        ?>
        <label >Which Professor</label>
        <?php
        echo "<select name='course_prof_id'>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<option value='".$row['prof_id']."'>".$row['name']."</option>";
        }
        echo "</select>";
        mysqli_close($database);
        ?>


        <button class="b1" type ="submit"><a class="a1">Submit</a></button>
    </form>
</div>
</body>
</html>