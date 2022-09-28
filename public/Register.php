<?php

$con = mysqli_connect('localhost', 'root', '', 'librarium-imperialis');

      if (!$con)
        die("Connection failed!" . mysqli_connect_error());
      else 
        echo "Successfully connected to the database =>";

        $name = '';
        $user = '';
        $pass = '';

      if(isset($GET["submit"]))
      {
        echo "hmmmmm";
        $name = $_POST['Name'];
        $user = $_POST['Username'];
        $pass = $_POST['Password'];
        echo "Contact Records Acquired";
      }

      // database insert SQL code
      $sql = "INSERT INTO librarians (LName, Username, LPassword) 
      VALUES ('$name', '$user', '$pass')";
      
      
      // insert in database 
      $rs = mysqli_query($con, $sql);
      if($rs)
      
      {
        echo "Contact Records Inserted";
      }
      mysqli_close($con);
?>
