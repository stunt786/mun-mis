<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\UploadedFile;
use App\Models\AgriModel;
use App\Models\YearModel;
use App\Models\ProvinceModel;
use App\Models\DistrictModel;
use App\Models\MunicipalityModel;
use App\Models\WardModel;
use App\Controllers\AdminBaseController;

class AgriController extends AdminBaseController
{
    protected $db;
    protected $model;
    protected $session;
    protected $request;

    public function __construct(){
        $this->db = db_connect();
        $this->model= new AgriModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
                
    }
    public function addAgri()
    {
        $this->permissionCheck('agri_add');
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'कृषि/पशु दर्ता फर्म';
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
       
        return view('business/agri/add', $data); 
    }
    
    public function agrilist()
    {
        $this->permissionCheck('agri_list');
        $model = new AgriModel();
        $data['agri'] = $model->orderBy('id', 'DESC')->findAll(); // Retrieve all users from the database
        $data['title'] = 'कृषि/पशु समूह';
        return view('business/agri/list', $data); // Load view with user data
    }
       
    public function agri()
{
    $this->permissionCheck('agri_add');
    // Check if the uploads directory exists, create it if not
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }
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
    
    // Get logged-in user ID
   $userId = $this->session->get('logged')['id'];

    // Retrieve form data
    // Retrieve data from HTTP POST request
    $orgname = $this->request->getPost('orgname');
    $fiscalyear = $this->request->getPost('fiscalyear');
    $orgestablishednepdate = $this->request->getPost('orgestablishednepdate');
    $orgprovinceid = $this->request->getPost('orgprovinceid');
    $orgdistrictid = $this->request->getPost('orgdistrictid');
    $orgmunicipalityid = $this->request->getPost('orgmunicipalityid');
    $orgwardid = $this->request->getPost('orgwardid');
    $orgroadname = $this->request->getPost('orgroadname');
    $orgphone = $this->request->getPost('orgphone');
    $orgemail = $this->request->getPost('orgemail');
    $orgpan = $this->request->getPost('orgpan');
    $orgtype = $this->request->getPost('orgtype');
    $orgtypedescription = $this->request->getPost('orgtypedescription');
    $orgmembers = $this->request->getPost('orgmembers');
    $branchofficer = $this->request->getPost('branchofficer');
    $branchofficerjob = $this->request->getPost('branchofficerjob');
    $chiefofficer = $this->request->getPost('chiefofficer');
    $chiefofficerjob = $this->request->getPost('chiefofficerjob');
    $applicantname = $this->request->getPost('applicantname');
    $applicantphone = $this->request->getPost('applicantphone');
    $applicantaddress = $this->request->getPost('applicantaddress');
    $orgregdate = $this->request->getPost('orgregdate');
    $orgstatus = $this->request->getPost('orgstatus');
    $renewdate = $this->request->getPost('renewdate');
    $expirydate = $this->request->getPost('expirydate');
    $expirystatus = $this->request->getPost('expirystatus');
        
    $file1 = $this->request->getFile('file1');
    $file2 = $this->request->getFile('file2');

    // Retrieve the last serial number from the database
    $lastSerial = $this->model->selectMax('certno')->get()->getRowArray();
    $serialNo = intval($lastSerial['certno']) + 1; // Convert to integer before addition

    // Format the serial number with leading zeros
    $serialNoFormatted = sprintf("%01d", $serialNo);
    
   

    // Initialize an array to hold file paths
    $filePaths = [];

    // Process the files (if any)
    foreach ([$file1, $file2] as $index => $file) {
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            if ($file->move("uploads/", $newName)) {
                $filePaths[$index] = "uploads/" . $newName; 
            }
        }
    }   
            // Save record to the database
            $dataToSave = [
                'orgname' => $this->db->escapeString($orgname),
                'fiscalyear' => $this->db->escapeString($fiscalyear),
                'orgestablishednepdate' => $this->db->escapeString($orgestablishednepdate),
                'orgprovinceid' => $this->db->escapeString($orgprovinceid),
                'orgdistrictid' => $this->db->escapeString($orgdistrictid),
                'orgmunicipalityid' => $this->db->escapeString($orgmunicipalityid),
                'orgwardid' => $this->db->escapeString($orgwardid),
                'orgroadname' => $this->db->escapeString($orgroadname),
                'orgphone' => $this->db->escapeString($orgphone),
                'orgemail' => $this->db->escapeString($orgemail),
                'orgpan' => $this->db->escapeString($orgpan),
                'orgtype' => $this->db->escapeString($orgtype),
                'orgtypedescription' => $this->db->escapeString($orgtypedescription),
                'orgmembers' => $this->db->escapeString($orgmembers),
                'branchofficer' => $this->db->escapeString($branchofficer),
                'branchofficerjob' => $this->db->escapeString($branchofficerjob),
                'chiefofficer' => $this->db->escapeString($chiefofficer),
                'chiefofficerjob' => $this->db->escapeString($chiefofficerjob),
                'applicantname' => $this->db->escapeString($applicantname),
                'applicantphone' => $this->db->escapeString($applicantphone),
                'applicantaddress' => $this->db->escapeString($applicantaddress),
                'orgregdate' => $this->db->escapeString($orgregdate),
                'orgstatus' => $this->db->escapeString($orgstatus),
                'renewdate' => $this->db->escapeString($renewdate),
                'expirydate' => $this->db->escapeString($expirydate),
                'expirystatus' => $this->db->escapeString($expirystatus),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : "",
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : "",
                "certno" => $serialNoFormatted,
                "user_id" => $this->db->escapeString($userId),
            ];

            // Save record to the database using prepared statements
            $builder = $this->db->table('agri');
            $builder->insert($dataToSave);
       
            // Set flash message for failure
            $this->session->setFlashdata('main_success', "Record Saved Successfully.");
        
            // Redirect to the yearlist page
            return redirect()->to('/agri-list');
}

    
    public function edit($id)
    {
        $this->permissionCheck('agri_edit');
        $model =new YearModel();
        $data['years'] = $model->findAll();
        // Fetch the existing record from the database
        $existingRecord = $this->model->find($id);
        $data['old_year'] = $existingRecord['fiscalyear'];

        $model = new AgriModel();
        // Find the year by ID
        $data['agri'] = $model->find($id);
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'समुह अद्यावधिक';
        $model =new YearModel();
        $data['years'] = $model->findAll();

        $model = new ProvinceModel();

        // Retrieve all provinces from the province table
        $data['province'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $orgprovinceid = $existingRecord['orgprovinceid'];
        $selectedProvince = $model->find($orgprovinceid);
        $data['old_province'] = $selectedProvince['province'];
        
        $model =new DistrictModel();
        $data['district'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $orgdistrictid = $existingRecord['orgdistrictid'];
        $selectedDistrict = $model->find($orgdistrictid);
        $data['old_district'] = $selectedDistrict['district'];

        $model =new MunicipalityModel();
        $data['municipality'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $orgmunicipalityid = $existingRecord['orgmunicipalityid'];
        $selectedMunicipality = $model->find($orgmunicipalityid);
        $data['old_municipality'] = $selectedMunicipality['municipality'];

        $model =new WardModel();
        $data['ward'] = $model->findAll();
        $existingRecord = $this->model->find($id);
        $data['old_ward'] = $existingRecord['orgwardid'];

        
          // Load the edit view with the business data
        return view('business/agri/edit', $data);

        
    }

    
    public function update($id)
{
    $this->permissionCheck('agri_edit');
    // Ensure the uploads directory exists
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }
    $model =new YearModel();
    $data['years'] = $model->findAll();
    // Get form data
    $orgname = $this->request->getPost('orgname');
    $fiscalyear = $this->request->getPost('fiscalyear');
    $orgestablishednepdate = $this->request->getPost('orgestablishednepdate');
    $orgprovinceid = $this->request->getPost('orgprovinceid');
    $orgdistrictid = $this->request->getPost('orgdistrictid');
    $orgmunicipalityid = $this->request->getPost('orgmunicipalityid');
    $orgwardid = $this->request->getPost('orgwardid');
    $orgroadname = $this->request->getPost('orgroadname');
    
    $orgphone = $this->request->getPost('orgphone');
    $orgemail = $this->request->getPost('orgemail');
    $orgpan = $this->request->getPost('orgpan');
    $orgtype = $this->request->getPost('orgtype');
    $orgtypedescription = $this->request->getPost('orgtypedescription');
    $orgmembers = $this->request->getPost('orgmembers');
    
    $branchofficer = $this->request->getPost('branchofficer');
    $branchofficerjob = $this->request->getPost('branchofficerjob');
    $chiefofficer = $this->request->getPost('chiefofficer');
    $chiefofficerjob = $this->request->getPost('chiefofficerjob');
    $applicantname = $this->request->getPost('applicantname');
    $applicantphone = $this->request->getPost('applicantphone');
    $applicantaddress = $this->request->getPost('applicantaddress');
    $orgregdate = $this->request->getPost('orgregdate');
    $orgstatus = $this->request->getPost('orgstatus');
    $renewdate = $this->request->getPost('renewdate');
    $expirydate = $this->request->getPost('expirydate');
    $expirystatus = $this->request->getPost('expirystatus');
    $file1 = $this->request->getFile('file1');
    $file2 = $this->request->getFile('file2');

    // Retrieve the existing file paths from the database
    $existingRecord = $this->model->find($id);
    $existingFilePath = $existingRecord['file_path'];
    $existingImagePath = $existingRecord['image_path'];

    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];

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
                'orgname' => $this->db->escapeString($orgname),
                'fiscalyear' => $this->db->escapeString($fiscalyear),
                'orgestablishednepdate' => $this->db->escapeString($orgestablishednepdate),
                'orgprovinceid' => $this->db->escapeString($orgprovinceid),
                'orgdistrictid' => $this->db->escapeString($orgdistrictid),
                'orgmunicipalityid' => $this->db->escapeString($orgmunicipalityid),
                'orgwardid' => $this->db->escapeString($orgwardid),
                'orgroadname' => $this->db->escapeString($orgroadname),
                
                'orgphone' => $this->db->escapeString($orgphone),
                'orgemail' => $this->db->escapeString($orgemail),
                'orgpan' => $this->db->escapeString($orgpan),
                'orgtype' => $this->db->escapeString($orgtype),
                'orgtypedescription' => $this->db->escapeString($orgtypedescription),
                'orgmembers' => $this->db->escapeString($orgmembers),
                
                'branchofficer' => $this->db->escapeString($branchofficer),
                'branchofficerjob' => $this->db->escapeString($branchofficerjob),
                'chiefofficer' => $this->db->escapeString($chiefofficer),
                'chiefofficerjob' => $this->db->escapeString($chiefofficerjob),
                'applicantname' => $this->db->escapeString($applicantname),
                'applicantphone' => $this->db->escapeString($applicantphone),
                'applicantaddress' => $this->db->escapeString($applicantaddress),
                'orgregdate' => $this->db->escapeString($orgregdate),
                'orgstatus' => $this->db->escapeString($orgstatus),
                'renewdate' => $this->db->escapeString($renewdate),
                'expirydate' => $this->db->escapeString($expirydate),
                'expirystatus' => $this->db->escapeString($expirystatus),
                'edited_by'=> $this->db->escapeString($userId),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : $existingFilePath,
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : $existingImagePath
            ];

            // Update the record in the database using prepared statements
            $builder = $this->db->table('agri');
            $builder->where('id', $id);
            $builder->update($dataToUpdate);
    
        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record updated successfully.");
        // Redirect to the yearlist page
        return redirect()->to('/agri-list');
}

    
    public function delete($id)
    {
        $this->permissionCheck('agri_delete');
        $model = new AgriModel();
        // Delete the year from the database
        $model->delete($id);
        // Set flash message for failure
        $this->session->setFlashdata('main_success', "Record deleted Successfully.");
        return redirect()->to('/agri-list');
    }

    // Method to show details of a record
    public function print($id)
    {
        $this->permissionCheck('agri_print');
        $agriModel = new AgriModel();
        $agriDetail = $agriModel->find($id);
        $municipalityModel = new MunicipalityModel();

    
        // Fetch municipality name
        $municipality = $municipalityModel->find($agriDetail['orgmunicipalityid']);
        $agriDetail['municipality'] = $municipality['municipality']; 
        $data['detail'] = $agriDetail;

        return view('business/agri/print', $data);
    }
    public function agriDetails($id)
{
    $this->permissionCheck('agri_view');
    $agriModel = new AgriModel();
    $agriDetail = $agriModel->find($id);
    
    $provinceModel = new ProvinceModel();
    $districtModel = new DistrictModel();
    $municipalityModel = new MunicipalityModel();

    // Fetch province name
    $province = $provinceModel->find($agriDetail['orgprovinceid']);
    $agriDetail['province'] = $province['province']; 

    // Fetch district name
    $district = $districtModel->find($agriDetail['orgdistrictid']);
    $agriDetail['district'] = $district['district']; 

    // Fetch municipality name
    $municipality = $municipalityModel->find($agriDetail['orgmunicipalityid']);
    $agriDetail['municipality'] = $municipality['municipality']; 

    $data['detail'] = $agriDetail;
    $data['title'] = "समुह विवरण"; 

    return view('business/agri/view', $data);
}
    
 
}
