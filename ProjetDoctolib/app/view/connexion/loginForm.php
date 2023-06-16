<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">

        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        include($root . '/outil/form_tools.php');

        echo "<h3>Connexion</h3>";

        form_begin('form-horizontal', 'get', 'router1.php');
        form_input_text('Login', 'login', '50', '', '', 'required');
        form_input_text('Password', 'password', '50', '', 'password', 'required');
        form_input_text('', 'action', '50', 'doctolibVerifConnexion', 'hidden');
        form_input_submit('Envoyer');
        form_input_reset('Réinitialiser');

        if (isset($_GET['erreur'])) {
            echo "<p style='color:red'>" . $_GET['erreur'] . "</p>";
        }

        form_end();
        ?>
    </div>

    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
</body>