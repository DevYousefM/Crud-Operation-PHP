<?php
include "config.php";
if (!$dbconnect) {
  echo mysqli_connect_error();
  exit;
};
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$select = "SELECT * FROM `users` WHERE `users`.`id`=" . $id;
$result = mysqli_query($dbconnect, $select);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!$dbconnect) {
    echo mysqli_connect_error();
    exit;
  };
  // Escape special characters
  $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
  $name = mysqli_escape_string($dbconnect, $_POST["name"]);
  $email = mysqli_escape_string($dbconnect, $_POST["email"]);
  $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
  // Edit Data In DB
  $sql = "UPDATE `users` SET `name`='" . $name . "',`email`='" . $email . "',`age`=" . $age . " WHERE `users`.`id`=" . $id;
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
    <!-- Form To Edit User In DB -->

    <form method="post">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        echo "      
        <label for='name'>Name</label>
        <input type='text' name='name' value='" . $row["name"] . "' >
        <label for='email'>Email</label>
        <input type='email' name='email' value='" . $row["email"] . "'>
        <input type='hidden' name='id' value='" . $row["id"] . "'>
        <label for='age'>Age</label>
        <input type='number' name='age' value='" . $row["age"] . "' >";
      }
      ?>
      <input type="submit" value="Edit" class="submitBtn">
    </form>
  </div>

</body>

</html>