<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fullname', 
                                'dob',
                                'gender',
                                'province',
                                'district',
                                'municipality',
                                'ward',
                                'tole',
                                'contact',
                                'email',
                                'mobile',
                                'marriedstatus',
                                'gfather',
                                'father',
                                'spouse',
                                'ctznid',
                                'ctzndistrict',
                                'pan',
                                'education',
                                'bloodgroup',
                                'image_path',
                                'niyukti',
                                'datefrom',
                                'dateto',
                                'empid',
                                'sanchayakosh',
                                'laganikosh',
                                'sheetroll',
                                'resigndate',
                                'sewa',
                                'empstatus',
                                'level',
                                'pad',
                                'office',
                                'branch',
                                'role',
                                'user_id',
                                'edited_by'];

    protected $orderBy = 'id DESC';
}

