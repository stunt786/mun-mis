<?php

namespace App\Models;

use CodeIgniter\Model;

class DistrictModel extends Model{
    protected $table = 'district';
    protected $primaryKey = 'id';
    protected $allowedFields = ['district', 'status', 'province_id'];

  
}