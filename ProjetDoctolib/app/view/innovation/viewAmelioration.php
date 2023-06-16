<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>

    <h3>Amélioration du code MVC</h3>

    <p>Externalisation des des requetes sql dans des fichier spécifiques</p>

</div>


<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>