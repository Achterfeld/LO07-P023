<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <h3>Nombre de praticiens par patient</h3>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id Patient</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nombre de praticien</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $element) : ?>
                    <tr>
                        <td><?php echo $element["patient_id"]; ?></td>
                        <td><?php echo $element["nom"]; ?></td>
                        <td><?php echo $element["prenom"]; ?></td>
                        <td><?php echo $element["nb_praticien"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
</body>