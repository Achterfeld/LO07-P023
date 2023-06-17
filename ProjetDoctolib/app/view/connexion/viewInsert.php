<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        include($root . '/outil/form_tools.php');

        echo "<h3>Inscription</h3>";

        form_begin('form-horizontal', 'get', 'router1.php');
        form_input_text('Nom', 'nom', '50', '', 'text', 'required');
        form_input_text('Prénom', 'prenom', '50', '', '', 'required');
        form_input_text('Adresse', 'adresse', '50', '', '', 'required');
        form_input_text('Login', 'login', '30', '', '', 'required');
        form_input_text('Mot de passe', 'password', '30', '', 'password', 'required');

        echo "<p>\n";
        echo "<div class='form-group col-6'>";
        echo "<label for='Votre statut : ' class='fw-bold'>Votre statut :</label>";
        printf("<select id='statutSelect' required class='form-control' name='%s' size='%s'>\n", 'statut', 5);

        foreach ($listStatut as $statutId => $statutName) {
            printf("<option value='%s'>%s</option>\n", $statutId, $statutName);
        }
        echo "</select>";
        echo "</div>";

        echo "<p>\n";
        echo "<div id='specContainer' style='visibility: hidden' class='form-group col-6'>";

        echo "<label for='Votre spécialité si vous êtes admin' class='fw-bold'>Votre spécialité si vous êtes Praticien</label>";
        printf("<select id='selectSpec' required class='form-control' name='%s' size='%s'>\n", 'specialite_id', 5);

        foreach ($listSpecialite as $specialite) {
            printf("<option value='%s'>%s</option>\n", $specialite->getId(), $specialite->getLabel());
        }
        echo "</select>";
        echo "</div>";

        form_input_text('', 'action', '50', 'creationpersonne', 'hidden');
        form_input_submit('Envoyer');
        form_input_reset('Réinitialiser');
        ?>
    </div>

    <script>
        mySelect = document.getElementById("statutSelect");
        mySelect.onchange = (event) => {
            var value = event.target.value;
            if (value === "1") {
                document.getElementById("specContainer").style.visibility = 'visible';
                document.getElementById("selectSpec").required = true;
            } else {
                document.getElementById("specContainer").style.visibility = 'hidden';
                document.getElementById("selectSpec").required = false;
            }
        }
    </script>

    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
</body>