<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\UploadedFile;
use App\Controllers\AdminBaseController;
use App\Models\ClubModel;
use App\Models\YearModel;
use App\Models\ProvinceModel;
use App\Models\DistrictModel;
use App\Models\MunicipalityModel;
use App\Models\WardModel;

class ClubController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;
        
    public function __construct(){
        $this->db = db_connect();
        $this->model= new ClubModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
    }
    public function addClub()
    {
        $this->permissionCheck('club_add');
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'क्लब दर्ता';
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

        
        return view('business/clubs/add', $data); 
    }
    public function clublist()
    {
        $this->permissionCheck('club_list');
        $model = new ClubModel();
        $data['title'] = 'क्लब सूची';
        $data['clubs'] = $model->orderBy('id', 'DESC')->findAll(); // Retrieve all users from the database
        return view('business/clubs/list', $data); // Load view with user data
    }
       
    public function club()
{
    $this->permissionCheck('club_add');
    // Check if the uploads directory exists, create it if not
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];
    // Retrieve form data
    // Retrieve data from HTTP POST request
    $orgname = $this->request->getPost('orgname');
    $fiscalyear = $this->request->getPost('fiscalyear');
    $estddate = $this->request->getPost('estddate');
    $province = $this->request->getPost('province');
    $district = $this->request->getPost('district');
    $municipality = $this->request->getPost('municipality');
    $ward = $this->request->getPost('ward');
    $road = $this->request->getPost('road');
    
    $phone = $this->request->getPost('phone');
    $email = $this->request->getPost('email');
    $pan = $this->request->getPost('pan');
    $type = $this->request->getPost('type');
    $description = $this->request->getPost('description');
    $members = $this->request->getPost('members');
    
    
    $chiefofficer = $this->request->getPost('chiefofficer');
    $chiefofficerjob = $this->request->getPost('chiefofficerjob');
    $applicantname = $this->request->getPost('applicantname');
    $applicantphone = $this->request->getPost('applicantphone');
    $applicantaddr = $this->request->getPost('applicantaddr');
    $regdate = $this->request->getPost('regdate');
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
    $serialNoFormatted = sprintf("%03d", $serialNo);

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
                'orgname' => $this->db->escapeString($orgname),
                'fiscalyear' => $this->db->escapeString($fiscalyear),
                'estddate' => $this->db->escapeString($estddate),
                'province' => $this->db->escapeString($province),
                'district' => $this->db->escapeString($district),
                'municipality' => $this->db->escapeString($municipality),
                'ward' => $this->db->escapeString($ward),
                'road' => $this->db->escapeString($road),
                
                'phone' => $this->db->escapeString($phone),
                'email' => $this->db->escapeString($email),
                'pan' => $this->db->escapeString($pan),
                'type' => $this->db->escapeString($type),
                'description' => $this->db->escapeString($description),
                'members' => $this->db->escapeString($members),
                
                'chiefofficer' => $this->db->escapeString($chiefofficer),
                'chiefofficerjob' => $this->db->escapeString($chiefofficerjob),
                'applicantname' => $this->db->escapeString($applicantname),
                'applicantphone' => $this->db->escapeString($applicantphone),
                'applicantaddr' => $this->db->escapeString($applicantaddr),
                'regdate' => $this->db->escapeString($regdate),
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
            $builder = $this->db->table('clubs');
            $builder->insert($dataToSave);
       
             // Set flash message for failure
             $this->session->setFlashdata('main_success', "Record Saved Successfully.");
        
            // Redirect to the yearlist page
            return redirect()->to('/club-list');
}

    
    public function edit($id)
    {
        $this->permissionCheck('club_edit');
        $model =new YearModel();
        $data['years'] = $model->findAll();
        // Fetch the existing record from the database
        $existingRecord = $this->model->find($id);
        $data['old_year'] = $existingRecord['fiscalyear'];

        $model = new ClubModel();
        // Find the year by ID
        $data['clubs'] = $model->find($id);
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'क्लब अद्यावधिक';
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
        return view('business/clubs/edit', $data);

        
    }

    
    public function update($id)
{
    $this->permissionCheck('club_edit');
    // Ensure the uploads directory exists
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];
    $model =new YearModel();
    $data['years'] = $model->findAll();
    // Get form data
    $orgname = $this->request->getPost('orgname');
    $fiscalyear = $this->request->getPost('fiscalyear');
    $estddate = $this->request->getPost('estddate');
    $province = $this->request->getPost('province');
    $district = $this->request->getPost('district');
    $municipality = $this->request->getPost('municipality');
    $ward = $this->request->getPost('ward');
    $road = $this->request->getPost('road');
    
    $phone = $this->request->getPost('phone');
    $email = $this->request->getPost('email');
    $pan = $this->request->getPost('pan');
    $type = $this->request->getPost('type');
    $description = $this->request->getPost('description');
    $members = $this->request->getPost('members');
    
    
    $chiefofficer = $this->request->getPost('chiefofficer');
    $chiefofficerjob = $this->request->getPost('chiefofficerjob');
    $applicantname = $this->request->getPost('applicantname');
    $applicantphone = $this->request->getPost('applicantphone');
    $applicantaddr = $this->request->getPost('applicantaddr');
    $regdate = $this->request->getPost('regdate');
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
                'estddate' => $this->db->escapeString($estddate),
                'province' => $this->db->escapeString($province),
                'district' => $this->db->escapeString($district),
                'municipality' => $this->db->escapeString($municipality),
                'ward' => $this->db->escapeString($ward),
                'road' => $this->db->escapeString($road),
                
                'phone' => $this->db->escapeString($phone),
                'email' => $this->db->escapeString($email),
                'pan' => $this->db->escapeString($pan),
                'type' => $this->db->escapeString($type),
                'description' => $this->db->escapeString($description),
                'members' => $this->db->escapeString($members),
                
                'chiefofficer' => $this->db->escapeString($chiefofficer),
                'chiefofficerjob' => $this->db->escapeString($chiefofficerjob),
                'applicantname' => $this->db->escapeString($applicantname),
                'applicantphone' => $this->db->escapeString($applicantphone),
                'applicantaddr' => $this->db->escapeString($applicantaddr),
                'regdate' => $this->db->escapeString($regdate),
                'orgstatus' => $this->db->escapeString($orgstatus),
                'renewdate' => $this->db->escapeString($renewdate),
                'expirydate' => $this->db->escapeString($expirydate),
                'expirystatus' => $this->db->escapeString($expirystatus),
                "edited_by" => $this->db->escapeString($userId),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : $existingFilePath,
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : $existingImagePath
            ];

            // Update the record in the database using prepared statements
            $builder = $this->db->table('clubs');
            $builder->where('id', $id);
            $builder->update($dataToUpdate);
    
        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record updated successfully.");
        // Redirect to the yearlist page
        return redirect()->to('/club-list');
}

    
    public function delete($id)
    {
        $this->permissionCheck('club_delete');
        $model = new ClubModel();
        // Delete the clubs from the database
        $model->delete($id);
         // Set flash message for failure
         $this->session->setFlashdata('main_success', "Record deleted Successfully.");
        return redirect()->to('/club-list');
    }

    // Method to show details of a record
    public function print($id)
    {
        $this->permissionCheck('club_print');
        $model = new ClubModel();
        $data['detail'] = $model->find($id);

        return view('business/clubs/print', $data);
    }

    public function clubDetails($id)
{
    $this->permissionCheck('club_view');
    $clubModel = new clubModel();
    $clubDetail = $clubModel->find($id);
    
    $provinceModel = new ProvinceModel();
    $districtModel = new DistrictModel();
    $municipalityModel = new MunicipalityModel();

    // Fetch province name
    $province = $provinceModel->find($clubDetail['province']);
    $clubDetail['province'] = $province['province']; 

    // Fetch district name
    $district = $districtModel->find($clubDetail['district']);
    $clubDetail['district'] = $district['district']; 

    // Fetch municipality name
    $municipality = $municipalityModel->find($clubDetail['municipality']);
    $clubDetail['municipality'] = $municipality['municipality']; 

    $data['detail'] = $clubDetail;
    $data['title'] = "क्लब विवरण"; 

    return view('business/clubs/view', $data);
}
    
 
}
