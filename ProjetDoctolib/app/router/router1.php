<?php
require('../controller/ControllerDoctolib.php');
require('../controller/ControllerPatient.php');
require('../controller/ControllerAdministrateur.php');
require('../controller/ControllerPraticien.php');
require('../controller/ControllerSpecialite.php');

// Récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// La fonction parse_str permet de construire une table de hachage (clé + valeur)
parse_str($query_string, $param);

// $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// Liste des méthodes autorisées
switch ($action) {
    case "specialiteReadAll":
    case "specialiteReadOne":
    case "specialiteReadId":
    case "specialiteCreate":
    case "specialiteCreated":
        ControllerSpecialite::$action();
        break;

    case "patientInfo":
    case "patientRdv":
    case "takeRdv":
    case "rdvDispo":
    case "updateRdv":
        ControllerPatient::$action();
        break;

    case "getDispo":
    case "addDispo":
    case "dispoAdded":
    case "getListRdv":
    case "getMesPatients":
        ControllerPraticien::$action();
        break;

    case "praticienReadAll":
    case "nbPraticienPerPatient":
    case "infosAdmin":
        ControllerAdministrateur::$action();
        break;

    case "doctolibConnexion":
    case "doctolibVerifConnexion":
    case "doctolibDeconnexion":
    case "personneCreate":
    case "personneCreated":
    case "doctolibInnovation":
    case "doctolibAmelioration":
        ControllerDoctolib::$action();
        break;

    // Tâche par défaut
    default:
        $action = "doctolibAccueil";
        ControllerDoctolib::$action();
}
?>