<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelRendezvous.php';

class ControllerPatient
{
    public static function patientInfo()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $results = ModelPersonne::getOne($_SESSION["login"]->getId());
        
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInfo.php';
        
        if (DEBUG) {
            echo ("ControllerPatient : patientInfo : vue = $vue");
        }
        
        require($vue);
    }

    public static function patientRdv()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $results = ModelPersonne::getRdv($_SESSION["login"]->getId());
        $adresse_patient = $_SESSION["login"]->getAdresse();
        
        include 'config.php';
        $vue = $root . '/app/view/patient/viewRdv.php';
        
        if (DEBUG) {
            echo ("ControllerPatient : patientRdv : vue = $vue");
        }
        
        require($vue);
    }

    public static function takeRdv()
    {
        $resultsPraticien = ModelPersonne::getAllPersonneType(1);
        $listPraticien = array();
        
        foreach ($resultsPraticien as $praticien) {
            $listPraticien[$praticien->getId()] = $praticien->getNom() . " " . $praticien->getPrenom();
        }
        
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsertRdv.php';
        
        if (DEBUG) {
            echo ("ControllerPatient : takeRdv : vue = $vue");
        }
        
        require($vue);
    }

    public static function rdvDispo()
    {
        $resultsRdv = ModelRendezvous::getRdvDispoForPraticien($_GET['praticien_id']);
        $listRdv = array();
        
        foreach ($resultsRdv as $rdv) {
            $listRdv[$rdv->getId()] = $rdv->getRdvDate();
        }
        
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsertRdvDispo.php';
        
        if (DEBUG) {
            echo ("ControllerPatient : rdvDispo : vue = $vue");
        }
        
        require($vue);
    }

    public static function updateRdv()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $results = ModelRendezvous::update(
            htmlspecialchars($_SESSION["login"]->getId()), htmlspecialchars($_GET['rendezvous_id'])
        );
        
        $resultsRdv = ModelRendezvous::getOne($_GET['rendezvous_id']);
        $date = "";
        
        foreach ($resultsRdv as $rdv) {
            $date = $rdv->getRdvDate();
        }
        
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsertedRdv.php';
        require($vue);
    }
}

?>