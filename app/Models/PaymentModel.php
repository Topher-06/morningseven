<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model {

        protected $DBGroup          = 'default';
        protected $table            = 'payment';
        protected $primaryKey       = 'p_id';
        protected $useAutoIncrement = true;
        protected $insertID         = 0;
        protected $returnType       = 'array';
        protected $useSoftDeletes   = false;
        protected $protectFields    = true;
        protected $allowedFields    = [
					'p_id',
					'b_id',
					'p_first_name',
					'p_last_name',
					'p_amount',
					'p_reference',
					'p_pom',
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
