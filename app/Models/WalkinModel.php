<?php

namespace App\Models;

use CodeIgniter\Model;

class WalkinModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'walkin';
    protected $primaryKey       = 'w_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'w_id', 'w_rid', 'w_book_id', 'w_check_in', 'w_first_name', 'w_last_name', 'w_number', 'w_email', 'w_address', 'w_zip_code', 'w_subtotal', 'w_tax', 'w_all_total', 'w_senior_discount', 'w_pricePerson', 'w_seniorNum', 'w_personNum', 'w_valid_id_number', 'w_check_out'
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
