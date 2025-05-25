<html>
  <head>
  </head>
  <body>
    <?php
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $database = mysqli_connect("localhost", "root", "12345678","huproject");

    $query = "SELECT * FROM student WHERE email = '$Email' and password_ = '$Password'";
    $result = mysqli_query($database, $query);
    // Check result
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($database);
        header("location:index2.php?email=$Email");
        exit();
    }
    else
    {
        mysqli_close($database);
        header("location:index.html");
        exit();
    }


    ?>

  </body>
</html>