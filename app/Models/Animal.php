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
        $result = mysqli_query($mysqli,"SELECT animal.ID_ICAD, animal.NOM_ANIMAL, animal.DATE_NAISSANCE_ANIMAL, animal.INFO_ANIMAL, animal.RACE_ANIMAL, espece_animal.nom AS 'ESPECE_ANIMAL' , sexe_animal.nom AS 'SEXE_ANIMAL' FROM animal JOIN sexe_animal ON animal.SEXE_ANIMAL = sexe_animal.id JOIN espece_animal ON animal.ESPECE_ANIMAL = espece_animal.id JOIN proprietaire ON animal.ID_PROPRIO = proprietaire.ID_PROPRIO");
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }

    

    public function unAnimal($id)
    {
        $mysqli = mysqli_connect("localhost", "root", "", "icad1");
        $result = mysqli_query($mysqli,"SELECT animal.ID_ICAD, animal.NOM_ANIMAL, animal.DATE_NAISSANCE_ANIMAL, animal.INFO_ANIMAL, animal.RACE_ANIMAL, espece_animal.nom AS 'ESPECE_ANIMAL' , sexe_animal.nom AS 'SEXE_ANIMAL' FROM animal JOIN sexe_animal ON animal.SEXE_ANIMAL = sexe_animal.id JOIN espece_animal ON animal.ESPECE_ANIMAL = espece_animal.id JOIN proprietaire ON animal.ID_PROPRIO = proprietaire.ID_PROPRIO WHERE ID_ICAD = " . $id);
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

        $requete = $db->table('historique');
        $requete->insert(["ID_ICAD" => $_POST["idAnimal"], "ETAT" => "Modification" ]);
        return true;
    }
    
    public function nouvelanimal(){
        $db = \Config\Database::connect();
        $requete = $db -> table ('animal');
        $data = [
            
            'NOM_ANIMAL' => $_POST['name'],
            'DATE_NAISSANCE_ANIMAL' => $_POST['date'],
            'SEXE_ANIMAL' => $_POST['sexe'] ,
            'ESPECE_ANIMAL' => $_POST['espece'],
            'RACE_ANIMAL' => $_POST['race'],
            'INFO_ANIMAL' => $_POST['message'],
            'ID_PROPRIO' => 1

                
        ];
        $requete -> insert($data);
        //$requete -> insert($data, false);
        //$requete -> getInsertID();
    }



}