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
            <th scope = "col">Lancer le trajet</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des spécialités est dans une variable $results
        foreach ($results as $element) {
            $adresse_cible = $element["adresse"];
            printf("<tr><td>%s</td><td>%s</td><td>%s</td><td><a class='btn btn-outline-success' target='_blank' href='https://www.google.com/maps/dir/?api=1&origin=$adresse_patient&destination=$adresse_cible'>Lancer la navigation</a></td></tr>",
                $element["nom"],
                $element["prenom"],
                $element["rdv_date"]
            );
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>