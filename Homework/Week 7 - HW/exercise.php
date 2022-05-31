<html>
    <head><title>Processing personnal infos</title></head>
    <body>
        <?php
            $email = $_POST[email];
            $URL = $_POST[URL];
            $number = $_POST[number];
            if(!ereg('.net|.com|.vn|@', $email)){
                print "Sorry, you email adress is invalid";
            }
            if(!ereg('https://|http://', $URL)){
                print "Sorry, you URL adress is invalid";
            }
            if(!ereg('^09|08', $number)){
                print "Sorry, your number is invalid";
            }else {
                print 'valid infors';
            }
            
            


        ?>
    </body>
</html>