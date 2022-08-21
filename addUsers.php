<?php
include "config.php";
// Check Connection
if (!$dbconnect) {
  echo mysqli_connect_error();
  exit;
};
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_escape_string($dbconnect, $_POST["name"]);
    $email = mysqli_escape_string($dbconnect, $_POST["email"]);
    $age = $_POST["age"];

    $sql = "INSERT INTO `users` (`name`,`email`,`age`) VALUES ('" . $name . "','" . $email . "','" . $age . "')";

    if (mysqli_query($dbconnect, $sql)) {
      header("Location: usersList.php");
      exit;
    };
    // Close Connection
    mysqli_close($dbconnect);
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add User</title>
  <link rel="stylesheet" href="css/addUser.css">
</head>

<body>
  <div class="container">
    <!-- Link To Home -->
    <a href="usersList.php">Home</a>
    <!-- Add Users To DB -->

    <form method="post">
      <label for="name">Name</label>
      <input type="text" name="name" required>
      <label for="email">Email</label>
      <input type="email" name="email" required>
      <label for="age">Age</label>
      <input type="number" name="age" required>

      <input type="submit" value="Add" class="submitBtn">
    </form>
  </div>

</body>

</html>