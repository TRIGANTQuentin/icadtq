<?php

namespace App\Models;

use CodeIgniter\Model;

class Utilisateur extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'utilisateur';
    protected $primaryKey       = 'ID_UTILISATEUR';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "EMAIL_UTILISATEUR",
        "NOM_UTILISATEUR",
        "PRENOM_UTILISATEUR",
        "FONCTION_UTILISATEUR",
        "ADRESSE_UTILISATEUR",
        "NO_TELEPHONE_UTILISATEUR",
        "VILLE_UTILISATEUR",
        "CP_UTILISATEUR",
        "MDP_HASH_UTILISATEUR",
    ];

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

    public function loginValide()
    {
        $db = \Config\Database::connect();
        $requete = $db->table('utilisateur');

        $email = $_POST['email-utilisateur'];
        $mdp = $_POST['mdp-utilisateur'];

        $resultat = $db->query("SELECT EMAIL_UTILISATEUR, MDP_HASH_UTILISATEUR, ID_UTILISATEUR FROM utilisateur WHERE EMAIL_UTILISATEUR = '" . $email . "' ;");

        if (empty($resultat->getRow()))
        {
            return false;
        }
        else
        {
            $row = $resultat->getRowArray();
            if (password_verify($mdp, $row['MDP_HASH_UTILISATEUR']))
            {          
                $session = session();
                $newdata = [
                    'id'  => $row['ID_UTILISATEUR'],
                    'email'     => $row['EMAIL_UTILISATEUR'],
                    'logged_in' => true,
                ];
                
                $session->set($newdata);
                return true;
            }
            else 
            {
                return false;
            }
        }

    }
}

