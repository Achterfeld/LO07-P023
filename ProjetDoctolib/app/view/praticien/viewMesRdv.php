<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>

    <h3>Liste de mes rendez-vous</h3>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date du rendez-vous</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $element) {
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
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