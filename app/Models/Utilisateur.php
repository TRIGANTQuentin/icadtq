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
}
