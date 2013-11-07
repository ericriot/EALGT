<?php 

$page_title = "2013 Sponsors";


include('assets/php/header.php'); 

require('assets/php/functions.php');



?>

    <h3>2013 Sponsors</h3>
    
    <p>Pay a visit to one of these great local businesses that help make this tournament possible. Please consider <a href="sponsor.php">becoming a sponsor</a>.</p>

    <ul id="sponsors">

    <?php
    $strLevel = "";

    $sql = " 
        SELECT name, website, image, level, description 
        FROM sponsors_display
        WHERE year = 2013
        ORDER BY sort ASC;
    ";

    // Make sure sql is ok
    $stmt = prepareStatement($mysqli, $sql);
    $stmt->execute();


    // bind the name and email address
    $stmt->bind_result($name, $website, $image, $level, $description);

    while ($stmt->fetch()) {

        if ($strLevel != $level) {

            echo "</ul>\n\n";
            echo "<h2>$level Sponsors</h2>\n\n";

            echo "<ul id=\"sponsors\">\n";

            $strLevel = $level;
        }

        if ($image == '') {
            $image = "Min_EAL.gif";
        }

        echo "<li>\n";
        
        echo "<div class=\"sponsor_image\">\n";
        echo "<span></span>\n";

        $img = "<img src=\"assets/images/sponsors/$image\" alt=\"$name\" title=\"$name\" />";
        if ($website != '') {
            echo "<a href=\"$website\" target=\"_blank\">$img</a>\n";
        } else {
            echo "$img\n";
        }
       
        echo "<br class=\"clear\" />\n";
        echo "</div>\n";


        echo "$name<br />\n";
        
        
        if ($description != '') {
            echo "<em>$description</em><br />\n";
        }

        if ($website != '') {
            echo "<a href=\"$website\" target=\"_blank\">Visit Website</a><br />\n";
        }



        echo "<br class=\"clear\" />\n";
        echo "</li>\n\n";



    }

    $mysqli->close();

    
    ?>
    
</ul>


<?php require('assets/php/footer.php'); ?>