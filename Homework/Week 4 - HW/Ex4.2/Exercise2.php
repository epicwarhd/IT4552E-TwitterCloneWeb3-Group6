<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Page {
            private $page;
            private $title;
            private $year;
            private $copyRight;

            function addHeader() {
                $this->title = "Welcome";
            }

            function addFooter() {
                $this->year = Date("Y");
                $this->copyRight = "ICT";
            }

            function addContent($content) {
                $this->page = $content;
            }

            function get() {
                return "
                <h1>$this->title</h1>
                <p>$this->page</p>
                <h4>$this->year @copyright $this->copyRight</h4>
                ";
            }
        } 
        $content = $_POST["content"];
        $page = new Page();
        $page->addContent($content);
        $page->addFooter();
        $page->addHeader();
        print $page->get();
    ?>
</body>
</html>
