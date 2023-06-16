<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>

    <h3>Sélectionner une spécialité par son ID</h3>

    <form role="form" method="get" action="router1.php">
      <div class="form-group">
        <input type="hidden" name="action" value="specialiteReadOne">
        <label for="id">id : </label>
        <select class="form-control" id="id" name="id" style="width: 100px">
          <?php
          foreach ($results as $id) {
            echo ("<option>$id</option>");
          }
          ?>
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>