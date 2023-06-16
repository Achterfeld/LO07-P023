<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezvous.php';

class ControllerAdministrateur
{
    public static function praticienReadAll()
    {
        $results = ModelPersonne::getPraticienSpecialite();

        include 'config.php';
        $vue = $root . '/app/view/admin/viewAllPraticien.php';
        
        if (DEBUG) {
            echo ("ControllerPraticien : praticienReadAll : vue = $vue");
        }
        
        require($vue);
    }

    public static function nbPraticienPerPatient()
    {
        $results = ModelPersonne::getNbPraticienPerPatient();
        unset($results[0]);
        
        include 'config.php';
        $vue = $root . '/app/view/admin/viewPraticienPerPatient.php';
        
        if (DEBUG) {
            echo ("ControllerPraticien : praticienReadAll : vue = $vue");
        }
        
        require($vue);
    }

    public static function infosAdmin()
    {
        $resultsSpecialite = ModelSpecialite::getAll();
        $resultsPraticien = ModelPersonne::getAllPersonneType(1);
        $resultsPatient = ModelPersonne::getAllPersonneType(2);
        $resultsAdmin = ModelPersonne::getAllPersonneType(0);
        $resultsRendezvous = ModelRendezvous::getAll(0);

        include 'config.php';
        $vue = $root . '/app/view/admin/viewInfos.php';
        
        if (DEBUG) {
            echo ("ControllerAdmin : infosAdmin : vue = $vue");
        }
        
        require($vue);
    }
}

?>