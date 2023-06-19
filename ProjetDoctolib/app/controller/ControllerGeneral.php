<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';

class ControllerGeneral
{
    public static function Accueil()
    {

        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php';
        
        if (DEBUG) {
            echo ("ControllerGeneral : Accueil : vue = $vue");
        }
        
        require($vue);
    }

    public static function InnovationDocto()
    {
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewInnovation.php';
        
        if (DEBUG) {
            echo ("ControllerGeneral : InnovationDocto : vue = $vue");
        }
        
        require($vue);
    }

    public static function AmelioDocto()
    {
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewAmelioration.php';
        
        if (DEBUG) {
            echo ("ControllerGeneral : AmelioDocto : vue = $vue");
        }
        
        require($vue);
    }

    public static function ConnexionDocto()
    {
        include 'config.php';
        $vue = $root . '/app/view/connexion/loginForm.php';
        
        if (DEBUG) {
            echo ("ControllerGeneral : ConnexionDocto : vue = $vue");
        }
        
        require($vue);
    }
// Verification de la connexion 
    public static function verifCoDoctolib()
    {

        $login = $_POST['login'];
        $password = $_POST['password'];
        $result = ModelPersonne::getspeLogin($login);
        if (!empty($result)) {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            echo "ok";

            if (password_verify($password, $result->getPassword()))
            {

              /* The password is correct. */
              $_SESSION["login"] = $result;
              self::Accueil();
            }

        } else {
            $_GET["erreur"] = "Identifiants incorrects veuillez réessayer";
            self::ConnexionDocto();
        }
    }

    public static function DeconnexionDocto()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION["login"] = null;
        self::Accueil();
    }
// Creation du statut 
    public static function Creerpersonne()
    {
        $listStatut = array(
            ModelPersonne::ADMINISTRATEUR => ModelPersonne::getTypestatut(ModelPersonne::ADMINISTRATEUR),
            ModelPersonne::PRATICIEN => ModelPersonne::getTypestatut(ModelPersonne::PRATICIEN),
            ModelPersonne::PATIENT => ModelPersonne::getTypestatut(ModelPersonne::PATIENT)
        );
        
        $listSpecialite = ModelSpecialite::getAll();
        
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewInsert.php';
        require($vue);
    }
// Les infos de la personne crées
    public static function creationpersonne()
    {
        $speId = isset($_GET['specialite_id']) ? $_GET['specialite_id'] : 0;
        $results = ModelPersonne::insert(
            htmlspecialchars($_GET['nom']),
            htmlspecialchars($_GET['prenom']),
            htmlspecialchars($_GET['adresse']),
            htmlspecialchars($_GET['login']),
            htmlspecialchars(password_hash($_GET['password'], PASSWORD_DEFAULT)),
            htmlspecialchars($_GET['statut']),
            $speId
        );
        
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewInserted.php';
        require($vue);
    }
}

?>