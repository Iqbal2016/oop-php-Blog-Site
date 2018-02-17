<?php
include("database.php");
?>
<!doctype html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Village Hall</title>
        <link href='http://fonts.googleapis.com/css?family=Coda|Oranienbaum|Amarante' rel='stylesheet' type='text/css'>
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script>
            // DOM ready
            $(function () {

                // Create the dropdown base
                $("<select />").appendTo("nav");

                // Create default option "Go to..."
                $("<option />", {
                    "selected": "selected",
                    "value": "",
                    "text": "Select a page"
                }).appendTo("nav select");

                // Populate dropdown with menu items
                $("nav a").each(function () {
                    var el = $(this);
                    $("<option />", {
                        "value": el.attr("href"),
                        "text": el.text()
                    }).appendTo("nav select");
                });

                // To make dropdown actually work
                $("nav select").change(function () {
                    window.location = $(this).find("option:selected").val();
                });

            });
        </script>
    </head>
    <body>
        <header>
            <nav>
              
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                        <?php
                        $all_menus = $obj->getALLMenus("menus", "*", "status=1");
                        foreach ($all_menus as $menu) {
                            extract($menu);
                            ?>
                        <li><a href="index.php?menu_id=<?php echo $menu_id; ?>"><?php echo $name; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </nav>    
        </header>