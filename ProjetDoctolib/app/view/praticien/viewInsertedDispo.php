<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
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
        echo ("<h3>" . $_GET["rdv_nombre"] . " nouvelle(s) disponibilité(s) ont été ajouté </h3>");
    } else {
        echo ("<h3>Problème d'insertion des disponibilités</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
  </div>    
<body>