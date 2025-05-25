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
        <p> <label >ID
                <br />
                <input id="" name="course_id" type="text"  required>
            </label>
        </p>
        <p> <label >name
                <br />
                <input id="" name="course_name" type="text"  required>
            </label>
        </p>

        <label >Select Time</label>
        <select id="time" name="course_time" class="styled-select">
            <option value="8:30-9:30">8:30 - 9:30</option>
            <option value="9:30-10:30">9:30 - 10:30</option>
            <option value="10:30-11:30">10:30 - 11:30</option>
            <option value="11:30-12:30">11:30 - 12:30</option>
            <option value="12:30-1:30">12:30 - 1:30</option>
            <option value="1:30-2:30">1:30 - 2:30</option>
            <option value="2:30-3:30">2:30 - 3:30</option>
        </select>
        <p> <label>room Number
                <br/>
                <input id="p1"name="course_room_id" type="text" required />
            </label>
        </p>
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