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
    form_input_text('', 'action', '50', 'dispoAdded', "hidden");
    form_input_text('Date des rendez-vous', 'rdv_date', '50', '', "text", "required", "autocomplete = 'off'");
    form_input_number_limit('Nombre de rendez-vous','rdv_nombre', '50', '', '1', "10", "required");
    form_input_submit('Go');
    form_input_reset('Réinitialiser');
    ?>

    <p/>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script><script>

    var unavailableDates = <?php echo json_encode($dateIndispo); ?>;


    function unavailable(date) {
        ymd = date.getFullYear() + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + ("0" + date.getDate()).slice(-2);
        if (jQuery.inArray(ymd, unavailableDates) == -1) {
            return [true, ""];
        } else {
            return [false, "", "Unavailable"];
        }
    }

    jQuery(function() {
        jQuery("#rdv_date").datepicker({
            defaultDate: Date.now(),
            dateFormat: 'yy-mm-dd',
            beforeShowDay: unavailable
        });

    });
</script>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>