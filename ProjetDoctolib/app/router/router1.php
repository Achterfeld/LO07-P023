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
    case "ConsultSpecialite":
    case "RecupSpecialite":
    case "IdSpecialite":
    case "CreerSpecialite":
    case "creationSpecialite":
        ControllerSpecialite::$action();
        break;

    case "Informationpatient":
    case "Rdvpatient":
    case "prendrerdv":
    case "DispoRdv":
    case "ActuRdv":
        ControllerPatient::$action();
        break;

    case "getDispo":
    case "AjoutDispo":
    case "AjtDispo":
    case "getListRdv":
    case "getMesPatients":
        ControllerPraticien::$action();
        break;

    case "praticienReadAll":
    case "nbPraticienparPatient":
    case "infosAdmin":
        ControllerAdministrateur::$action();
        break;

    case "ConnexionDocto":
    case "verifCoDoctolib":
    case "DeconnexionDocto":
    case "Creerpersonne":
    case "creationpersonne":
    case "InnovationDocto":
    case "AmelioDocto":
        ControllerDoctolib::$action();
        break;

    // Tâche par défaut
    default:
        $action = "AccueilDocto";
        ControllerDoctolib::$action();
}
?>