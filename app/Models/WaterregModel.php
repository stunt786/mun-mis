<?php

namespace App\Models;

use CodeIgniter\Model;

class WaterregModel extends Model
{
    protected $table = 'waterreg';
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
                                'org_members',
                                'review_date',
                                'org_future',
                                'org_resource_name',
                                'org_use',
                                'org_capacity',
                                'org_tole',
                                'org_type',
                                'org_type_description',
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
