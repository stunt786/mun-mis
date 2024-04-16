<?php

namespace App\Models;

use CodeIgniter\Model;

class GhabargaModel extends Model
{
    protected $table = 'ghabarga';
    protected $primaryKey = 'id';
    protected $allowedFields = ['orgname', 
                                'cert_no',
                                'fiscal_year',
                                'orgestddate',
                                'orgprovinceid',
                                'orgdistrictid',
                                'orgmunicipalityid',
                                'orgwardid',
                                'orgroad',
                                'orgphone',
                                'orgemail',
                                'orgpan',
                                'orgtype',
                                'maxcapital',
                                'currentcapital',
                                'barga',
                                'ogroup',
                                'overdraftcapital',
                                'currentaccount',
                                'savingaccount',
                                'mudatiaccount',
                                'skilledemployee',
                                'unskilledemployee',
                                'otheremployee',
                                'vehicleslist',
                                'applicantname',
                                'applicantphone',
                                'applicantaddress',
                                'applicantemail',
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
