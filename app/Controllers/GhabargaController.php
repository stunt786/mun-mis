<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\UploadedFile;
use App\Controllers\AdminBaseController;
use App\Models\GhabargaModel;
use App\Models\YearModel;
use App\Models\ProvinceModel;
use App\Models\DistrictModel;
use App\Models\MunicipalityModel;
use App\Models\WardModel;

class GhabargaController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;
        
    public function __construct(){
        $this->db = db_connect();
        $this->model= new GhabargaModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
    }
    public function addGhabarga()
    {
        $this->permissionCheck('ghabarga_add');
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'निर्माण व्यवशाय दर्ता';
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

        
        return view('business/ghabarga/add', $data); 
    }

    public function ghabargalist()
    {
        $this->permissionCheck('ghabarga_list');
        $model = new GhabargaModel();
        $data['ghabarga'] = $model->orderBy('id', 'DESC')->findAll(); // Retrieve all users from the database
        $data['title'] = 'निर्माण व्यवशाय सूची';
        return view('business/ghabarga/list', $data); // Load view with user data
    }
       
    public function ghabarga()
{
    $this->permissionCheck('ghabarga_add');
    // Check if the uploads directory exists, create it if not
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];
    // Retrieve form data
    // Retrieve data from HTTP POST request
    $orgname = $this->request->getPost('orgname');
    $fiscal_year = $this->request->getPost('fiscal_year');
    $orgregdate = $this->request->getPost('orgregdate');
    $orgprovinceid = $this->request->getPost('orgprovinceid');
    $orgdistrictid = $this->request->getPost('orgdistrictid');
    $orgmunicipalityid = $this->request->getPost('orgmunicipalityid');
    $orgwardid = $this->request->getPost('orgwardid');
    $orgroad = $this->request->getPost('orgroad');
    $orgestddate = $this->request->getPost('orgestddate');
    
    $orgphone = $this->request->getPost('orgphone');
    $orgemail = $this->request->getPost('orgemail');
    $orgpan = $this->request->getPost('orgpan');
    $orgtype = $this->request->getPost('orgtype');
    $maxcapital = $this->request->getPost('maxcapital');
    $currentcapital = $this->request->getPost('currentcapital');

    $barga = $this->request->getPost('barga');
    $ogroup = $this->request->getPost('ogroup');
    $overdraftcapital = $this->request->getPost('overdraftcapital');
    $currentaccount = $this->request->getPost('currentaccount');
    $savingaccount = $this->request->getPost('savingaccount');
    $mudatiaccount = $this->request->getPost('mudatiaccount');
    $skilledemployee = $this->request->getPost('skilledemployee');
    $unskilledemployee = $this->request->getPost('unskilledemployee');
        
    $otheremployee = $this->request->getPost('otheremployee');
    $vehicleslist = $this->request->getPost('vehicleslist');
    $chiefofficer = $this->request->getPost('chiefofficer');
    $chiefofficerjob = $this->request->getPost('chiefofficerjob');
    $applicantname = $this->request->getPost('applicantname');
    $applicantphone = $this->request->getPost('applicantphone');
    $applicantaddress = $this->request->getPost('applicantaddress');
    $applicantemail = $this->request->getPost('applicantemail');
    $orgregdate = $this->request->getPost('orgregdate');
    $orgstatus = $this->request->getPost('orgstatus');
    $renewdate = $this->request->getPost('renewdate');
    $expirydate = $this->request->getPost('expirydate');
    $expirystatus = $this->request->getPost('expirystatus');
        
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
                'fiscal_year' => $this->db->escapeString($fiscal_year),
                'orgregdate' => $this->db->escapeString($orgregdate),
                'orgprovinceid' => $this->db->escapeString($orgprovinceid),
                'orgdistrictid' => $this->db->escapeString($orgdistrictid),
                'orgmunicipalityid' => $this->db->escapeString($orgmunicipalityid),
                'orgwardid' => $this->db->escapeString($orgwardid),
                'orgroad' => $this->db->escapeString($orgroad),
                'orgestddate' => $this->db->escapeString($orgestddate),
                
                'orgphone' => $this->db->escapeString($orgphone),
                'orgemail' => $this->db->escapeString($orgemail),
                'orgpan' => $this->db->escapeString($orgpan),
                'orgtype' => $this->db->escapeString($orgtype),
                'maxcapital' => $this->db->escapeString($maxcapital),
                'currentcapital' => $this->db->escapeString($currentcapital),

                'barga' => $this->db->escapeString($barga),
                'ogroup' => $this->db->escapeString($ogroup),
                'overdraftcapital' => $this->db->escapeString($overdraftcapital),
                'currentaccount' => $this->db->escapeString($currentaccount),
                'savingaccount' => $this->db->escapeString($savingaccount),
                'mudatiaccount' => $this->db->escapeString($mudatiaccount),
                'skilledemployee' => $this->db->escapeString($skilledemployee),
                'unskilledemployee' => $this->db->escapeString($unskilledemployee),

                'otheremployee' => $this->db->escapeString($otheremployee),
                'vehicleslist' => $this->db->escapeString($vehicleslist),
                'chiefofficer' => $this->db->escapeString($chiefofficer),
                'chiefofficerjob' => $this->db->escapeString($chiefofficerjob),
                'applicantname' => $this->db->escapeString($applicantname),
                'applicantphone' => $this->db->escapeString($applicantphone),
                'applicantaddress' => $this->db->escapeString($applicantaddress),
                'applicantemail' => $this->db->escapeString($applicantemail),
                'orgregdate' => $this->db->escapeString($orgregdate),
                'orgstatus' => $this->db->escapeString($orgstatus),
                'renewdate' => $this->db->escapeString($renewdate),
                'expirydate' => $this->db->escapeString($expirydate),
                'expirystatus' => $this->db->escapeString($expirystatus),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : "",
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : "",
                "cert_no" => $serialNoFormatted,
                "user_id" => $this->db->escapeString($userId),
            ];

            // Save record to the database using prepared statements
            $builder = $this->db->table('ghabarga');
            $builder->insert($dataToSave);
       
             // Set flash message for failure
             $this->session->setFlashdata('main_success', "Record Saved Successfully.");
        
            // Redirect to the yearlist page
            return redirect()->to('/ghabarga-list');
}

    
    public function edit($id)
    {
        $this->permissionCheck('ghabarga_edit');
        $model =new YearModel();
        $data['years'] = $model->findAll();
        // Fetch the existing record from the database
        $existingRecord = $this->model->find($id);
        $data['old_year'] = $existingRecord['fiscal_year'];

        $model = new GhabargaModel();
        // Find the year by ID
        $data['ghabarga'] = $model->find($id);
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'घ बर्ग अद्यावधिक';
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
        return view('business/ghabarga/edit', $data);

        
    }

    
    public function update($id)
{
    $this->permissionCheck('ghabarga_edit');
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
    $fiscal_year = $this->request->getPost('fiscal_year');
    $orgregdate = $this->request->getPost('orgregdate');
    $orgprovinceid = $this->request->getPost('orgprovinceid');
    $orgdistrictid = $this->request->getPost('orgdistrictid');
    $orgmunicipalityid = $this->request->getPost('orgmunicipalityid');
    $orgwardid = $this->request->getPost('orgwardid');
    $orgroad = $this->request->getPost('orgroad');
    $orgestddate = $this->request->getPost('orgestddate');
    
    $orgphone = $this->request->getPost('orgphone');
    $orgemail = $this->request->getPost('orgemail');
    $orgpan = $this->request->getPost('orgpan');
    $orgtype = $this->request->getPost('orgtype');
    $maxcapital = $this->request->getPost('maxcapital');
    $currentcapital = $this->request->getPost('currentcapital');

    $barga = $this->request->getPost('barga');
    $ogroup = $this->request->getPost('ogroup');
    $overdraftcapital = $this->request->getPost('overdraftcapital');
    $currentaccount = $this->request->getPost('currentaccount');
    $savingaccount = $this->request->getPost('savingaccount');
    $mudatiaccount = $this->request->getPost('mudatiaccount');
    $skilledemployee = $this->request->getPost('skilledemployee');
    $unskilledemployee = $this->request->getPost('unskilledemployee');
    
    $otheremployee = $this->request->getPost('otheremployee');
    $vehicleslist = $this->request->getPost('vehicleslist');
    $chiefofficer = $this->request->getPost('chiefofficer');
    $chiefofficerjob = $this->request->getPost('chiefofficerjob');
    $applicantname = $this->request->getPost('applicantname');
    $applicantphone = $this->request->getPost('applicantphone');
    $applicantaddress = $this->request->getPost('applicantaddress');
    $applicantemail = $this->request->getPost('applicantemail');
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
                'fiscal_year' => $this->db->escapeString($fiscal_year),
                'orgregdate' => $this->db->escapeString($orgregdate),
                'orgprovinceid' => $this->db->escapeString($orgprovinceid),
                'orgdistrictid' => $this->db->escapeString($orgdistrictid),
                'orgmunicipalityid' => $this->db->escapeString($orgmunicipalityid),
                'orgwardid' => $this->db->escapeString($orgwardid),
                'orgroad' => $this->db->escapeString($orgroad),
                'orgestddate' => $this->db->escapeString($orgestddate),
                
                'orgphone' => $this->db->escapeString($orgphone),
                'orgemail' => $this->db->escapeString($orgemail),
                'orgpan' => $this->db->escapeString($orgpan),
                'orgtype' => $this->db->escapeString($orgtype),
                'maxcapital' => $this->db->escapeString($maxcapital),
                'currentcapital' => $this->db->escapeString($currentcapital),

                'barga' => $this->db->escapeString($barga),
                'ogroup' => $this->db->escapeString($ogroup),
                'overdraftcapital' => $this->db->escapeString($overdraftcapital),
                'currentaccount' => $this->db->escapeString($currentaccount),
                'savingaccount' => $this->db->escapeString($savingaccount),
                'mudatiaccount' => $this->db->escapeString($mudatiaccount),
                'skilledemployee' => $this->db->escapeString($skilledemployee),
                'unskilledemployee' => $this->db->escapeString($unskilledemployee),
                
                'otheremployee' => $this->db->escapeString($otheremployee),
                'vehicleslist' => $this->db->escapeString($vehicleslist),
                'chiefofficer' => $this->db->escapeString($chiefofficer),
                'chiefofficerjob' => $this->db->escapeString($chiefofficerjob),
                'applicantname' => $this->db->escapeString($applicantname),
                'applicantphone' => $this->db->escapeString($applicantphone),
                'applicantaddress' => $this->db->escapeString($applicantaddress),
                'applicantemail' => $this->db->escapeString($applicantemail),
                'orgregdate' => $this->db->escapeString($orgregdate),
                'orgstatus' => $this->db->escapeString($orgstatus),
                'renewdate' => $this->db->escapeString($renewdate),
                'expirydate' => $this->db->escapeString($expirydate),
                'expirystatus' => $this->db->escapeString($expirystatus),
                "edited_by" => $this->db->escapeString($userId),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : $existingFilePath,
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : $existingImagePath
            ];

            // Update the record in the database using prepared statements
            $builder = $this->db->table('ghabarga');
            $builder->where('id', $id);
            $builder->update($dataToUpdate);
    
        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record updated successfully.");
        // Redirect to the yearlist page
        return redirect()->to('/ghabarga-list');
}

    
    public function delete($id)
    {
        $this->permissionCheck('ghabarga_delete');
        $model = new GhabargaModel();
        // Delete the year from the database
        $model->delete($id);
         // Set flash message for failure
         $this->session->setFlashdata('main_success', "Record Saved Successfully.");
        return redirect()->to('/ghabarga-list');
    }

    // Method to show details of a record
    public function print($id)
    {
        $this->permissionCheck('ghabarga_print');
        $ghabargaModel = new GhabargaModel();
        $ghabargaDetail = $ghabargaModel->find($id);
        $municipalityModel = new MunicipalityModel();

    
        // Fetch municipality name
        $municipality = $municipalityModel->find($ghabargaDetail['orgmunicipalityid']);
        $ghabargaDetail['municipality'] = $municipality['municipality']; 
        $data['detail'] = $ghabargaDetail;

        return view('business/ghabarga/print', $data);
    }

    public function ghabargaDetails($id)
{
    $this->permissionCheck('ghabarga_view');
    $ghabargaModel = new GhabargaModel();
    $ghabargaDetail = $ghabargaModel->find($id);
    
    $provinceModel = new ProvinceModel();
    $districtModel = new DistrictModel();
    $municipalityModel = new MunicipalityModel();

    // Fetch province name
    $province = $provinceModel->find($ghabargaDetail['orgprovinceid']);
    $ghabargaDetail['province'] = $province['province']; 

    // Fetch district name
    $district = $districtModel->find($ghabargaDetail['orgdistrictid']);
    $ghabargaDetail['district'] = $district['district']; 

    // Fetch municipality name
    $municipality = $municipalityModel->find($ghabargaDetail['orgmunicipalityid']);
    $ghabargaDetail['municipality'] = $municipality['municipality']; 

    $data['detail'] = $ghabargaDetail;
    $data['title'] = "निर्माण व्यवशाय विवरण"; 

    return view('business/ghabarga/view', $data);
}
    
}
