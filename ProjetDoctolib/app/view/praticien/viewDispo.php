<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>

    <h3>Liste de mes Disponibilités</h3>

    <table class = "table table-striped table-bordered">
        <thead>
        <tr>
            <th scope = "col">Id</th>
            <th scope = "col">Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des spécialités est dans une variable $results
        foreach ($results as $element) {
            printf("<tr><td>%s</td><td>%s</td></tr>",
                $element->getId(),
                $element->getRdvDate()
            );
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>  