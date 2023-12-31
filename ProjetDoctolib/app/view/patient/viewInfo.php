<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>

    <h3>Infos du patient</h3>

    <table class = "table table-striped table-bordered">
        <thead>
        <tr>
            <th scope = "col">id</th>
            <th scope = "col">nom</th>
            <th scope = "col">prenom</th>
            <th scope = "col">adresse</th>
            <th scope = "col">login</th>
            <th scope = "col">password</th>
            <th scope = "col">statut</th>
            <th scope = "col">spécialité</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $element) {
            printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>",
                $element->getId(),
                $element->getNom(),
                $element->getPrenom(),
                $element->getAdresse(),
                $element->getLogin(),
                $element->getPassword(),
                $element->getStatut(),
                $element->getSpecialiteId()
            );
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>  