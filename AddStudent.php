<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HU website</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="container">
    <form method="post" action="saveInsertStudentToDatabase.php">
        <p> <label >ID
                <br />
                <input id="" name="student_id" type="text"  required>
            </label>
        </p>
        <p> <label >name
                <br />
                <input id="" name="name" type="text"  required>
            </label>
        </p>
        <label >Birth_date
        <input type="date" name="birth_date" required>
        </label>
        <p> <label>Email
                <br/>
                <input name="email" type="email" placeholder="@std.hu.jo" required />
            </label>
        </p>
        <p> <label>password
                <br/>
                <input name="password" type="password" required />
            </label>


            <button class="b1" type ="submit"><a class="a1">Submit</a></button>
    </form>
</div>
</body>
</html>