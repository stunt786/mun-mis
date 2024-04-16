<?php

namespace App\Models;

use CodeIgniter\Model;

class BewosayeModel extends Model
{
    protected $table = 'business';
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
                                 'org_house_no',
                                 'org_phone',
                                 'org_email',
                                 'org_pan',
                                 'org_type',
                                 'org_type_description',
                                 'org_total_capital',
                                 'org_ownership',
                                 'org_land_kitta_no',
                                 'prop_name',
                                 'boardsize',
                                 'prop_phone',
                                 'prop_road_name',
                                 'prop_ctzn_no',
                                 'prop_ctzn_district',
                                 'prop_ctzn_date',
                                 'org_house_owner',
                                 'org_house_owner_address',
                                 'org_house_owner_phone',
                                 'org_house_rent',
                                 'applicant_name',
                                 'applicant_phone',
                                 'applicant_address',
                                 'chief_officer',
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
