<html>
    <head><title>Product Information Results</title></head>
    <body>
        <?php
            $description = $_POST[description];
            $code = $_POST[code];
            $products = array('AB01' => '25-Pound Sledgehammer',
                              'AB02' => 'Extra Strong Nails',
                              'AB03' => 'Super Adjustable Wrench',
                              'AB04' => '3-speed Electric Screwdriver');
            if(ereg('boat|plane', $description)){
                print 'Sorry, we do not sell boats or planes anymore';
            } elseif (ereg('^AB', $code)){
                if (isset($products["$code"]))(
                    print "Code $code Decription: $products[$code]";

                ) else {
                    print 'Sorry, product code not found';
                }
            } else {
                print 'Sorry, all our product codes start with "AB"';
            }
            
            


        ?>
    </body>
</html>