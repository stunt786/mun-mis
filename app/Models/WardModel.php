<?php

namespace App\Models;

use CodeIgniter\Model;

class WardModel extends Model{
    protected $table = 'ward';
    protected $primaryKey = 'id';
    protected $allowedFields = ['ward', 'status', 'municipality_id'];

    public function getWards()
    {
        //Fetch year data from the database
        return $this->findAll();
    }
}