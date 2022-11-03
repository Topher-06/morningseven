<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{

  protected $DBGroup          = 'default';
  protected $table            = 'booking';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $insertID         = 0;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = [
    'id',
    'book_id',
    'check_in',
    'check_out',
    'no_of_hours',
    'promo_code',
    'first_name',
    'last_name',
    'number',
    'email',
    'address',
    'zip_code',
    'valid_id_number',
    'any_valid_id_pic',
    'subtotal',
    'promo_code_price',
    'tax',
    'all_total',
    'total_downpayment_required',
    'senior_discount',
    'status',
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
