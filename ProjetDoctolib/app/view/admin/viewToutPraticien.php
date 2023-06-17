<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <h3>Liste des praticiens</h3>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Spécialité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $praticien) : ?>
                    <tr>
                        <td><?php echo $praticien[0]; ?></td>
                        <td><?php echo $praticien[1]; ?></td>
                        <td><?php echo $praticien[2]; ?></td>
                        <td><?php echo $praticien[3]; ?></td>
                        <td><?php echo $praticien[4]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
</body>