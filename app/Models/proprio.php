<?php

namespace App\Models;

use CodeIgniter\Model;

class proprio extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'proprietaire';
    protected $primaryKey = 'ID_PROPRIO';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        "NOM_PROPRIO",
        "PRENOM_PROPRIO",
        "EMAIL_PROPRIO",
        "ADRESSE__PROPRIO",
        "NO_TELEPHONE_PROPRIO",
        "VILLE_PROPRIO",
        "CP_PROPRIO",
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];


    public function unProprietaire($id)
    {

        $db = \Config\Database::connect();
        $requete = $db->table('proprietaire');

        $resultat = $db->query("SELECT proprietaire.* FROM proprietaire WHERE ID_PROPRIO = " . $id);

        return $resultat->getRowArray();

    }

    public function listeProprietaire()
    {
        $db = \Config\Database::connect();
        $requete = $db->table('proprietaire');
        $resultat = $db->query("SELECT proprietaire.* FROM proprietaire Where proprietaire.IS_SUPPRIMER !=1");
        return $resultat->getResultArray();
    }

    public function ajouterProprietaire()
    {

        $db = \Config\Database::connect();
        $requete = $db->table('proprietaire');
        $arr = [
            "EMAIL_PROPRIO" => $_POST['email'],
            "NOM_PROPRIO" => $_POST['nom'],
            "PRENOM_PROPRIO" => $_POST['prenom'],
            "ADRESSE_PROPRIO" => $_POST['adresse'],
            "VILLE_PROPRIO" => $_POST['ville'],
            "CP_PROPRIO" => $_POST['code_postal'],
            "NO_TELEPHONE_PROPRIO" => $_POST['phone']
        ];

        $requete->insert($arr);



    }
    public function modifierProprietaire()
    {
        $db = \Config\Database::connect();
        $requete = $db->table('proprietaire');
        $arr = [
            "EMAIL_PROPRIO" => $_POST['email'],
            "NOM_PROPRIO" => $_POST['nom'],
            "PRENOM_PROPRIO" => $_POST['prenom'],
            "ADRESSE_PROPRIO" => $_POST['adresse'],
            "VILLE_PROPRIO" => $_POST['ville'],
            "CP_PROPRIO" => $_POST['code_postal'],
            "NO_TELEPHONE_PROPRIO" => $_POST['phone']
        ];
        $requete->where("ID_PROPRIO", $_POST["idProprio"]);
        $requete->update($arr);
        return true;
    }
    public function supprimerUnProprio($id)
    {
        $db = \Config\Database::connect();
        $requete = $db->table('proprietaire');
        $donnee =
        [
            "IS_SUPPRIMER" => 1
        ];

        $requete->where("ID_PROPRIO", $id);
        $requete->update($donnee);
    }
}
