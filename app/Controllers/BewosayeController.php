<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\UploadedFile;
use App\Controllers\AdminBaseController;
use App\Models\BewosayeModel;
use App\Models\YearModel;
use App\Models\ProvinceModel;
use App\Models\DistrictModel;
use App\Models\MunicipalityModel;
use App\Models\WardModel;
use App\Models\BuscatModel;



class BewosayeController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;
        
    public function __construct(){
        $this->db = db_connect();
        $this->model= new BewosayeModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
        
    }
    public function addBewosaye()
    {
        $this->permissionCheck('bewosaye_add');
        
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'व्यवशाय दर्ता फारम';

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

        $model =new BuscatModel();
        $data['buscategory'] = $model->findAll();

        return view('business/bewosaye/add', $data); 
    }

    public function bewosayelist()
    {
        $this->permissionCheck('bewosaye_list');
        $model = new BewosayeModel();
        $data['title'] = 'व्यवशाय सूची';
        $data['business'] = $model->orderBy('id', 'DESC')->findAll(); // Retrieve all users from the database
        return view('business/bewosaye/list', $data); // Load view with user data
    }
       
    public function bewosaye()
{
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];
    $this->permissionCheck('bewosaye_add');
    // Check if the uploads directory exists, create it if not
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }

    // Retrieve form data
    // Retrieve data from HTTP POST request
    $org_name = $this->request->getPost('org_name');
    $fiscal_year = $this->request->getPost('fiscal_year');
    $org_established_nep_date = $this->request->getPost('org_established_nep_date');
    $org_province_id = $this->request->getPost('org_province_id');
    $org_district_id = $this->request->getPost('org_district_id');
    $org_municipality_id = $this->request->getPost('org_municipality_id');
    $org_ward_id = $this->request->getPost('org_ward_id');
    $org_road_name = $this->request->getPost('org_road_name');
    $org_house_no = $this->request->getPost('org_house_no');
    $org_phone = $this->request->getPost('org_phone');
    $org_email = $this->request->getPost('org_email');
    $org_pan = $this->request->getPost('org_pan');
    $org_type = $this->request->getPost('org_type');
    $org_type_description = $this->request->getPost('org_type_description');
    $org_total_capital = $this->request->getPost('org_total_capital');
    $org_ownership = $this->request->getPost('org_ownership');
    $org_land_kitta_no = $this->request->getPost('org_land_kitta_no');
    $prop_name = $this->request->getPost('prop_name');
    $boardsize = $this->request->getPost('boardsize');
    $prop_phone = $this->request->getPost('prop_phone');
    $prop_road_name = $this->request->getPost('prop_road_name');
    $prop_ctzn_no = $this->request->getPost('prop_ctzn_no');
    $prop_ctzn_district = $this->request->getPost('prop_ctzn_district');
    $prop_ctzn_date = $this->request->getPost('prop_ctzn_date');
    $org_house_owner = $this->request->getPost('org_house_owner');
    $org_house_owner_address = $this->request->getPost('org_house_owner_address');
    $org_house_owner_phone = $this->request->getPost('org_house_owner_phone');
    $org_house_rent = $this->request->getPost('org_house_rent');
    $applicant_name = $this->request->getPost('applicant_name');
    $applicant_phone = $this->request->getPost('applicant_phone');
    $applicant_address = $this->request->getPost('applicant_address');
    $chief_officer = $this->request->getPost('chief_officer');
    $org_reg_date = $this->request->getPost('org_reg_date');
    $status = $this->request->getPost('status');
    $renew_date = $this->request->getPost('renew_date');
    $expiry_date = $this->request->getPost('expiry_date');
    $expiry_status = $this->request->getPost('expiry_status');
        
    $file1 = $this->request->getFile('file1');
    $file2 = $this->request->getFile('file2');

    // Retrieve the last serial number from the database
    $lastSerial = $this->model->selectMax('cert_no')->get()->getRowArray();
    $serialNo = intval($lastSerial['cert_no']) + 1; // Convert to integer before addition

    // Format the serial number with leading zeros
    $serialNoFormatted = sprintf("%01d", $serialNo);

    helper(['form']);
    $validation = \Config\Services::validation();
    $validation->setRules([
        
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        'file2' => 'max_size[file2,5120]|ext_in[file2,jpg,jpeg,png,pdf]'
    ]);

    // validate
    if (! $this->validate([
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        'file2' => 'max_size[file2,5120]|ext_in[file2,jpg,jpeg,png,pdf]',
     
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
                'org_name' => $this->db->escapeString($org_name),
                'fiscal_year' => $this->db->escapeString($fiscal_year),
                'org_established_nep_date' => $this->db->escapeString($org_established_nep_date),
                'org_province_id' => $this->db->escapeString($org_province_id),
                'org_district_id' => $this->db->escapeString($org_district_id),
                'org_municipality_id' => $this->db->escapeString($org_municipality_id),
                'org_ward_id' => $this->db->escapeString($org_ward_id),
                'org_road_name' => $this->db->escapeString($org_road_name),
                'org_house_no' => $this->db->escapeString($org_house_no),
                'org_phone' => $this->db->escapeString($org_phone),
                'org_email' => $this->db->escapeString($org_email),
                'org_pan' => $this->db->escapeString($org_pan),
                'org_type' => $this->db->escapeString($org_type),
                'org_type_description' => $this->db->escapeString($org_type_description),
                'org_total_capital' => $this->db->escapeString($org_total_capital),
                'org_ownership' => $this->db->escapeString($org_ownership),
                'org_land_kitta_no' => $this->db->escapeString($org_land_kitta_no),
                'prop_name' => $this->db->escapeString($prop_name),
                'boardsize' => $this->db->escapeString($boardsize),
                'prop_phone' => $this->db->escapeString($prop_phone),
                'prop_road_name' => $this->db->escapeString($prop_road_name),
                'prop_ctzn_no' => $this->db->escapeString($prop_ctzn_no),
                'prop_ctzn_district' => $this->db->escapeString($prop_ctzn_district),
                'prop_ctzn_date' => $this->db->escapeString($prop_ctzn_date),
                'org_house_owner' => $this->db->escapeString($org_house_owner),
                'org_house_owner_address' => $this->db->escapeString($org_house_owner_address),
                'org_house_owner_phone' => $this->db->escapeString($org_house_owner_phone),
                'org_house_rent' => $this->db->escapeString($org_house_rent),
                'applicant_name' => $this->db->escapeString($applicant_name),
                'applicant_phone' => $this->db->escapeString($applicant_phone),
                'applicant_address' => $this->db->escapeString($applicant_address),
                'chief_officer' => $this->db->escapeString($chief_officer),
                'org_reg_date' => $this->db->escapeString($org_reg_date),
                'status' => $this->db->escapeString($status),
                'renew_date' => $this->db->escapeString($renew_date),
                'expiry_date' => $this->db->escapeString($expiry_date),
                'expiry_status' => $this->db->escapeString($expiry_status),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : "",
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : "",
                "cert_no" => $serialNoFormatted,
                "user_id" => $this->db->escapeString($userId),
            ];

            // Save record to the database using prepared statements
            $builder = $this->db->table('business');
            $builder->insert($dataToSave);
       
             // Set flash message for failure
             $this->session->setFlashdata('main_success', "Record Saved Successfully.");
        
            // Redirect to the yearlist page
            return redirect()->to('/bewosaye-list');
}

    
    public function edit($id)
    {
        $this->permissionCheck('bewosaye_edit');
        $model =new YearModel();
        $data['years'] = $model->findAll();
        // Fetch the existing record from the database
        $existingRecord = $this->model->find($id);
        $data['old_year'] = $existingRecord['fiscal_year'];

        $model = new BewosayeModel();
        // Find the year by ID
        $data['business'] = $model->find($id);
        $data['title'] = 'व्यवशाय अद्यावधिक';

        $model =new YearModel();
        $data['years'] = $model->findAll();

        
        $model = new ProvinceModel();
        // Retrieve all provinces from the province table
        $data['province'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $org_province_id = $existingRecord['org_province_id'];
        $selectedProvince = $model->find($org_province_id);
        $data['old_province'] = $selectedProvince['province'];

        
        $model =new DistrictModel();
        $data['district'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $org_district_id = $existingRecord['org_district_id'];
        $selectedDistrict = $model->find($org_district_id);
        $data['old_district'] = $selectedDistrict['district'];

        $model =new MunicipalityModel();
        $data['municipality'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $org_municipality_id = $existingRecord['org_municipality_id'];
        $selectedMunicipality = $model->find($org_municipality_id);
        $data['old_municipality'] = $selectedMunicipality['municipality'];

        $model =new WardModel();
        $data['ward'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $data['old_ward'] = $existingRecord['org_ward_id'];

        $model =new BuscatModel();
        $data['buscategory'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $data['old_category'] = $existingRecord['org_type'];

          // Load the edit view with the business data
        return view('business/bewosaye/edit', $data);

        
    }

    
    public function update($id)
{
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];
    $this->permissionCheck('bewosaye_edit');
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
    $org_name = $this->request->getPost('org_name');
    $fiscal_year = $this->request->getPost('fiscal_year');
    $org_established_nep_date = $this->request->getPost('org_established_nep_date');
    $org_province_id = $this->request->getPost('org_province_id');
    $org_district_id = $this->request->getPost('org_district_id');
    $org_municipality_id = $this->request->getPost('org_municipality_id');
    $org_ward_id = $this->request->getPost('org_ward_id');
    $org_road_name = $this->request->getPost('org_road_name');
    $org_house_no = $this->request->getPost('org_house_no');
    $org_phone = $this->request->getPost('org_phone');
    $org_email = $this->request->getPost('org_email');
    $org_pan = $this->request->getPost('org_pan');
    $org_type = $this->request->getPost('org_type');
    $org_type_description = $this->request->getPost('org_type_description');
    $org_total_capital = $this->request->getPost('org_total_capital');
    $org_ownership = $this->request->getPost('org_ownership');
    $org_land_kitta_no = $this->request->getPost('org_land_kitta_no');
    $prop_name = $this->request->getPost('prop_name');
    $boardsize = $this->request->getPost('boardsize');
    $prop_phone = $this->request->getPost('prop_phone');
    $prop_road_name = $this->request->getPost('prop_road_name');
    $prop_ctzn_no = $this->request->getPost('prop_ctzn_no');
    $prop_ctzn_district = $this->request->getPost('prop_ctzn_district');
    $prop_ctzn_date = $this->request->getPost('prop_ctzn_date');
    $org_house_owner = $this->request->getPost('org_house_owner');
    $org_house_owner_address = $this->request->getPost('org_house_owner_address');
    $org_house_owner_phone = $this->request->getPost('org_house_owner_phone');
    $org_house_rent = $this->request->getPost('org_house_rent');
    $applicant_name = $this->request->getPost('applicant_name');
    $applicant_phone = $this->request->getPost('applicant_phone');
    $applicant_address = $this->request->getPost('applicant_address');
    $chief_officer = $this->request->getPost('chief_officer');
    $org_reg_date = $this->request->getPost('org_reg_date');
    $status = $this->request->getPost('status');
    $renew_date = $this->request->getPost('renew_date');
    $expiry_date = $this->request->getPost('expiry_date');
    $expiry_status = $this->request->getPost('expiry_status');
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
        'file2' => 'max_size[file2,5120]|ext_in[file2,jpg,jpeg,png,pdf]'
    ]);

    // validate
    if (! $this->validate([
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        'file2' => 'max_size[file2,5120]|ext_in[file2,jpg,jpeg,png,pdf]',
     
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
                'org_name' => $this->db->escapeString($org_name),
                'fiscal_year' => $this->db->escapeString($fiscal_year),
                'org_established_nep_date' => $this->db->escapeString($org_established_nep_date),
                'org_province_id' => $this->db->escapeString($org_province_id),
                'org_district_id' => $this->db->escapeString($org_district_id),
                'org_municipality_id' => $this->db->escapeString($org_municipality_id),
                'org_ward_id' => $this->db->escapeString($org_ward_id),
                'org_road_name' => $this->db->escapeString($org_road_name),
                'org_house_no' => $this->db->escapeString($org_house_no),
                'org_phone' => $this->db->escapeString($org_phone),
                'org_email' => $this->db->escapeString($org_email),
                'org_pan' => $this->db->escapeString($org_pan),
                'org_type' => $this->db->escapeString($org_type),
                'org_type_description' => $this->db->escapeString($org_type_description),
                'org_total_capital' => $this->db->escapeString($org_total_capital),
                'org_ownership' => $this->db->escapeString($org_ownership),
                'org_land_kitta_no' => $this->db->escapeString($org_land_kitta_no),
                'prop_name' => $this->db->escapeString($prop_name),
                'boardsize' => $this->db->escapeString($boardsize),
                'prop_phone' => $this->db->escapeString($prop_phone),
                'prop_road_name' => $this->db->escapeString($prop_road_name),
                'prop_ctzn_no' => $this->db->escapeString($prop_ctzn_no),
                'prop_ctzn_district' => $this->db->escapeString($prop_ctzn_district),
                'prop_ctzn_date' => $this->db->escapeString($prop_ctzn_date),
                'org_house_owner' => $this->db->escapeString($org_house_owner),
                'org_house_owner_address' => $this->db->escapeString($org_house_owner_address),
                'org_house_owner_phone' => $this->db->escapeString($org_house_owner_phone),
                'org_house_rent' => $this->db->escapeString($org_house_rent),
                'applicant_name' => $this->db->escapeString($applicant_name),
                'applicant_phone' => $this->db->escapeString($applicant_phone),
                'applicant_address' => $this->db->escapeString($applicant_address),
                'chief_officer' => $this->db->escapeString($chief_officer),
                'org_reg_date' => $this->db->escapeString($org_reg_date),
                'status' => $this->db->escapeString($status),
                'renew_date' => $this->db->escapeString($renew_date),
                'expiry_date' => $this->db->escapeString($expiry_date),
                'expiry_status' => $this->db->escapeString($expiry_status),
                "edited_by" => $this->db->escapeString($userId),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : $existingFilePath,
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : $existingImagePath
            ];

            // Update the record in the database using prepared statements
            $builder = $this->db->table('business');
            $builder->where('id', $id);
            $builder->update($dataToUpdate);
    
        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record updated successfully.");
        // Redirect to the yearlist page
        return redirect()->to('/bewosaye-list');
}

    
    public function delete($id)
    {
        $this->permissionCheck('bewosaye_delete');
        $model = new BewosayeModel();
        // Delete the year from the database
        $model->delete($id);
        // Set flash message for failure
        $this->session->setFlashdata('main_success', "Record deleted Successfully.");
        return redirect()->to('/bewosaye-list');
    }

    // Method to show details of a record
    public function print($id)
    {
        $this->permissionCheck('bewosaye_print');
        $bewosayeModel = new BewosayeModel();
        $bewosayeDetail = $bewosayeModel->find($id);
        $municipalityModel = new MunicipalityModel();

    
        // Fetch municipality name
        $municipality = $municipalityModel->find($bewosayeDetail['org_municipality_id']);
        $bewosayeDetail['municipality'] = $municipality['municipality']; 
        $data['detail'] = $bewosayeDetail;

            return view('business/bewosaye/print', $data);
    }

public function bewosayeDetails($id)
{
    $this->permissionCheck('bewosaye_view');
    $bewosayeModel = new BewosayeModel();
    $bewosayeDetail = $bewosayeModel->find($id);

    $provinceModel = new ProvinceModel();
    $districtModel = new DistrictModel();
    $municipalityModel = new MunicipalityModel();

    // Fetch province name
    $province = $provinceModel->find($bewosayeDetail['org_province_id']);
    $bewosayeDetail['province'] = $province['province']; 

    // Fetch district name
    $district = $districtModel->find($bewosayeDetail['org_district_id']);
    $bewosayeDetail['district'] = $district['district']; 

    // Fetch municipality name
    $municipality = $municipalityModel->find($bewosayeDetail['org_municipality_id']);
    $bewosayeDetail['municipality'] = $municipality['municipality']; 

    $data['detail'] = $bewosayeDetail;
    $data['title'] = "व्यवशाय विवरण";

    return view('business/bewosaye/view', $data);
}


}
