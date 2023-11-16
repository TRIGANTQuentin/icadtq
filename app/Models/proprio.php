<?php

namespace App\Models;

use CodeIgniter\Model;

class proprio extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'proprietaire';
    protected $primaryKey       = 'ID_PROPRIO';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "NOM_PROPRIO",
        "PRENOM_PROPRIO",
        "EMAIL_PROPRIO",
        "ADRESSE_PROPRIO",
        "NO_TELEPHONE_PROPRIO",
        "VILLE_PROPRIO",
        "CP_PROPRIO",
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
