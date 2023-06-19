<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>

    <h3>Liste de mes rendez-vous</h3>

    <table class = "table table-striped table-bordered">
        <thead>
        <tr>
            <th scope = "col">Nom</th>
            <th scope = "col">Prénom</th>
            <th scope = "col">Date du rendez-vous</th>
            <th scope = "col">Adresse</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // $results = liste des Spé
        foreach ($results as $element) {

            printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>",
            $element["nom"],
            $element["prenom"],
            $element["rdv_date"],
            $element["adresse"]
        );
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>