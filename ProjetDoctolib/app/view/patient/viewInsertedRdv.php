
<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results == 0) {
     echo ("<h3>Le rendez-vous a bien été pris </h3>");
     echo("<ul>");
     echo ("<li>Le " . $date . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème lors de la prise du rendez-vous</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>