<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelRendezvous.php';

class ControllerPatient
{
    public static function Informationpatient()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $results = ModelPersonne::getOne($_SESSION["login"]->getId());
        
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInfo.php';
        
        if (DEBUG) {
            echo ("ControllerPatient : Informationpatient : vue = $vue");
        }
        
        require($vue);
    }

    public static function Rdvpatient()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $results = ModelPersonne::getRdv($_SESSION["login"]->getId());
        $adresse_patient = $_SESSION["login"]->getAdresse();
        
        include 'config.php';
        $vue = $root . '/app/view/patient/viewRdv.php';
        
        if (DEBUG) {
            echo ("ControllerPatient : Rdvpatient : vue = $vue");
        }
        
        require($vue);
    }

    public static function prendrerdv()
    {
        $resultsPraticien = ModelPersonne::getTypePersonne(1);
        $listPraticien = array();
        
        foreach ($resultsPraticien as $praticien) {
            $listPraticien[$praticien->getId()] = $praticien->getNom() . " " . $praticien->getPrenom();
        }
        
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsertRdv.php';
        
        if (DEBUG) {
            echo ("ControllerPatient : prendrerdv : vue = $vue");
        }
        
        require($vue);
    }

    public static function DispoRdv()
    {
        $resultsRdv = ModelRendezvous::getDispoRdvPraticien($_GET['praticien_id']);
        $listRdv = array();
        
        foreach ($resultsRdv as $rdv) {
            $listRdv[$rdv->getId()] = $rdv->getRdvDate();
        }
        
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsertDispoRdv.php';
        
        if (DEBUG) {
            echo ("ControllerPatient : DispoRdv : vue = $vue");
        }
        
        require($vue);
    }

    public static function ActuRdv()
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