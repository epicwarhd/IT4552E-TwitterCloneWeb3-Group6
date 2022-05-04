<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Business Administration</title>
  <style>
    th {
      background-color: lightgray;
    }
  </style>
</head>

<body>

  <h1>Business Administration</h1>
  <form action="ex2.php" method="POST">
    <?php
    session_start();
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "business_service";

    $connect = mysqli_connect($host, $username, $password, $database);
    if (!$connect) {
      echo "Connection Failed!<br>";
    }else {
      $createBusinessTableQuery = "CREATE TABLE if not exists businesses (
        `Business ID` int(11) AUTO_INCREMENT, 
        `Name` varchar(255),
        `Address` varchar(255),
        `City` varchar(255),
        `Telephone` varchar(255),
        `URL` varchar(255),
        PRIMARY KEY (`Business ID`) 
      )";

      $createBizCategoryTableQuery = "CREATE TABLE if not exists biz_categories (
        `Business ID` int(11) NOT NULL,
        `Category ID` varchar(255) NOT NULL,
        PRIMARY KEY (`Business ID`,`Category ID`),
        INDEX `Category ID`(`Category ID`),
        FOREIGN KEY (`Business ID`) REFERENCES `businesses` (`Business ID`),
        FOREIGN KEY (`Category ID`) REFERENCES `categories` (`Category ID`)
      )";

      if ($connect->query($createBusinessTableQuery)) {
        if (!$connect->query($createBizCategoryTableQuery)) {
          echo "Create table biz_categories in database $database failed!<br>";
        }
      } else {
        echo "Create table businesses in database $database failed!<br>";
      }
    
    }   
    ?>
    <div>
      <div style="float:left">
        <h3>
          <?php echo (!isset($_POST["submit"])) ? "" : "Record inserted as shown below."; ?>
        </h3>
        <p>
          <?php echo (!isset($_POST["submit"])) ? "Click on one or control-click multiple categories" : "Selected category values are highlighted."; ?>
        </p>
        <select name="categories[]" multiple>
        <?php
            $categoriesSql = "SELECT `Category ID`, `Title` FROM categories";
            $categories = $connect->query($categoriesSql);

            while ($row = $categories->fetch_array()) { 
              $rows[] =  $row;           
            }

            foreach ($rows as $row) {
              $selected = in_array($row['Category ID'], $_POST["categories"]) ? "selected" : "";
              echo '<option value="'.$row['Category ID'].'" name="categories"'. $selected .'>'.$row['Title'].'</option>';
            }
        ?>
        </select>
        
      </div>
      <div style="float:right">
        <p>Business Name:<input type="text" name="name" <?php echo (isset($_POST['name'])) ? 'value="'.$_POST['name'].'"' : ''; ?>></p>
        <p>Address:<input type="text" name="address" <?php echo (isset($_POST['address'])) ? 'value="'.$_POST['address'].'"' : ''; ?>></p>
        <p>City:<input type="text" name="city" <?php echo (isset($_POST['city'])) ? 'value="'.$_POST['city'].'"' : ''; ?>></p>
        <p>Telephone:<input type="text" name="phone" <?php echo (isset($_POST['phone'])) ? 'value="'.$_POST['phone'].'"' : ''; ?>></p>
        <p>URL:<input type="text" name="URL" <?php echo(isset($_POST['URL'])) ? 'value="'.$_POST['URL'].'"' : ''; ?>></p>
      </div>
      <div style="clear:both;"></div>
    </div>

    <div>
      <?php 
        if (!isset($_POST["submit"])) {
          echo '<input type="submit" name="submit" value="Add business">';
        } else {
          echo '<input type="submit" name="reset" value="Add another business">';
        } 
      ?>
    </div>
  </form>

  <?php
  $categories = $_POST["categories"];
  
  $name = $_POST["name"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $phone = $_POST["phone"];
  $URL = $_POST["URL"];
  $reset = $_POST["reset"];
  if($reset) header('location:ex2.php');
  else {
    if (!empty($name) && !empty($address) && !empty($city) && !empty($phone) && !empty($URL) && !empty($categories) ) {
      $insertBusinessQuery = "INSERT INTO businesses (`Name`,`Address`,`City`,`Telephone`,`URL`) VALUES ('$name', '$address', '$city', '$phone', '$URL')";
  
      if (!mysqli_query($connect, $insertBusinessQuery) ) {
        echo "Insert INTO businesses failed<br>";
      } else {
        $businessId = mysqli_insert_id($connect);
        
        foreach ($categories as $category) {
          $insertBiz_CategoryQuery = "INSERT INTO biz_categories VALUES ('$businessId', '$category')";
          $result = $connect->query($insertBiz_CategoryQuery);
          if(!$result) {
            echo "Insert INTO biz_categories failed<br>";
          }
        }
      } 
    }
  }
  
?>

</body>

</html>