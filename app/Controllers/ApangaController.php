<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\UploadedFile;
use App\Controllers\AdminBaseController;
use App\Models\ApangaModel;
use App\Models\YearModel;
use App\Models\ProvinceModel;
use App\Models\DistrictModel;
use App\Models\MunicipalityModel;
use App\Models\WardModel;
use App\Models\BuscatModel;



class ApangaController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;
        
    public function __construct(){
        $this->db = db_connect();
        $this->model= new ApangaModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
        
    }
    public function addApanga()
    {
        $this->permissionCheck('apanga_add');
        
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'फरक क्षमता दर्ता फारम';

        $model =new YearModel();
        
        $data['years'] = $model->findAll();

        $provinceModel = new ProvinceModel();
        $data['province'] = $provinceModel->findAll();

        $districtModel =new DistrictModel();
        $data['district'] = $districtModel->findAll();

        $municipalityModel =new MunicipalityModel();
        $data['municipality'] = $municipalityModel->findAll();

        $wardModel =new WardModel();
        $data['ward'] = $wardModel->findAll();

        
        return view('business/apanga/add', $data); 
    }

    public function apangalist()
    {
        $this->permissionCheck('apanga_list');
        $model = new ApangaModel();
        $data['title'] = 'फरक क्षमता सूची';
        $data['apanga'] = $model->findAll(); // Retrieve all users from the database
        return view('business/apanga/list', $data); // Load view with user data
    }
       
    public function apanga()
{
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];
    $this->permissionCheck('apanga_add');
    // Check if the uploads directory exists, create it if not
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }

    // Retrieve form data
    // Retrieve data from HTTP POST request
    $name = $this->request->getPost('name');
    $fiscal_year = $this->request->getPost('fiscal_year');
    $birth_date = $this->request->getPost('birth_date');
    $age = $this->request->getPost('age');
    $gender = $this->request->getPost('gender');
    $province = $this->request->getPost('province');
    $district = $this->request->getPost('district');
    $municipality = $this->request->getPost('municipality');
    $ward = $this->request->getPost('ward');
    $tole = $this->request->getPost('tole');
    $mobile = $this->request->getPost('mobile');
    $email = $this->request->getPost('email');
    $id_no = $this->request->getPost('id_no');
    $father = $this->request->getPost('father');
    $mother = $this->request->getPost('mother');
    $guardian = $this->request->getPost('guardian');
    $guardian_relation = $this->request->getPost('guardian_relation');
    $guardian_contact = $this->request->getPost('guardian_contact');
    $disability_type = $this->request->getPost('disability_type');
    $disability_description = $this->request->getPost('disability_description');
    $disability_reason = $this->request->getPost('disability_reason');
    $maritial_status = $this->request->getPost('maritial_status');
    $blood_group = $this->request->getPost('blood_group');
    $helper_tool = $this->request->getPost('helper_tool');
    $helper_tool_name = $this->request->getPost('helper_tool_name');
    $people_need = $this->request->getPost('people_need');
    $people_need_desc = $this->request->getPost('people_need_desc');
    $education = $this->request->getPost('education');
    $training = $this->request->getPost('training');
    $current_job = $this->request->getPost('current_job');
    $reg_date = $this->request->getPost('reg_date');
    $ename = $this->request->getPost('ename');
    $status = $this->request->getPost('status');
    $ebirth_date = $this->request->getPost('ebirth_date');
    $egender = $this->request->getPost('egender');
    $eprovince = $this->request->getPost('eprovince');
    $edistrict = $this->request->getPost('edistrict');
    $emunicipality = $this->request->getPost('emunicipality');
    $eward = $this->request->getPost('eward');
    $eid_no = $this->request->getPost('eid_no');
    $efather = $this->request->getPost('efather');
    $emother = $this->request->getPost('emother');
    $eguardian = $this->request->getPost('eguardian');
    $edisability_type = $this->request->getPost('edisability_type');
    $ereg_date = $this->request->getPost('ereg_date');
    $father1 = $this->request->getPost('father1');
    
    $chief_officer = $this->request->getPost('chief_officer');
    $echiefofficer = $this->request->getPost('echiefofficer');
    $chief_officer_job = $this->request->getPost('chief_officer_job');
    $echiefofficerjob = $this->request->getPost('echiefofficerjob');
    $applicant_name = $this->request->getPost('applicant_name');
    $applicant_phone = $this->request->getPost('applicant_phone');
    $applicant_address = $this->request->getPost('applicant_address');
        
    $file1 = $this->request->getFile('file1');
    $file2 = $this->request->getFile('file2');

    // Retrieve the last serial number from the database
    $lastSerial = $this->model->selectMax('cert_no')->get()->getRowArray();
    $serialNo = intval($lastSerial['cert_no']) + 1; // Convert to integer before addition

    // Format the serial number with leading zeros
    $serialNoFormatted = sprintf("%03d", $serialNo);

    helper(['form']);
    $validation = \Config\Services::validation();
    $validation->setRules([
        
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        'file2' => 'max_size[file2,5120]|ext_in[file2,jpg,jpeg,png]'
    ]);

    // validate
    if (! $this->validate([
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        'file2' => 'max_size[file2,5120]|ext_in[file2,jpg,jpeg,png]',
     
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    // Initialize an array to hold file paths
    $filePaths = [];

    // Process the files (if any)
    foreach ([$file1, $file2] as $index => $file) {
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            if ($file->move("uploads/", $newName)) {
                $filePaths[$index] = "uploads/" . $newName; // Assign path to the corresponding index
            }
        }
    }

            // Save record to the database
            $dataToSave = [
                'name' => $this->db->escapeString($name),
                'fiscal_year' => $this->db->escapeString($fiscal_year),
                'birth_date' => $this->db->escapeString($birth_date),
                'age' => $this->db->escapeString($age),
                'gender' => $this->db->escapeString($gender),
                'province' => $this->db->escapeString($province),
                'district' => $this->db->escapeString($district),
                'municipality' => $this->db->escapeString($municipality),
                'ward' => $this->db->escapeString($ward),
                'tole' => $this->db->escapeString($tole),
                'mobile' => $this->db->escapeString($mobile),
                'email' => $this->db->escapeString($email),
                'id_no' => $this->db->escapeString($id_no),
                'father' => $this->db->escapeString($father),
                'mother' => $this->db->escapeString($mother),
                'guardian' => $this->db->escapeString($guardian),
                'guardian_relation' => $this->db->escapeString($guardian_relation),
                'guardian_contact' => $this->db->escapeString($guardian_contact),
                'disability_type' => $this->db->escapeString($disability_type),
                'disability_description' => $this->db->escapeString($disability_description),
                'disability_reason' => $this->db->escapeString($disability_reason),
                'maritial_status' => $this->db->escapeString($maritial_status),
                'blood_group' => $this->db->escapeString($blood_group),
                'helper_tool' => $this->db->escapeString($helper_tool),
                'helper_tool_name' => $this->db->escapeString($helper_tool_name),
                'people_need' => $this->db->escapeString($people_need),
                'people_need_desc' => $this->db->escapeString($people_need_desc),
                'education' => $this->db->escapeString($education),
                'training' => $this->db->escapeString($training),
                'current_job' => $this->db->escapeString($current_job),
                'reg_date' => $this->db->escapeString($reg_date),
                'ename' => $this->db->escapeString($ename),
                'status' => $this->db->escapeString($status),
                'ebirth_date' => $this->db->escapeString($ebirth_date),
                'egender' => $this->db->escapeString($egender),
                'eprovince' => $this->db->escapeString($eprovince),
                'edistrict' => $this->db->escapeString($edistrict),
                'emunicipality' => $this->db->escapeString($emunicipality),
                'eward' => $this->db->escapeString($eward),
                'eid_no' => $this->db->escapeString($eid_no),
                'efather' => $this->db->escapeString($efather),
                'emother' => $this->db->escapeString($emother),
                'eguardian' => $this->db->escapeString($eguardian),
                'edisability_type' => $this->db->escapeString($edisability_type),
                'ereg_date' => $this->db->escapeString($ereg_date),
                'father1' => $this->db->escapeString($father1),
                
                'chief_officer' => $this->db->escapeString($chief_officer),
                'echiefofficer' => $this->db->escapeString($echiefofficer),
                'chief_officer_job' => $this->db->escapeString($chief_officer_job),
                'echiefofficerjob' => $this->db->escapeString($echiefofficerjob),
                'applicant_name' => $this->db->escapeString($applicant_name),
                'applicant_phone' => $this->db->escapeString($applicant_phone),
                'applicant_address' => $this->db->escapeString($applicant_address),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : "",
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : "",
                "cert_no" => $serialNoFormatted,
                "user_id" => $this->db->escapeString($userId),
            ];

            // Save record to the database using prepared statements
            $builder = $this->db->table('apanga');
            $builder->insert($dataToSave);
       
             // Set flash message for failure
             $this->session->setFlashdata('main_success', "Record Saved Successfully.");
        
            // Redirect to the yearlist page
            return redirect()->to('/apanga-list');
}

    
    public function edit($id)
    {
        $this->permissionCheck('apanga_edit');
        $model =new YearModel();
        $data['years'] = $model->findAll();
        // Fetch the existing record from the database
        $existingRecord = $this->model->find($id);
        $data['old_year'] = $existingRecord['fiscal_year'];

        $model = new ApangaModel();
        // Find the year by ID
        $data['apanga'] = $model->find($id);
        $data['title'] = 'अपाङ्गता विवरण अद्यावधिक';

        $model =new YearModel();
        $data['years'] = $model->findAll();

        
        $model = new ProvinceModel();
        // Retrieve all provinces from the province table
        $data['province'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $province = $existingRecord['province'];
        $selectedProvince = $model->find($province);
        $data['old_province'] = $selectedProvince['province'];

        
        $model =new DistrictModel();
        $data['district'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $district = $existingRecord['district'];
        $selectedDistrict = $model->find($district);
        $data['old_district'] = $selectedDistrict['district'];

        $model =new MunicipalityModel();
        $data['municipality'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $municipality = $existingRecord['municipality'];
        $selectedMunicipality = $model->find($municipality);
        $data['old_municipality'] = $selectedMunicipality['municipality'];

        $model =new WardModel();
        $data['ward'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $data['old_ward'] = $existingRecord['ward'];

        

          // Load the edit view with the business data
        return view('business/apanga/edit', $data);

        
    }

    
    public function update($id)
{
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];
    $this->permissionCheck('apanga_edit');
    // Ensure the uploads directory exists
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }
    $model = new YearModel();
    $data['years'] = $model->findAll();
    // Fetch the existing record from the database
    $existingRecord = $this->model->find($id);
    $data['old_year'] = $existingRecord['fiscal_year'];

    // Get form data
    $name = $this->request->getPost('name');
    $fiscal_year = $this->request->getPost('fiscal_year');
    $birth_date = $this->request->getPost('birth_date');
    $age = $this->request->getPost('age');
    $gender = $this->request->getPost('gender');
    $province = $this->request->getPost('province');
    $district = $this->request->getPost('district');
    $municipality = $this->request->getPost('municipality');
    $ward = $this->request->getPost('ward');
    $tole = $this->request->getPost('tole');
    $mobile = $this->request->getPost('mobile');
    $email = $this->request->getPost('email');
    $id_no = $this->request->getPost('id_no');
    $father = $this->request->getPost('father');
    $mother = $this->request->getPost('mother');
    $guardian = $this->request->getPost('guardian');
    $guardian_relation = $this->request->getPost('guardian_relation');
    $guardian_contact = $this->request->getPost('guardian_contact');
    $disability_type = $this->request->getPost('disability_type');
    $disability_description = $this->request->getPost('disability_description');
    $disability_reason = $this->request->getPost('disability_reason');
    $maritial_status = $this->request->getPost('maritial_status');
    $blood_group = $this->request->getPost('blood_group');
    $helper_tool = $this->request->getPost('helper_tool');
    $helper_tool_name = $this->request->getPost('helper_tool_name');
    $people_need = $this->request->getPost('people_need');
    $people_need_desc = $this->request->getPost('people_need_desc');
    $education = $this->request->getPost('education');
    $training = $this->request->getPost('training');
    $current_job = $this->request->getPost('current_job');
    $reg_date = $this->request->getPost('reg_date');
    $ename = $this->request->getPost('ename');
    $status = $this->request->getPost('status');
    $ebirth_date = $this->request->getPost('ebirth_date');
    $egender = $this->request->getPost('egender');
    $eprovince = $this->request->getPost('eprovince');
    $edistrict = $this->request->getPost('edistrict');
    $emunicipality = $this->request->getPost('emunicipality');
    $eward = $this->request->getPost('eward');
    $eid_no = $this->request->getPost('eid_no');
    $efather = $this->request->getPost('efather');
    $emother = $this->request->getPost('emother');
    $eguardian = $this->request->getPost('eguardian');
    $edisability_type = $this->request->getPost('edisability_type');
    $ereg_date = $this->request->getPost('ereg_date');
    $father1 = $this->request->getPost('father1');
    
    $chief_officer = $this->request->getPost('chief_officer');
    $echiefofficer = $this->request->getPost('echiefofficer');
    $chief_officer_job = $this->request->getPost('chief_officer_job');
    $echiefofficerjob = $this->request->getPost('echiefofficerjob');
    $applicant_name = $this->request->getPost('applicant_name');
    $applicant_phone = $this->request->getPost('applicant_phone');
    $applicant_address = $this->request->getPost('applicant_address');
    $file1 = $this->request->getFile('file1');
    $file2 = $this->request->getFile('file2');

    // Retrieve the existing file paths from the database
    $existingRecord = $this->model->find($id);
    $existingFilePath = $existingRecord['file_path'];
    $existingImagePath = $existingRecord['image_path'];

    helper(['form']);
    $validation = \Config\Services::validation();
    $validation->setRules([
        
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        'file2' => 'max_size[file2,5120]|ext_in[file2,jpg,jpeg,png]'
    ]);

    // validate
    if (! $this->validate([
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        'file2' => 'max_size[file2,5120]|ext_in[file2,jpg,jpeg,png]',
     
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Process the files (if any)
    $filePaths = [];
    foreach ([$file1, $file2] as $index => $file) {
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            if ($file->move("./uploads/", $newName)) {
                $filePaths[$index] = "uploads/" . $newName;
            }
        }
    }

            // Save record to the database
            $dataToUpdate = [
                'name' => $this->db->escapeString($name),
                'fiscal_year' => $this->db->escapeString($fiscal_year),
                'birth_date' => $this->db->escapeString($birth_date),
                'age' => $this->db->escapeString($age),
                'gender' => $this->db->escapeString($gender),
                'province' => $this->db->escapeString($province),
                'district' => $this->db->escapeString($district),
                'municipality' => $this->db->escapeString($municipality),
                'ward' => $this->db->escapeString($ward),
                'tole' => $this->db->escapeString($tole),
                'mobile' => $this->db->escapeString($mobile),
                'email' => $this->db->escapeString($email),
                'id_no' => $this->db->escapeString($id_no),
                'father' => $this->db->escapeString($father),
                'mother' => $this->db->escapeString($mother),
                'guardian' => $this->db->escapeString($guardian),
                'guardian_relation' => $this->db->escapeString($guardian_relation),
                'guardian_contact' => $this->db->escapeString($guardian_contact),
                'disability_type' => $this->db->escapeString($disability_type),
                'disability_description' => $this->db->escapeString($disability_description),
                'disability_reason' => $this->db->escapeString($disability_reason),
                'maritial_status' => $this->db->escapeString($maritial_status),
                'blood_group' => $this->db->escapeString($blood_group),
                'helper_tool' => $this->db->escapeString($helper_tool),
                'helper_tool_name' => $this->db->escapeString($helper_tool_name),
                'people_need' => $this->db->escapeString($people_need),
                'people_need_desc' => $this->db->escapeString($people_need_desc),
                'education' => $this->db->escapeString($education),
                'training' => $this->db->escapeString($training),
                'current_job' => $this->db->escapeString($current_job),
                'reg_date' => $this->db->escapeString($reg_date),
                'ename' => $this->db->escapeString($ename),
                'status' => $this->db->escapeString($status),
                'ebirth_date' => $this->db->escapeString($ebirth_date),
                'egender' => $this->db->escapeString($egender),
                'eprovince' => $this->db->escapeString($eprovince),
                'edistrict' => $this->db->escapeString($edistrict),
                'emunicipality' => $this->db->escapeString($emunicipality),
                'eward' => $this->db->escapeString($eward),
                'eid_no' => $this->db->escapeString($eid_no),
                'efather' => $this->db->escapeString($efather),
                'emother' => $this->db->escapeString($emother),
                'eguardian' => $this->db->escapeString($eguardian),
                'edisability_type' => $this->db->escapeString($edisability_type),
                'ereg_date' => $this->db->escapeString($ereg_date),
                'father1' => $this->db->escapeString($father1),
                
                'chief_officer' => $this->db->escapeString($chief_officer),
                'echiefofficer' => $this->db->escapeString($echiefofficer),
                'chief_officer_job' => $this->db->escapeString($chief_officer_job),
                'echiefofficerjob' => $this->db->escapeString($echiefofficerjob),
                'applicant_name' => $this->db->escapeString($applicant_name),
                'applicant_phone' => $this->db->escapeString($applicant_phone),
                'applicant_address' => $this->db->escapeString($applicant_address),
                "edited_by" => $this->db->escapeString($userId),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : $existingFilePath,
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : $existingImagePath
            ];

            // Update the record in the database using prepared statements
            $builder = $this->db->table('apanga');
            $builder->where('id', $id);
            $builder->update($dataToUpdate);
    
        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record updated successfully.");
        // Redirect to the apanga page
        return redirect()->to('/apanga-list');
}

    
    public function delete($id)
    {
        $this->permissionCheck('apanga_delete');
        $model = new ApangaModel();
        // Delete the year from the database
        $model->delete($id);
        // Set flash message for failure
        $this->session->setFlashdata('main_success', "Record deleted Successfully.");
        return redirect()->to('/apanga-list');
    }

    // Method to show details of a record
    public function print($id)
    {
        $this->permissionCheck('apanga_print');
        $apangaModel = new ApangaModel();
        $apangaDetail = $apangaModel->find($id);
        $municipalityModel = new MunicipalityModel();

    
        // Fetch municipality name
        $municipality = $municipalityModel->find($apangaDetail['municipality']);
        $apangaDetail['municipality'] = $municipality['municipality']; 
        $data['detail'] = $apangaDetail;

            return view('business/apanga/print', $data);
    }

public function apangaDetails($id)
{
    $this->permissionCheck('apanga_view');
    $apangaModel = new ApangaModel();
    $apangaDetail = $apangaModel->find($id);

    $provinceModel = new ProvinceModel();
    $districtModel = new DistrictModel();
    $municipalityModel = new MunicipalityModel();

    // Fetch province name
    $province = $provinceModel->find($apangaDetail['province']);
    $apangaDetail['province'] = $province['province']; 

    // Fetch district name
    $district = $districtModel->find($apangaDetail['district']);
    $apangaDetail['district'] = $district['district']; 

    // Fetch municipality name
    $municipality = $municipalityModel->find($apangaDetail['municipality']);
    $apangaDetail['municipality'] = $municipality['municipality']; 

    $data['detail'] = $apangaDetail;
    $data['title'] = "अपाङ्गता विवरण";

    return view('business/apanga/view', $data);
}


}
