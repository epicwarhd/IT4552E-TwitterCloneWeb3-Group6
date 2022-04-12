<html>
    <head>
        <title>Receiving Input</title>
    </head>
    <body>
        <?php
            $name = $_POST["name"];
            $class = $_POST["class"];
            $university = $_POST["university"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $hobby = $_POST["hobby"];

            print ("Hello, $name");
            print ("<br>You are studying at $class, $university");
            print ("<br>Your email is $email");
            print ("<br>Your phone number is $phone");
            
            if (empty($hobby)) {
                print  ("<br>You didn't select any hobby.");
            } else {
                print ("<br>Your hobby is <br>");
                $N = count($hobby);
                for($i=0; $i < $N; $i++) {
                    print ("&emsp;" . ($i+1) . ". ". $hobby[$i] . "<br>");
                 }
            }
        ?>
    </body>
</html>
