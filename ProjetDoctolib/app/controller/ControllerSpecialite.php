<?php

require_once '../model/ModelSpecialite.php';

class ControllerSpecialite
{
    public static function specialiteReadAll()
    {
        $results = ModelSpecialite::getAll();

        include 'config.php';
        $vue = $root . '/app/view/specialite/viewAll.php';

        if (DEBUG) {
            echo ("ControllerSpecialite : specialiteReadSpecialite : vue = $vue");
        }

        require($vue);
    }

    public static function specialiteReadId()
    {
        $results = ModelSpecialite::getAllId();

        include 'config.php';
        $vue = $root . '/app/view/specialite/viewId.php';
        require($vue);
    }

    public static function specialiteReadOne()
    {
        $specialite_id = $_GET['id'];
        $results = ModelSpecialite::getOne($specialite_id);

        include 'config.php';
        $vue = $root . '/app/view/specialite/viewAll.php';
        require($vue);
    }

    public static function specialiteCreate()
    {
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewInsert.php';
        require($vue);
    }

    public static function specialiteCreated()
    {
        $results = ModelSpecialite::insert(htmlspecialchars($_GET['label']));

        include 'config.php';
        $vue = $root . '/app/view/specialite/viewInserted.php';
        require($vue);
    }
}

?>