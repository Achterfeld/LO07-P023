<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';

class ControllerDoctolib
{
    public static function doctolibAccueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        
        if (DEBUG) {
            echo ("ControllerDoctolib : DoctolibAccueil : vue = $vue");
        }
        
        require($vue);
    }

    public static function doctolibInnovation()
    {
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewInnovation.php';
        
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibInnovation : vue = $vue");
        }
        
        require($vue);
    }

    public static function doctolibAmelioration()
    {
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewAmelioration.php';
        
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAmelioration : vue = $vue");
        }
        
        require($vue);
    }

    public static function doctolibConnexion()
    {
        include 'config.php';
        $vue = $root . '/app/view/connexion/loginForm.php';
        
        if (DEBUG) {
            echo ("ControllerDoctolib : DoctolibConnexion : vue = $vue");
        }
        
        require($vue);
    }

    public static function doctolibVerifConnexion()
    {
        $login = $_GET['login'];
        $password = $_GET['password'];
        $results = ModelPersonne::getOneByLoginPassword($login, password_hash($password, PASSWORD_DEFAULT));
        print_r(password_hash($password, PASSWORD_DEFAULT));
        die;
        if (!empty($results)) {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (password_verify($password, $results[0]->getPassword()))
            {
              /* The password is correct. */
              $_SESSION["login"] = $results[0];
              self::doctolibAccueil();
            }

        } else {
            $_GET["erreur"] = "Utilisateur ou mot de passe incorrect";
            self::doctolibConnexion();
        }
    }

    public static function doctolibDeconnexion()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION["login"] = null;
        self::doctolibAccueil();
    }

    public static function personneCreate()
    {
        $listStatut = array(
            ModelPersonne::ADMINISTRATEUR => ModelPersonne::getNomStatut(ModelPersonne::ADMINISTRATEUR),
            ModelPersonne::PRATICIEN => ModelPersonne::getNomStatut(ModelPersonne::PRATICIEN),
            ModelPersonne::PATIENT => ModelPersonne::getNomStatut(ModelPersonne::PATIENT)
        );
        
        $listSpecialite = ModelSpecialite::getAll();
        
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewInsert.php';
        require($vue);
    }

    public static function personneCreated()
    {
        $results = ModelPersonne::insert(
            htmlspecialchars($_GET['nom']),
            htmlspecialchars($_GET['prenom']),
            htmlspecialchars($_GET['adresse']),
            htmlspecialchars($_GET['login']),
            htmlspecialchars(password_hash($_GET['password'], PASSWORD_DEFAULT)),
            htmlspecialchars($_GET['statut']),
            htmlspecialchars($_GET['specialite_id'])
        );
        
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewInserted.php';
        require($vue);
    }
}

?>