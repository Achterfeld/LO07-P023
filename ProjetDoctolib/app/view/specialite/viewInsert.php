<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>

    <h3>Ajouter une spécialité</h3>

    <form role="form" method="get" action="router1.php">
      <div class="form-group">
        <input type="hidden" name="action" value="creationSpecialite">
        <label class="w-25" for="label">Nom de la spécialité : </label>
        <input type="text" name="label" size="75" value="Spécialité sans nom"><br/>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>