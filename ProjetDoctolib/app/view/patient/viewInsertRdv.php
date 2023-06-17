
<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    include($root . '/outil/form_tools.php');

    printf("<h3>Prendre un rendez-vous</h3>");

    form_begin('form-horizontal', 'get', 'router1.php');
    form_input_text('', 'action', '50', 'DispoRdv', "hidden");
    form_select("Sélectionnez le praticien", "praticien_id", false, true, 5, $listPraticien);
    form_input_submit('Envoyer');
    form_input_reset('Réinitialiser');
    ?>

    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>