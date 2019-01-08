<?php
 
  require_once '../connection.php';

  $newTask = $_GET['name'];

  $sql = "INSERT INTO task(name) VALUES ('$newTask')";

  //mysql_query function expects 2 arguments;

  $result = mysqli_query($conn, $sql);

  if ($result === TRUE) {
  	echo 'new Task added successfully';
  } else {
  	echo 'error: ' . $sql . "<br>" . mysqli_error($conn);
  }

  //Close a previously opened databse connection
  mysqli_close($conn);

  ?>