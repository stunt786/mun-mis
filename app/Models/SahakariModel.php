<?php

namespace App\Models;

use CodeIgniter\Model;

class SahakariModel extends Model
{
    protected $table = 'sahakari';
    protected $primaryKey = 'id';
    protected $allowedFields = ['org_name', 
                                'cert_no',
                                'fiscal_year',
                                'org_established_nep_date',
                                'org_province_id',
                                'org_district_id',
                                'org_municipality_id',
                                'org_ward_id',
                                'org_road_name',
                                'org_phone',
                                'org_email',
                                'org_pan',
                                'org_type',
                                'org_type_description',
                                'org_members',
                                'org_male',
                                'org_female',
                                'org_work_area',
                                'org_dayewto',
                                'org_share_capital',
                                'org_entry_capital',
                                'applicant_name',
                                'applicant_phone',
                                'applicant_address',
                                'chief_officer',
                                'chief_officer_job',
                                'org_reg_date',
                                'status',
                                'renew_date',
                                'expiry_date',
                                'expiry_status',
                                'remarks',
                                'user_id',
                                'edited_by',
                                'image_path',
                                'file_path'];
    protected $orderBy = 'id DESC';
}
