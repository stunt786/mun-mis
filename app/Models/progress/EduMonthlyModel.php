<?php

namespace App\Models\Progress;

use CodeIgniter\Model;

class EduMonthlyModel extends Model
{
    protected $table = 'edumonthly';
    protected $primaryKey = 'id';
    protected $allowedFields = ['assessment',
                                'progress_summary', 
                                'remarks',
                                'month',
                                'year',
                                'user_id',
                                'edited_by',
                                'image_path',
                                'file_path'];
    protected $orderBy = 'id DESC';

}

