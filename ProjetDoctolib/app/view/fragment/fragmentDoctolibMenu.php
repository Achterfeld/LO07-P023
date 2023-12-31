<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router1.php?action=AccueilDocto">ACHTERFELD RAYNAL</a>
        <a class="navbar-brand"> |
            <?php
            if(session_status() !== PHP_SESSION_ACTIVE) session_start();
            if (isset($_SESSION["login"])){
                echo (ModelPersonne::getTypestatut($_SESSION["login"]->getStatut()));
            }
            ?>
        </a>
        <a class="navbar-brand"> |
            <?php
            if (isset($_SESSION["login"])){
                echo ($_SESSION["login"]->getPrenom() . " " . $_SESSION["login"]->getNom());
            }
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <?php
                if (isset($_SESSION["login"]) && $_SESSION["login"]->getStatut() == ModelPersonne::ADMINISTRATEUR){
                    ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrateur</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=ConsultSpecialite">Liste des specialités</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=IdSpecialite">Sélection d'une spécialité par son id</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=CreerSpecialite">Insertion d'une spécialité</a></li>
                            <hr/>
                            <li><a class="dropdown-item" href="router1.php?action=praticienReadAll">Liste des praticiens avec leurs spécialités</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=nbPraticienparPatient">Nombre de praticiens par patient</a></li>
                            <hr/>
                            <li><a class="dropdown-item" href="router1.php?action=infosAdmin">Infos</a></li>

                        </ul>
                    </li>

                    <?php
                }
                ?>

                <?php
                if (isset($_SESSION["login"]) && $_SESSION["login"]->getStatut() == ModelPersonne::PRATICIEN){
                    ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Praticien</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=getDispo">Liste de mes disponibilités</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=AjoutDispo">Ajout de nouvelles disponibilités</a></li>
                            <hr/>
                            <li><a class="dropdown-item" href="router1.php?action=getListRdv">Liste des rendez-vous avec le nom des patients</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=getMesPatients">Liste de mes patients (sans doublon)</a></li>
                        </ul>
                    </li>

                    <?php
                }
                ?>

                <?php
                if (isset($_SESSION["login"]) && $_SESSION["login"]->getStatut() == ModelPersonne::PATIENT){
                    ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Patient</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=Informationpatient">Mon compte</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=Rdvpatient">Liste de mes rendez-vous</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=prendrerdv">Prendre un RDV avec un praticien</a></li>
                        </ul>
                    </li>

                    <?php
                }
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=InnovationDocto">Proposez une fonctionnalité originale</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=AmelioDocto">Proposez une amélioration du code MVC</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=ConnexionDocto">Login</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=Creerpersonne">S'inscrire</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=doctolibDeconnexion">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>