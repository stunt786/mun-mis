<?php

namespace App\Models;

use CodeIgniter\Model;

class ApangaModel extends Model
{
    protected $table = 'apanga';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cert_no',
                                'fiscal_year',
                                'name',
                                'ename',
                                'birth_date',
                                'ebirth_date',
                                'age',
                                'gender',
                                'egender',
                                'province',
                                'eprovince',
                                'district',
                                'edistrict',
                                'municipality',
                                'emunicipality',
                                'ward',
                                'tole',
                                'eward',
                                'mobile',
                                'email',
                                'id_no',
                                'eid_no',
                                'father',
                                'efather',
                                'mother',
                                'emother',
                                'guardian',
                                'eguardian',
                                'guardian_relation',
                                'guardian_contact',
                                'disability_type',
                                'edisability_type',
                                'disability_description',
                                'disability_reason',
                                'maritial_status',
                                'blood_group',
                                'helper_tool',
                                'helper_tool_name',
                                'people_need',
                                'people_need_desc',
                                'education',
                                'training',
                                'current_job',
                                'reg_date',
                                'ereg_date',
                                'file_path',
                                'image_path',
                                'remarks',
                                'father1',
                                'chief_officer',
                                'echiefofficer',
                                'chief_officer_job',
                                'echiefofficerjob',
                                'applicant_name',
                                'applicant_phone',
                                'applicant_address',
                                'status',
                                'user_id',
                                'edited_by',
                                ];
    protected $orderBy = 'id DESC';
}
