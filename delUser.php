<?php
include "config.php";
// Check Connection
if ($dbconnect) {
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "DELETE FROM `users` WHERE id=" . $id;
    if (mysqli_query($dbconnect, $sql)) {
      header("Location: usersList.php");
    };
  }
  // Close Connection
  mysqli_close($conn);
} else {
  echo mysqli_connect_error();
};
