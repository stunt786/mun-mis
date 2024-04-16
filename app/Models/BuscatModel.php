<?php

namespace App\Models;

use CodeIgniter\Model;

class BuscatModel extends Model{
    protected $table = 'buscategory';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category', 'status'];

    public function getBuscategory()
    {
        //Fetch year data from the database
        return $this->findAll();
    }
}