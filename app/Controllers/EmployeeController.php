<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\UploadedFile;
use App\Models\EmployeeModel;
use App\Models\ProvinceModel;
use App\Models\DistrictModel;
use App\Models\MunicipalityModel;
use App\Models\WardModel;
use App\Controllers\AdminBaseController;

class EmployeeController extends AdminBaseController
{
    protected $db;
    protected $model;
    protected $session;
    protected $request;

    public function __construct(){
        $this->db = db_connect();
        $this->model= new EmployeeModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
                
    }
    public function addEmployee()
    {
        $this->permissionCheck('employee_add');
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'कर्मचारी विवरण';

        $provinceModel = new ProvinceModel();
        $data['province'] = $provinceModel->findAll();

        $districtModel =new DistrictModel();
        $data['district'] = $districtModel->findAll();

        $municipalityModel =new MunicipalityModel();
        $data['municipality'] = $municipalityModel->findAll();

        $wardModel =new WardModel();
        $data['ward'] = $wardModel->findAll();
       
        return view('progress/employee/create', $data); 
    }
    
    public function employeelist()
    {
        $this->permissionCheck('employee_list');
        $model = new EmployeeModel();
        $activeEmp = $model->where('empstatus', 1)->first();
        $data['employee'] = $model->where('empstatus', $activeEmp['empstatus'])->findAll(); // Retrieve all users from the database
        $data['title'] = 'कर्मचारी विवरण';

        // $office = !empty($this->request->getGet('office')) ? urldecode($this->request->getGet('office')) : false;
        // $branch = !empty($this->request->getGet('branch')) ? urldecode($this->request->getGet('branch')) : false;
        // $level = !empty($this->request->getGet('level')) ? urldecode($this->request->getGet('level')) : false;
        // $empstatus = !empty($this->request->getGet('empstatus')) ? urldecode($this->request->getGet('empstatus')) : false;

        // $arg = [];

        // if ($office)
        //     $arg['office'] = $office;

        // if ($branch)
        //     $arg['branch'] = $branch;

        // if ($level)
        //     $arg['level'] = $level;

        // if ($empstatus)
        //     $arg['empstatus'] = $empstatus;

        //     $emp_filter = (new EmployeeModel)->getByWhere($arg, [
        //         'order' => ['id', 'desc']
        //     ]);
    
        //     $filter_office = $office;
        //     $filter_branch = $branch;
        //     $filter_level = $level;
        //     $filter_empstatus = $empstatus;

        return view('progress/employee/list', $data); // Load view with user data
    }
       
    public function employee()
{
    $this->permissionCheck('employee_add');
    // Check if the proguploads directory exists, create it if not
    if (!is_dir('./proguploads/')) {
        mkdir('./proguploads/');
    }
    helper(['form']);
    $validation = \Config\Services::validation();
    $validation->setRules([
        
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        
    ]);

    // validate
    if (! $this->validate([
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        
     
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    // Get logged-in user ID
   $userId = $this->session->get('logged')['id'];

    
    // Retrieve data from HTTP POST request
    $fullname = $this->request->getPost('fullname');
    $dob = $this->request->getPost('dob');
    $gender = $this->request->getPost('gender');
    $province = $this->request->getPost('province');
    $district = $this->request->getPost('district');
    $municipality = $this->request->getPost('municipality');
    $ward = $this->request->getPost('ward');
    $tole = $this->request->getPost('tole');
    $contact = $this->request->getPost('contact');
    $email = $this->request->getPost('email');
    $mobile = $this->request->getPost('mobile');
    $marriedstatus = $this->request->getPost('marriedstatus');
    $gfather = $this->request->getPost('gfather');
    $father = $this->request->getPost('father');
    $ctznid = $this->request->getPost('ctznid');
    $spouse = $this->request->getPost('spouse');
    $ctzndistrict = $this->request->getPost('ctzndistrict');
    $pan = $this->request->getPost('pan');
    $education = $this->request->getPost('education');
    $bloodgroup = $this->request->getPost('bloodgroup');
    $niyukti = $this->request->getPost('niyukti');
    $datefrom = $this->request->getPost('datefrom');
    $dateto = $this->request->getPost('dateto');
    $empid = $this->request->getPost('empid');
    $sanchayakosh = $this->request->getPost('sanchayakosh');
    $laganikosh = $this->request->getPost('laganikosh');
    $sheetroll = $this->request->getPost('sheetroll');
    $resigndate = $this->request->getPost('resigndate');
    $sewa = $this->request->getPost('sewa');
    $empstatus = $this->request->getPost('empstatus');
    $level = $this->request->getPost('level');
    $pad = $this->request->getPost('pad');
    $office = $this->request->getPost('office');
    $branch = $this->request->getPost('branch');
    $role = $this->request->getPost('role');
        
    $file = $this->request->getFile('file1');
    


            // Check if the file exists and is valid
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Generate a new name for the file
            $newName = $file->getRandomName();
            
            // Move the file to the proguploads directory
            if ($file->move("proguploads/", $newName)) {
                // Update the file path
                $filePath = "proguploads/" . $newName;
            }
        }
  
            // Save record to the database
            $dataToSave = [
                'fullname' => $this->db->escapeString($fullname),
                'dob' => $this->db->escapeString($dob),
                'gender' => $this->db->escapeString($gender),
                'province' => $this->db->escapeString($province),
                'district' => $this->db->escapeString($district),
                'municipality' => $this->db->escapeString($municipality),
                'ward' => $this->db->escapeString($ward),
                'tole' => $this->db->escapeString($tole),
                'contact' => $this->db->escapeString($contact),
                'email' => $this->db->escapeString($email),
                'mobile' => $this->db->escapeString($mobile),
                'marriedstatus' => $this->db->escapeString($marriedstatus),
                'gfather' => $this->db->escapeString($gfather),
                'father' => $this->db->escapeString($father),
                'ctznid' => $this->db->escapeString($ctznid),
                'spouse' => $this->db->escapeString($spouse),
                'ctzndistrict' => $this->db->escapeString($ctzndistrict),
                'pan' => $this->db->escapeString($pan),
                'education' => $this->db->escapeString($education),
                'bloodgroup' => $this->db->escapeString($bloodgroup),
                'niyukti' => $this->db->escapeString($niyukti),
                'datefrom' => $this->db->escapeString($datefrom),
                'dateto' => $this->db->escapeString($dateto),
                'empid' => $this->db->escapeString($empid),
                'sanchayakosh' => $this->db->escapeString($sanchayakosh),
                'laganikosh' => $this->db->escapeString($laganikosh),
                'sheetroll' => $this->db->escapeString($sheetroll),
                'resigndate' => $this->db->escapeString($resigndate),
                'sewa' => $this->db->escapeString($sewa),
                'empstatus' => $this->db->escapeString($empstatus),
                'level' => $this->db->escapeString($level),
                'pad' => $this->db->escapeString($pad),
                'office' => $this->db->escapeString($office),
                'branch' => $this->db->escapeString($branch),
                'role' => $this->db->escapeString($role),
                "image_path" => isset($filePath) ? $filePath : "",

                "user_id" => $this->db->escapeString($userId),
            ];

            // Save record to the database using prepared statements
            $builder = $this->db->table('employee');
            $builder->insert($dataToSave);
       
            // Set flash message for failure
            $this->session->setFlashdata('main_success', "Record Saved Successfully.");
        
            // Redirect to the yearlist page
            return redirect()->to('progress/employee/employee-list');
}

    
    public function edit($id)
    {
        $this->permissionCheck('employee_edit');
        
        $model = new EmployeeModel();
        // Find the employee by ID
        $data['employee'] = $model->find($id);
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'कर्मचारी विवरण अद्यावधिक';
        
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
        return view('progress/employee/edit', $data);

        
    }

    
    public function update($id)
{
    $this->permissionCheck('employee_edit');
    // Ensure the proguploads directory exists
    if (!is_dir('./proguploads/')) {
        mkdir('./proguploads/');
    }
    
    // Get form data
    $fullname = $this->request->getPost('fullname');
    $dob = $this->request->getPost('dob');
    $gender = $this->request->getPost('gender');
    $province = $this->request->getPost('province');
    $district = $this->request->getPost('district');
    $municipality = $this->request->getPost('municipality');
    $ward = $this->request->getPost('ward');
    $tole = $this->request->getPost('tole');
    $contact = $this->request->getPost('contact');
    $email = $this->request->getPost('email');
    $mobile = $this->request->getPost('mobile');
    $marriedstatus = $this->request->getPost('marriedstatus');
    $gfather = $this->request->getPost('gfather');
    $father = $this->request->getPost('father');
    $ctznid = $this->request->getPost('ctznid');
    $spouse = $this->request->getPost('spouse');
    $ctzndistrict = $this->request->getPost('ctzndistrict');
    $pan = $this->request->getPost('pan');
    $education = $this->request->getPost('education');
    $bloodgroup = $this->request->getPost('bloodgroup');
    $niyukti = $this->request->getPost('niyukti');
    $datefrom = $this->request->getPost('datefrom');
    $dateto = $this->request->getPost('dateto');
    $empid = $this->request->getPost('empid');
    $sanchayakosh = $this->request->getPost('sanchayakosh');
    $laganikosh = $this->request->getPost('laganikosh');
    $sheetroll = $this->request->getPost('sheetroll');
    $resigndate = $this->request->getPost('resigndate');
    $sewa = $this->request->getPost('sewa');
    $empstatus = $this->request->getPost('empstatus');
    $level = $this->request->getPost('level');
    $pad = $this->request->getPost('pad');
    $office = $this->request->getPost('office');
    $branch = $this->request->getPost('branch');
    $role = $this->request->getPost('role');
    $file1 = $this->request->getFile('file1');
    

    // Retrieve the existing file paths from the database
    $existingRecord = $this->model->find($id);
    $existingFilePath = $existingRecord['image_path'];
   

    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];

    helper(['form']);
    $validation = \Config\Services::validation();
    $validation->setRules([
        
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        
    ]);

    // validate
    if (! $this->validate([
        'file1' => 'max_size[file1,5120]|ext_in[file1,jpg,jpeg,png,pdf]',
        
     
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    // Process the files (if any)
    $filePaths = [];
    foreach ([$file1] as $index => $file) {
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            if ($file->move("./proguploads/", $newName)) {
                $filePaths[$index] = "proguploads/" . $newName;
            }
        }
    }

            // Save record to the database
            $dataToUpdate = [
                'fullname' => $this->db->escapeString($fullname),
                'dob' => $this->db->escapeString($dob),
                'gender' => $this->db->escapeString($gender),
                'province' => $this->db->escapeString($province),
                'district' => $this->db->escapeString($district),
                'municipality' => $this->db->escapeString($municipality),
                'ward' => $this->db->escapeString($ward),
                'tole' => $this->db->escapeString($tole),
                'contact' => $this->db->escapeString($contact),
                'email' => $this->db->escapeString($email),
                'mobile' => $this->db->escapeString($mobile),
                'marriedstatus' => $this->db->escapeString($marriedstatus),
                'gfather' => $this->db->escapeString($gfather),
                'father' => $this->db->escapeString($father),
                'ctznid' => $this->db->escapeString($ctznid),
                'spouse' => $this->db->escapeString($spouse),
                'ctzndistrict' => $this->db->escapeString($ctzndistrict),
                'pan' => $this->db->escapeString($pan),
                'education' => $this->db->escapeString($education),
                'bloodgroup' => $this->db->escapeString($bloodgroup),
                'niyukti' => $this->db->escapeString($niyukti),
                'datefrom' => $this->db->escapeString($datefrom),
                'dateto' => $this->db->escapeString($dateto),
                'empid' => $this->db->escapeString($empid),
                'sanchayakosh' => $this->db->escapeString($sanchayakosh),
                'laganikosh' => $this->db->escapeString($laganikosh),
                'sheetroll' => $this->db->escapeString($sheetroll),
                'resigndate' => $this->db->escapeString($resigndate),
                'sewa' => $this->db->escapeString($sewa),
                'empstatus' => $this->db->escapeString($empstatus),
                'level' => $this->db->escapeString($level),
                'pad' => $this->db->escapeString($pad),
                'office' => $this->db->escapeString($office),
                'branch' => $this->db->escapeString($branch),
                'role' => $this->db->escapeString($role),
                'edited_by'=> $this->db->escapeString($userId),
                "image_path" => isset($filePaths[0]) ? $filePaths[0] : $existingFilePath
                
            ];

            // Update the record in the database using prepared statements
            $builder = $this->db->table('employee');
            $builder->where('id', $id);
            $builder->update($dataToUpdate);
    
        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record updated successfully.");
        // Redirect to the yearlist page
        return redirect()->to('progress/employee/employee-list');
}

    
    public function delete($id)
    {
        $this->permissionCheck('employee_delete');
        $model = new EmployeeModel();
        // Delete the year from the database
        $model->delete($id);
        // Set flash message for failure
        $this->session->setFlashdata('main_success', "Record deleted Successfully.");
        return redirect()->to('progress/employee/employee-list');
    }

    // Method to show details of a record
    public function print($id)
    {
        $this->permissionCheck('agri_print');
        $EmployeeModel = new EmployeeModel();
        $agriDetail = $EmployeeModel->find($id);
        $municipalityModel = new MunicipalityModel();

    
        // Fetch municipality name
        $municipality = $municipalityModel->find($agriDetail['municipality']);
        $agriDetail['municipality'] = $municipality['municipality']; 
        $data['detail'] = $agriDetail;

        return view('business/agri/print', $data);
    }
    public function agriDetails($id)
{
    $this->permissionCheck('agri_view');
    $EmployeeModel = new EmployeeModel();
    $agriDetail = $EmployeeModel->find($id);
    
    $provinceModel = new ProvinceModel();
    $districtModel = new DistrictModel();
    $municipalityModel = new MunicipalityModel();

    // Fetch province name
    $province = $provinceModel->find($agriDetail['province']);
    $agriDetail['province'] = $province['province']; 

    // Fetch district name
    $district = $districtModel->find($agriDetail['district']);
    $agriDetail['district'] = $district['district']; 

    // Fetch municipality name
    $municipality = $municipalityModel->find($agriDetail['municipality']);
    $agriDetail['municipality'] = $municipality['municipality']; 

    $data['detail'] = $agriDetail;
    $data['title'] = "समुह विवरण"; 

    return view('business/agri/view', $data);
}
    
 
}
