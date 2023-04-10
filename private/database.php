<?php

  require_once('db-credentials.php');

  function dbConnect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirmDBConnect();
    return $connection;
  }

  function dbDisconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function confirmDBConnect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  function confirmResultSet($resultSet) {
    if (!$resultSet) {
    	exit("Database query failed.");
    }
  }

?>
