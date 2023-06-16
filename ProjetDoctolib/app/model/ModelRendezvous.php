<?php

require_once 'Model.php';

class ModelRendezvous {
    private $id;
    private $patient_id;
    private $praticien_id;
    private $rdv_date;

    public function __construct($id = NULL, $patient_id = NULL, $praticien_id = NULL, $rdv_date = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->patient_id = $patient_id;
            $this->praticien_id = $praticien_id;
            $this->rdv_date = $rdv_date;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPatientId() {
        return $this->patient_id;
    }

    public function setPatientId($patient_id) {
        $this->patient_id = $patient_id;
    }

    public function getPraticienId() {
        return $this->praticien_id;
    }

    public function setPraticienId($praticien_id) {
        $this->praticien_id = $praticien_id;
    }

    public function getRdvDate() {
        return $this->rdv_date;
    }

    public function setRdvDate($rdv_date) {
        $this->rdv_date = $rdv_date;
    }

    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM rendezvous";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOne($id) {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM rendezvous WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($praticien_id, $rdv_date) {
        try {
            $database = Model::getInstance();

            // Recherche de la valeur de la clé = max(id) + 1
            $query = "SELECT MAX(id) FROM rendezvous";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple[0];
            $id++;

            // Ajout d'un nouveau tuple
            $query = "INSERT INTO rendezvous VALUES (:id, 0, :praticien_id, :rdv_date)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'praticien_id' => $praticien_id,
                'rdv_date' => $rdv_date
            ]);

            return 0;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function getRdvDispoForPraticien($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM rendezvous WHERE praticien_id = :praticien_id AND patient_id = 0";
            $statement = $database->prepare($query);
            $statement->execute(['praticien_id' => $praticien_id]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllRdvPraticien($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM rendezvous WHERE praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute(['praticien_id' => $praticien_id]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getListRdv($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "SELECT nom, prenom, rdv_date 
                      FROM personne, rendezvous 
                      WHERE praticien_id = :praticien_id AND patient_id != 0 AND patient_id = personne.id";
            $statement = $database->prepare($query);
            $statement->execute(['praticien_id' => $praticien_id]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getMesPatients($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "SELECT DISTINCT nom, prenom, adresse 
                      FROM personne, rendezvous 
                      WHERE praticien_id = :praticien_id AND patient_id != 0 AND patient_id = personne.id";
            $statement = $database->prepare($query);
            $statement->execute(['praticien_id' => $praticien_id]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function update($patient_id, $id) {
        try {
            $database = Model::getInstance();

            // Modification du tuple
            $query = "UPDATE rendezvous SET patient_id = :patient_id WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'patient_id' => $patient_id,
                'id' => $id
            ]);

            return 0;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function delete() {
        echo ("ModelRendezvous : delete() TODO ....");
        return null;
    }
}