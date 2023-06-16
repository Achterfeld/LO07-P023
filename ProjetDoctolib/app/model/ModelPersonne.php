<?php

require_once 'Model.php';

class ModelPersonne
{
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $login;
    private $password;
    private $statut;
    private $specialite_id;

    const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;

    public function __construct(
        $id = NULL,
        $nom = NULL,
        $prenom = NULL,
        $adresse = NULL,
        $login = NULL,
        $password = NULL,
        $statut = NULL,
        $specialite_id = NULL
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->login = $login;
        $this->password = $password;
        $this->statut = $statut;
        $this->specialite_id = $specialite_id;
    }

    // Getters et setters pour chaque propriété

    public static function getNomStatut($statut)
    {
        switch ($statut) {
            case self::ADMINISTRATEUR:
                return "Administrateur";
            case self::PRATICIEN:
                return "Praticien";
            case self::PATIENT:
                return "Patient";
        }
        return null;
    }

    public static function getOne($id)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM personne WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllPersonneType($type)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where statut = :statut";
            $statement = $database->prepare($query);
            $statement->execute([
                'statut' => $type
            ]);
            
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getPraticienSpecialite()
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT personne.id, nom, prenom, adresse, label 
                      FROM personne, specialite 
                      WHERE statut = 1 AND specialite_id = specialite.id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getRdv($id)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT nom, prenom, rdv_date, adresse 
                      FROM personne, rendezvous 
                      WHERE patient_id = :id AND praticien_id = personne.id";
            $statement = $database->prepare($query);
            $statement->execute(["id" => $id]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getNbPraticienPerPatient()
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT patient_id, nom, prenom, COUNT(*) as nb_praticien 
                      FROM personne, rendezvous 
                      WHERE personne.id = patient_id 
                      GROUP BY patient_id, nom, prenom";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOneByLoginPassword($login, $password)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where login = :login AND password = :password";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login,
                'password' => $password
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            foreach ($results as $personne){
                $_SESSION["user"] = $personne;
            }
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($nom, $prenom, $adresse, $login, $password, $statut, $specialite_id)
    {
        try {
            $database = Model::getInstance();

            // Recherche de la valeur de la clé = max(id) + 1
            $query = "SELECT MAX(id) FROM personne";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple[0];
            $id++;

            // Ajout d'un nouveau tuple
            $query = "INSERT INTO personne VALUES (:id, :nom, :prenom, :adresse, :login, :password, :statut, :specialite_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'adresse' => $adresse,
                'login' => $login,
                'password' => $password,
                'statut' => $statut,
                'specialite_id' => $specialite_id
            ]);

            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }


    public function getAdresse()
    {
        return $this->adresse;
    }


    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }


    public function getLogin()
    {
        return $this->login;
    }


    public function setLogin($login)
    {
        $this->login = $login;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getStatut()
    {
        return $this->statut;
    }


    public function setStatut($statut)
    {
        $this->statut = $statut;
    }


    public function getSpecialiteId()
    {
        return $this->specialite_id;
    }


    public function setSpecialiteId($specialite_id)
    {
        $this->specialite_id = $specialite_id;
    }

}
?>
