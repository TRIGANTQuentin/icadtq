<?php

namespace App\Models;

use CodeIgniter\Model;

class Animal extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'icad1';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function listeAnimal()
    {
        $mysqli = mysqli_connect("localhost", "root", "", "icad1");
        $result = mysqli_query($mysqli,'SELECT * FROM animal');
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }

    public function unAnimal($id)
    {
        $mysqli = mysqli_connect("localhost", "root", "", "icad1");
        $result = mysqli_query($mysqli,"SELECT * FROM animal WHERE ID_ICAD = " . $id);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }

    public function modifierUnAnimal()
    {
        $db = \Config\Database::connect();
        $requete = $db->table('animal');
        $donnee =
        [
            "NOM_ANIMAL" => $_POST["nomAnimal"],
            "DATE_NAISSANCE_ANIMAL" => $_POST["dateNaissanceAnimal"],
            "ESPECE_ANIMAL" => $_POST["especeAnimal"],
            "RACE_ANIMAL" => $_POST["raceAnimal"],
            "SEXE_ANIMAL" => $_POST["sexeAnimal"],
            "INFO_ANIMAL" => $_POST["infoAnimal"]

        ];

        $requete->where("ID_ICAD", $_POST["idAnimal"]);
        $requete->update($donnee);
        return true;
    }
}
