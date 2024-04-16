<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvinceModel extends Model{
    protected $table = 'province';
    protected $primaryKey = 'id';
    protected $allowedFields = ['province', 'status'];

}