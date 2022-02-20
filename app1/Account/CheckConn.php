<?php
    $con=mysqli_connect("db","MYSQL_USER","MYSQL_PASSWORD","MYSQL_DATABASE");
    if (mysqli_connect_errno()) {
      echo "<script> window.setTimeout(function(){location.reload()},1000);</script>";
      echo "<h1>Error connection db, wait...</h1>";
    } else {
      $sql = "CREATE TABLE IF NOT EXISTS users( id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, mail varchar(50) NOT NULL, psw varchar(255) NOT NULL);";
      if (mysqli_query($con,$sql)) {
        
      } else {
        echo 'Error creating table "users"';
      }
      $sql = "CREATE TABLE IF NOT EXISTS request( id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, appname varchar(50) NOT NULL, indirizzo varchar(255) NOT NULL, tempo varchar(255) NOT NULL);";
      if (mysqli_query($con,$sql)) {
        
      } else {
        echo 'Error creating table "users"';
      }
    }
?>