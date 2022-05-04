<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category Adminstration</title>
  <style>
    th {
      background-color: lightgray;
    }
  </style>
</head>

<body>

  <h1>Category Adminstration</h1>
  <table>
    <tr>
      <th>Cat ID</th>
      <th>Title</th>
      <th>Description</th>
    </tr>
    <form action="ex1.php" method="POST">
      <?php
      $host = "localhost";
      $username = "root";
      $password = "root";
      $database = "business_service";
      $connect = mysqli_connect($host, $username, $password);
      mysqli_select_db($connect, $database);
      if ($connect) {
        $tableName = "categories";
        $selectQuery = "SELECT * FROM categories";
        $resultsId = mysqli_query($connect, $selectQuery);
        if (!$resultsId) {
          $createTableQuery = "CREATE TABLE categories (
            `Category ID` varchar(255),
            `Title` varchar(255),
            `Description` varchar(255),
            PRIMARY KEY (`Category ID`)
          )";
          if (!mysqli_query($connect, $createTableQuery)) {
            print "Create table $tableName in database $database failed!<br>";
          }
        } else {
          while ($row = mysqli_fetch_row($resultsId)) {
            print "<tr>";
            foreach ($row as $field) {
              print "<td>$field</td>";
            }
            print "</tr>";
          }
        }
      } else {
        print "Connection Failed!<br>";
      }
      ?>
      <tr>
        <td><input type="text" name="id"></td>
        <td><input type="text" name="title"></td>
        <td><input type="text" name="description"></td>
      </tr>
      <tr>
        <td><input type="submit" value="Add Category"></td>
      </tr>
    </form>
  </table>
  <?php
  $id = $_POST["id"];
  $title = $_POST["title"];
  $description = $_POST["description"];
  if (!empty($id) && !empty($title) && !empty($description)) {
    $insertQuery = "INSERT INTO $tableName VALUES ('$id', '$title', '$description')";
    if (!mysqli_query($connect, $insertQuery)) {
      print "Insert failed<br>";
    } else {
      header("Refresh:0");
    }
  }
  ?>
</body>

</html>