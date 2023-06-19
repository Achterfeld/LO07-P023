<?php
session_start();
$_SESSION['login'] = null;

header('Location: app/router/router1.php?action=');

?>

