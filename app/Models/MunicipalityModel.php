<?php

namespace App\Models;

use CodeIgniter\Model;

class MunicipalityModel extends Model{
    protected $table = 'municipality';
    protected $primaryKey = 'id';
    protected $allowedFields = ['municipality', 'status', 'district_id'];

 
}