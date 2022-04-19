<html>
    <head>
        <title>Exercise</title>
    </head>
    <body>
        <font size="5" color="blue">
        Enter your name and select date and time for the appointment
        </font>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <?php
                if (array_key_exists("day", $_GET)) {
                    $day = $_GET["day"]; 
                    $month = $_GET["month"]; 
                    $year = $_GET["year"]; 
                    $hour = $_GET["hour"]; 
                    $minute = $_GET["minute"]; 
                    $second = $_GET["second"]; 
                    $name = $_GET["name"]; 
                } else {
                    $day = 19; 
                    $month = 4; 
                    $year = 2021; 
                    $hour = 12; 
                    $minute = 59; 
                    $second = 59; 
                    $name = ""; 
                }
            ?>
            <table>
                <tr>
                    <td>Your name: </td>
                    <td>
                        <?php
                            print ("<input type=\"text\" size=\"25\" maxlength=\"25\" name=\"name\" value=\"$name\"><br>");
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Date: </td>
                    <td>
                        <select name="day">
                            <?php
                                for ($i=1; $i<=31; $i++) {
                                    if ($day == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }
                                }
                            ?>
                        </select>
                        
                        <select name="month">
                            <?php
                                for ($i=1; $i<=12; $i++) {
                                    if ($month == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }
                                }
                            ?>
                        </select>
                        
                        <select name="year">
                            <?php
                                for ($i=0; $i<=3000; $i++) {
                                    if ($year == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                     <td>Time: </td>
                    <td>
                        <select name="hour">
                            <?php
                                for ($i=1; $i<=24; $i++) {
                                    if ($hour == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }
                                }
                            ?>
                        </select>
                        
                        <select name="minute">
                            <?php
                                for ($i=0; $i<=59; $i++) {
                                    if ($minute == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }
                                }
                            ?>
                        </select>
                        
                        <select name="second">
                            <?php
                                for ($i=0; $i<=59; $i++) {
                                    if ($second == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" value="Submit"></td>
                    <td align="left"><input type="reset" value="Reset"></td>
                </tr>
            </table>
            
                <?php
                    if (array_key_exists("day", $_GET)) {
                        $hour2 = $hour;
                        $fh = AM;
                        if ($hour > 12) {
                            $hour2 = $hour - 12;
                            $fh = PM;
                        }
                        $dayOfMonth = 31;
                        if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
                            $dayOfMonth = 30;
                        } else if($month == 2) {
                            if ($year % 100 == 0) {
                                if ($year % 400 == 0){
                                    $dayOfMonth = 29;
                                } else {
                                    $dayOfMonth = 28;
                                }
                            } else if ($year % 4 == 0) {
                                $dayOfMonth = 29;
                            } else{
                                $dayOfMonth = 28;
                            }
                        }
                        print "Hi $name!<br>You have choose to have an appointment on "
                                . "$hour:$minute:$second, $day/$month/$year<br><br>"
                                . "More information<br><br>"
                                . "In 12 hours, the time and date is "
                                . "$hour2:$minute:$second $fh, $day/$month/$year<br><br>"
                                . "This month has $dayOfMonth days!";
                    }
                ?>
        </form>
    </body>
</html>


