<?php

namespace App\Models;

use CodeIgniter\Model;

class ClubModel extends Model
{
    protected $table = 'clubs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['orgname', 
                                'certno',
                                'fiscalyear',
                                'estddate',
                                'province',
                                 'district',
                                 'municipality',
                                 'ward',
                                 'road',
                                 'phone',
                                 'email',
                                 'pan',
                                 'members',
                                 'type',
                                 'description',
                                 'applicantname',
                                 'applicantphone',
                                 'applicantaddr',
                                 'chiefofficer',
                                 'chiefofficerjob',
                                 'regdate',
                                 'orgstatus',
                                 'renewdate',
                                 'expirydate',
                                 'expirystatus',
                                 'remarks',
                                 'user_id',
                                 'edited_by',
                                 'image_path',
                                 'file_path'];
    protected $orderBy = 'id DESC';
}
