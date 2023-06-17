<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelRendezvous.php';

class ControllerPraticien
{
    public static function getDispo()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $results = ModelRendezvous::getDispoRdvPraticien($_SESSION["login"]->getId());

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewDispo.php';
        require($vue);
    }

    public static function AjoutDispo()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $resultRdv = ModelRendezvous::getToutRdvPraticien($_SESSION["login"]->getId());
        $dateIndispo = array();
        
        foreach ($resultRdv as $rdv) {
            $dateIndispo[] = explode(" ", $rdv->getRdvDate())[0];
        }
        
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewInsertDispo.php';
        
        if (DEBUG) {
            echo ("ControllerPraticien : AjoutDispo : vue = $vue");
        }
        
        require($vue);
    }
// Disponibilités ajoutées 
    public static function AjtDispo()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $heureRdv = 10;
        
        for ($i = 0; $i < $_GET["rdv_nombre"]; $i++) {
            $results = ModelRendezvous::insert(
                $_SESSION["login"]->getId(),
                htmlspecialchars($_GET['rdv_date']) . " à " . $heureRdv . "h00"
            );
            
            $heureRdv++;
        }
        
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewInsertedDispo.php';
        require($vue);
    }

    public static function getRdvListe()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $results = ModelRendezvous::getRdvListe($_SESSION["login"]->getId());

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewMesRdv.php';
        require($vue);
    }

    public static function getMesPatients()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $results = ModelRendezvous::getMesPatients($_SESSION["login"]->getId());

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewMesPatients.php';
        require($vue);
    }
}

?>