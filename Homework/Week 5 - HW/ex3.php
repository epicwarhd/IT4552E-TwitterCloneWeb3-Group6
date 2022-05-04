<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select business</title>
    <style>
        td:hover {
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div>
            <h2 class="text-info">Business Listings</h2>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <table class="table table-bordered">
                    <tr>
                        <th class="thead-light">Click a category to find business</th>
                    </tr>
                    <?php
                    $server = "localhost";
                    $user = "root";
                    $password = "quangtb201";
                    $mydb = "business_service";
                    $table_name = 'categories';

                    $connect = mysqli_connect($server, $user, $password);
                    if (!$connect) {
                        die("Cannot connect to $server by account $user");
                    } else {
                        $SQLcmd =  "SELECT * FROM $table_name";
                        mysqli_select_db($connect, $mydb);
                        $result = mysqli_query($connect, $SQLcmd);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr onclick=\"myFunction('" . $row["CategoryID"] . "')\">
                                            <td>" . $row["Title"] . "</td>
                                        </tr>";
                            }
                        } else {
                            print("No results");
                        }
                    }
                    ?>
                </table>
            </div>
            <div class="col-lg-8" id="result">
            <?php
                $stringSearch = $_GET["string"];
                $server = "localhost";
                $user = "root";
                $password = "quangtb201";
                $mydb = "business_service";

                $connect = mysqli_connect($server, $user, $password);
                if (!$connect) {
                    die("Cannot connect to $server by account $user");
                } else {
                    $SQLcmd =  "SELECT * FROM $table_name";
                    mysqli_select_db($connect, $mydb);
                    $result = mysqli_query($connect, $SQLcmd);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr onclick=\"myFunction('" . $row["CategoryID"] . "')\">
                                        <td>" . $row["Title"] . "</td>
                                    </tr>";
                        }
                    } else {
                        print("No results");
                    }
                }
            ?>
            </div>
        </div>
    </div>
    <script>
        function myFunction(string){
            var data = {
                string:string
            }
            $(document).get('./ex3.php',data);
        }
    </script>
</body>

</html>