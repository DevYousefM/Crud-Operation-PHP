<?php
include "config.php";
// Check Connection
if (!$dbconnect) {
  echo mysqli_connect_error();
  exit;
};

// Get Data From DB
$sql = "SELECT * FROM `users` ORDER BY `id`";
$result = mysqli_query($dbconnect, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users List</title>
  <link rel="stylesheet" href="css/usersList.css">

</head>

<body>
  <div>
    <a href="addUsers.php">Add New User</a>
    <table>
      <thead>

        <tr>
          <th>Name</th>
          <th>Age</th>
          <th>Email</th>
          <th>Update</th>
          <th>Remove</th>
        </tr>
      </thead>
      <tbody>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          echo "
          <tr>
            <td>" . $row["name"] . "</td>
            <td>" . $row["age"] . "</td>
            <td>" . $row["email"] . "</td>
            <td><a href='editUser.php?id=" . $row["id"] . "'><button class='updateBtn'>Edit</button></a></td>
            <td><a href='delUser.php?id=" . $row["id"] . "'><button class='delBtn'>Delete</button></a></td>
          </tr>
        ";
        };
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>