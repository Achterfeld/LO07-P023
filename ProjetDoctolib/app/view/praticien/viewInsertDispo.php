<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    include($root . '/outil/form_tools.php');

    printf("<h3>Ajouter des disponibilité</h3>");


    form_begin('form-horizontal', 'get', 'router1.php');
    form_input_text('', 'action', '50', 'AjtDispo', "hidden");
    form_input_text('Date des rendez-vous', 'rdv_date', '50', '', "text", "required", "autocomplete = 'off'");
    form_input_number_limit('Nombre de rendez-vous','rdv_nombre', '50', '', '1', "10", "required");
    form_input_submit('Go');
    form_input_reset('Réinitialiser');
    ?>

    <p/>
</div>

<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>