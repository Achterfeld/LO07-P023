<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <h3>Liste des spécialités</h3>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Label</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultsSpecialite as $specialite) : ?>
                    <tr>
                        <td><?php echo $specialite->getId(); ?></td>
                        <td><?php echo $specialite->getLabel(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Liste des praticiens</h3>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultsPraticien as $praticien) : ?>
                    <tr>
                        <td><?php echo $praticien->getId(); ?></td>
                        <td><?php echo $praticien->getNom(); ?></td>
                        <td><?php echo $praticien->getPrenom(); ?></td>
                        <td><?php echo $praticien->getAdresse(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Liste des patients</h3>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultsPatient as $patient) : ?>
                    <tr>
                        <td><?php echo $patient->getId(); ?></td>
                        <td><?php echo $patient->getNom(); ?></td>
                        <td><?php echo $patient->getPrenom(); ?></td>
                        <td><?php echo $patient->getAdresse(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Liste des administrateurs</h3>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultsAdmin as $admin) : ?>
                    <tr>
                        <td><?php echo $admin->getId(); ?></td>
                        <td><?php echo $admin->getNom(); ?></td>
                        <td><?php echo $admin->getPrenom(); ?></td>
                        <td><?php echo $admin->getAdresse(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Liste de tous les rendez-vous</h3>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">PatientId</th>
                    <th scope="col">PraticienId</th>
                    <th scope="col">RdvDate</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultsRendezvous as $rdv) : ?>
                    <tr>
                        <td><?php echo $rdv->getId(); ?></td>
                        <td><?php echo $rdv->getPatientId(); ?></td>
                        <td><?php echo $rdv->getPraticienId(); ?></td>
                        <td><?php echo $rdv->getRdvDate(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
</body>