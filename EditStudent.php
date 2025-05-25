<?php
$student_id = $_GET["student_id"];
$database = mysqli_connect("localhost", "root", "12345678","huproject");
$query = "SELECT * FROM student WHERE student_id = $student_id";

$result = mysqli_query($database, $query);
$row = mysqli_fetch_array($result)


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HU website</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="container">
    <form method="post" action="saveUpdateStudentToDatabase.php">
        <p> <label >ID
                <br />
                <input id="" name="student_id" type="text"  value= "<?php print($row["student_id"]); ?>" readonly>
            </label>
        </p>
        <p> <label >name
                <br />
                <input id="" name="name" type="text" value="<?php print($row["name"]); ?>"  required>
            </label>
        </p>
        <label >Birth_date
            <input type="date" name="birth_date" required>
        </label>


        <p> <label>Email
                <br/>
                <input name="email" type="email" placeholder="@std.hu.jo" value="<?php print($row["email"]); ?>" required />
            </label>
        </p>
        <p> <label>password
                <br/>
                <input name="password" type="password"  value="<?php print($row["password"]); ?>" required />
            </label>

        <button class="b1" type ="submit"><a class="a1">Submit</a></button>
    </form>
</div>
</body>
</html>
