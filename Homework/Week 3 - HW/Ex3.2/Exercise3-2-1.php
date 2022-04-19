<html>
    <head>
        <title>Convert</title>
    </head>
    <body>
        <font size="5" color="blue"> Convert radians to degrees and vice versa </font>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <?php
                function convertToDegree($radian) {
                    $pi = 3.14159;
                    return ($radian * (180 / $pi));
                }
                function convertToRadian($degree) {
                    $pi = 3.14159;
                    return ($degree * ($pi / 180));
                }
                if (array_key_exists("rad", $_GET)) {
                    $rad = $_GET["rad"]; 
                } else {
                    $rad = '';
                }
                if (array_key_exists("deg", $_GET)) {
                    $deg = $_GET["deg"]; 
                } else {
                    $deg = '';
                }
            ?>
            <table>
                    <tr>
                        <td>Enter Radians: </td>
                        <td>
                            <?php
                                print ("<input type=\"text\" size=\"25\" maxlength=\"25\" name=\"rad\" value=\"$rad\"><br>");
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Enter Degrees: </td>
                        <td>
                            <?php
                                print ("<input type=\"text\" size=\"25\" maxlength=\"25\" name=\"deg\" value=\"$deg\"><br>");
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><input type="submit" value="Convert"></td>
                        <td align="left"><input type="reset" value="Reset"></td>
                    </tr>
            </table>
            
            <?php
                if (array_key_exists("rad", $_GET)) {
                    if ($rad != '') {
                        $rt = convertToDegree($rad);
                        print "$rad rad = $rt degree<br>";
                    }
                }
                if (array_key_exists("deg", $_GET)) {
                    if ($deg != '') {
                        $rt = convertToRadian($deg);
                        print "$deg degree = $rt rad";
                    }
                }
            ?>
        </form>
    </body>
</html>


