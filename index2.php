<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>HU</title>
    <link rel="stylesheet" href="style2.css">

</head>
<body>
<?php
 if(!isset($_GET["email"]))
 {
    print("Please enter a valid email addres");
    exit();
 }
?>
<?php
$Email = $_GET["email"];
$database = mysqli_connect("localhost", "root", "12345678","huproject");
date_default_timezone_set("Asia/Amman");
$query = "SELECT * FROM student WHERE email = '$Email' ";
$timenow = date("h:i:sa");

$result = mysqli_query($database, $query);
if ($result && mysqli_num_rows($result) > 0) {
// Fetch associative array of the first matching row
    $row = mysqli_fetch_assoc($result);
// Now you can access individual fields:
    $student_id = $row['student_id'];
    $name = $row['name'];
    $coursename ="";
    $profname = "";
    $room_number = "";
    $queryCourse = "SELECT course.course_id as course_id from student_courses JOIN course ON course.course_id = student_courses.course_id 
     JOIN student ON student_courses.student_id = student.student_id where student_courses.student_id = $student_id 
     and ( course.start_time <= '$timenow' and course.end_time >= '$timenow') ";
    $resultCourse = mysqli_query($database, $queryCourse);
    if ($resultCourse && mysqli_num_rows($resultCourse) > 0)
    {
        $row1 = mysqli_fetch_assoc($resultCourse);
        $myCourse = $row1["course_id"];
        $nowcoursequery = "select * from course where course_id = $myCourse";
        $coursenow = mysqli_query($database, $nowcoursequery);
        if ($coursenow && mysqli_num_rows($coursenow) > 0)
        {
            $row2 = mysqli_fetch_assoc($coursenow);
            $coursename = $row2["course_name"];
            $room_number = $row2["room_id"];
            $prof_id = $row2["prof_id"];
            $profquery = "SELECT * FROM `prof` WHERE prof_id = $prof_id";
            $profexecute = mysqli_query($database, $profquery);
            if ($profexecute && mysqli_num_rows($profexecute) > 0)
            {
                $row3 = mysqli_fetch_assoc($profexecute);
                $profname = $row3["name"];

            }
        }
    }

}
?>
<!-- Profile Dropdown -->
<div class="profile-dropdown">
    <button class="profile-btn">👤 الملف الشخصي</button>
    <div class="dropdown-content">
        <a href="index2-6.php?email=<?php echo htmlspecialchars($Email);?>&id=<?php echo htmlspecialchars($student_id);?>&name=<?php echo htmlspecialchars($name);?>">الملف الشخصي</a>
        <a href="index.html">تسجيل الخروج</a>
    </div>
</div>

<div class="d1">
    <h1 class="h1">Welcome :<?php print($name);   ?></h1>
    <h2 class="h2">  </h2>
</div>

<div class="d12">
    <div class="d2">
        <h3 class="h3"><a href="index2-1.php?student_id=<?php echo htmlspecialchars($student_id);?>">Lecture schedule</a></h3>
        <hr>
        <h3 class="h3"><a href="https://reg1.hu.edu.jo/Default.aspx">University portal</a></h3>
        <hr>
    </div>

    <div class="container">
        <div class="bo1 bo">Course Name :<?php print($coursename) ?></div>
        <div class="bo2 bo">Instructor : <?php print($profname)?> </div>
        <div class="bo3 bo">Room Number : <?php print($room_number)?> </div>
        <div class="bo4 bo"><a href="https://www.itzoneplus.com/files/in/Web">مصادر المادة</a></div>
        <div class="bo4 bo"><a href="https://hu.edu.jo/unitCenter/class_a.aspx?t=0&unitid=40000000">جريدة المواد</a></div>
    </div>
</div>

</body>
</html>