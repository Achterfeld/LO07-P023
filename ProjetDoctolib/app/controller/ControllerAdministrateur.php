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
        $vue = $root . '/app/view/admin/viewToutPraticien.php';
        
        if (DEBUG) {
            echo ("ControllerPraticien : praticienReadAll : vue = $vue");
        }
        
        require($vue);
    }

    public static function nbPraticienparPatient()
    {
        $results = ModelPersonne::getNbPraticienparPatient();
        unset($results[0]);
        
        include 'config.php';
        $vue = $root . '/app/view/admin/viewPraticienparPatient.php';
        
        if (DEBUG) {
            echo ("ControllerPraticien : praticienReadAll : vue = $vue");
        }
        
        require($vue);
    }

    public static function infosAdmin()
    {
        $resultsSpecialite = ModelSpecialite::getAll();
        $resultsPraticien = ModelPersonne::getTypePersonne(1);
        $resultsPatient = ModelPersonne::getTypePersonne(2);
        $resultsAdmin = ModelPersonne::getTypePersonne(0);
        $resultsRendezvous = ModelRendezvous::getAll(0);

        include 'config.php';
        $vue = $root . '/app/view/admin/viewInfos.php';
        
        if (DEBUG) {
            echo ("ControllerAdmin :  : vue = $vue");
        }
        
        require($vue);
    }
}

?>