<html>
    <head>
        <title>Date Time Function</title>
    </head>
    <body>
        <?php
            print '<font size="5" color="blue"> Date Time Function </font><br>';
            $name1 = $_GET["name1"]; 
            $name2 = $_GET["name2"];
            $bd1 = $_GET["birthday1"];
            $bd2 = $_GET["birthday2"];
            
            $new_bd_1 = date('D, M d, Y', strtotime($bd1));
            $new_bd_2 = date('D, M d, Y', strtotime($bd2));
            print "$name1: $new_bd_1<br>$name2: $new_bd_2<br>";
            
            $today = date('D, M d, Y');
            
            $diff = abs(strtotime($bd1) - strtotime($bd2));
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            print "Difference in days between two dates is $years years, $months months, $days days.<br>";

            $diff = abs(strtotime($bd1) - strtotime($today));
            $years = floor($diff / (365*60*60*24));
            print "$name1 is $years years old.<br>";
            
            $diff = abs(strtotime($bd2) - strtotime($today));
            $years = floor($diff / (365*60*60*24));
            print "$name2 is $years years old.<br>";
        ?>
    </body>
</html>