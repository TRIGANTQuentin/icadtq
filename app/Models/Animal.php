<?php

namespace App\Models;

use CodeIgniter\Model;

class Animal extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Animal';
    protected $primaryKey       = 'ID_ICAD';
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
        $session = session();
        $id = $session->get('id');

        $db = \Config\Database::connect();
        $result = $db->query("SELECT animal.ID_ICAD, animal.NOM_ANIMAL, animal.DATE_NAISSANCE_ANIMAL, animal.INFO_ANIMAL, animal.RACE_ANIMAL, animal.IS_PERDU_ANIMAL, espece_animal.NOM_ESPECE AS 'ESPECE_ANIMAL' , sexe_animal.NOM_SEXE AS 'SEXE_ANIMAL', proprietaire.NOM_PROPRIO, proprietaire.ID_PROPRIO FROM animal JOIN sexe_animal ON animal.SEXE_ANIMAL = sexe_animal.ID_SEXE JOIN espece_animal ON animal.ESPECE_ANIMAL = espece_animal.ID_ESPECE LEFT JOIN proprietaire ON animal.ID_PROPRIO = proprietaire.ID_PROPRIO WHERE animal.ID_UTILISATEUR = " . $id . " AND animal.IS_SUPPRIMER = 0 ORDER BY animal.ID_ICAD;");
        return $result->getResultArray();
    }

    public function sexeDifferent($sexeAnimal)
    {
        $db = \Config\Database::connect();
        $requete = $db->table('sexe_animal');
        $resultat = $db->query("SELECT sexe_animal.* FROM sexe_animal WHERE ID_SEXE != " . $sexeAnimal);
        return $resultat->getResultArray();

    }

    public function especeDifferente($especeAnimal)
    {
        $db = \Config\Database::connect();
        $requete = $db->table('sexe_animal');
        $resultat = $db->query("SELECT espece_animal.* FROM espece_animal WHERE ID_ESPECE != " . $especeAnimal);
        return $resultat->getResultArray();

    }

    

    public function unAnimal($id)
    {
        
        $db = \Config\Database::connect();
        $result = $db->query("SELECT animal.ID_ICAD, animal.NOM_ANIMAL, animal.DATE_NAISSANCE_ANIMAL, animal.INFO_ANIMAL, animal.RACE_ANIMAL, espece_animal.ID_ESPECE, espece_animal.NOM_ESPECE AS 'ESPECE_ANIMAL' , sexe_animal.ID_SEXE, sexe_animal.NOM_SEXE AS 'SEXE_ANIMAL' FROM animal JOIN sexe_animal ON animal.SEXE_ANIMAL = sexe_animal.ID_SEXE JOIN espece_animal ON animal.ESPECE_ANIMAL = espece_animal.ID_ESPECE LEFT JOIN proprietaire ON animal.ID_PROPRIO = proprietaire.ID_PROPRIO WHERE ID_ICAD = " . $id);
        return $result->getResultArray();
    }

    public function historiqueAnimal($id)
    {
        
        $db = \Config\Database::connect();
        $result = $db->query("SELECT log_animal.ID_ICAD, log_animal.DATE_ACTION, log_animal.TYPE_ACTION, log_animal.NOM_ANIMAL, log_animal.DATE_NAISSANCE_ANIMAL, log_animal.INFO_ANIMAL, log_animal.RACE_ANIMAL, proprietaire.NOM_PROPRIO AS NOM_PROPRIETAIRE, sexe_animal.NOM_SEXE AS SEXE_ANIMAL, espece_animal.NOM_ESPECE AS ESPECE_ANIMAL, log_animal.IS_PERDU_ANIMAL FROM log_animal LEFT JOIN proprietaire ON log_animal.ID_PROPRIO = proprietaire.ID_PROPRIO JOIN sexe_animal ON log_animal.SEXE_ANIMAL = sexe_animal.ID_SEXE JOIN espece_animal ON log_animal.ESPECE_ANIMAL = espece_animal.ID_ESPECE WHERE ID_ICAD = " . $id . " ORDER BY DATE_ACTION");
        return $result->getResultArray();
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

    public function supprimerUnAnimal($id)
    {
        $db = \Config\Database::connect();
        $requete = $db->table('animal');
        $donnee =
        [
            "IS_SUPPRIMER" => 1
        ];

        $requete->where("ID_ICAD", $id);
        $requete->update($donnee);
    }

    public function perduVolAnimal($id)
    {
        $db = \Config\Database::connect();
        $requete = $db->table('animal');
        $donnee =
        [
            "IS_PERDU_ANIMAL" => 1
        ];

        $requete->where("ID_ICAD", $id);
        $requete->update($donnee);
    }

    public function retrouveAnimal($id)
    {
        $db = \Config\Database::connect();
        $requete = $db->table('animal');
        $donnee =
        [
            "IS_PERDU_ANIMAL" => 0
        ];

        $requete->where("ID_ICAD", $id);
        $requete->update($donnee);
    }

    public function demandeRetrouveAnimal()
    {
        $db = \Config\Database::connect();
        $requete = $db->table('declarer_retrouve_animal');
        $donnee =
        [
            "ID_ANIMAL" => $_POST['numeroAnimal'],
            "TELEPHONE_DEMANDE" => $_POST['coordonneeTelephone'],
            "EMAIL_DEMANDE" => $_POST['coordonneeEmail'],
            "INFORMATIONS_SUPPLEMENTAIRES" => $_POST['informationsSupplementairesAnimal']
        ];
        $requete->insert($donnee);
    }

    
    
    public function nouvelanimal(){
        $db = \Config\Database::connect();
        $requete = $db -> table ('animal');
        $session = session();
        $data = [
            
            'NOM_ANIMAL' => $_POST['name'],
            'DATE_NAISSANCE_ANIMAL' => $_POST['date'],
            'SEXE_ANIMAL' => $_POST['sexe'] ,
            'ESPECE_ANIMAL' => $_POST['espece'],
            'RACE_ANIMAL' => $_POST['race'],
            'INFO_ANIMAL' => $_POST['signes'],
            'ID_PROPRIO' => $_POST["proprietaire"],
            'ID_UTILISATEUR' => $session->get('id')
        ];
        $requete -> insert($data);
        return $_POST['name'];
        //$requete -> insert($data, false);
        //$requete -> getInsertID();
    }



}