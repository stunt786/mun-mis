<?php

namespace App\Models;

use CodeIgniter\Model;

class SamuhaModel extends Model
{
    protected $table = 'samuha';
    protected $primaryKey = 'id';
    protected $allowedFields = ['orgname', 
                                'certno',
                                'fiscalyear',
                                'orgestablishednepdate',
                                'orgprovinceid',
                                 'orgdistrictid',
                                 'orgmunicipalityid',
                                 'orgwardid',
                                 'orgroadname',
                                 'orgphone',
                                 'orgemail',
                                 'orgpan',
                                 'orgmembers',
                                 'orgtype',
                                 'orgtypedescription',
                                 'applicantname',
                                 'applicantphone',
                                 'applicantaddress',
                                 'branchofficer',
                                 'branchofficerjob',
                                 'chiefofficer',
                                 'chiefofficerjob',
                                 'orgregdate',
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
