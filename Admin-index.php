<html>
<head>
</head>
<body>
<?php
$Email = $_POST['email'];
$Password = $_POST['password'];
$database = mysqli_connect("localhost", "root", "12345678","huproject");

$query = "SELECT * FROM admin WHERE Admin_email = '$Email' and Admin_password = '$Password'";
$result = mysqli_query($database, $query);

if (mysqli_num_rows($result) > 0) {
    mysqli_close($database);
    header("location:Admin-index2.php?email=$Email");
    exit();
}
else
{
    mysqli_close($database);
    print("password or email Incorrect");
}


?>

</body>
</html>