<?php

namespace App\Models;

use CodeIgniter\Model;

class YearModel extends Model{
    protected $table = 'years';
    protected $primaryKey = 'id';
    protected $allowedFields = ['year', 'active', 'user_id', 'edited_by', 'image_path', 'file_path'];

    public function getYears()
    {
        //Fetch year data from the database
        return $this->findAll();
    }
    public function getCurrentYear() 
{
    return $this->where('active', 1)
                ->select('year')
                ->first(); 
}

}