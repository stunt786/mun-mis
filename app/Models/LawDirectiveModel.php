<?php

namespace App\Models;

use CodeIgniter\Model;

class LawDirectiveModel extends Model
{
    protected $table = 'lawdirective';
    protected $primaryKey = 'id';
    protected $allowedFields = ['lname', 
                                'publish',
                                'karyapalika',
                                'type',
                                'fiscalyear',
                                 'file_path',
                                 'image_path',
                                 'user_id',
                                 'edited_by'];

    protected $orderBy = 'id DESC';
}

