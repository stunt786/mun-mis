<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\UploadedFile;
use App\Controllers\AdminBaseController;
use App\Models\LawDirectiveModel;
use App\Models\YearModel;


class LawDirectiveController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;
        
    public function __construct(){
        $this->db = db_connect();
        $this->model= new LawDirectiveModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
    }
    public function addLaw()
    {
        $this->permissionCheck('law_add');
        $model =new YearModel();
        $data['years'] = $model->findAll();
        
        $data['title'] = 'ऐन कार्यविधि';
        $model =new LawDirectiveModel();
        $data['lawdirective'] = $model->findAll();

        return view('progress/lawsdirective/create', $data); 
    }
    public function lawslist()
    {
        $this->permissionCheck('law_list');
        $model = new LawDirectiveModel();
        $data['title'] = 'ऐन कार्यविधि सूची';
        $data['lawdirective'] = $model->orderBy('id', 'DESC')->findAll(); // Retrieve all users from the database
        return view('progress/lawsdirective/list', $data); // Load view with user data
    }
       
    public function laws()
{
    $this->permissionCheck('law_add');
    // Check if the uploads directory exists, create it if not
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];
    $model =new YearModel();
    $data['years'] = $model->findAll();
    // Retrieve form data
    // Retrieve data from HTTP POST request
    $lname = $this->request->getPost('lname');
    $type = $this->request->getPost('type');
    $publish = $this->request->getPost('publish');
    $karyapalika = $this->request->getPost('karyapalika');
    $fiscalyear = $this->request->getPost('fiscalyear');
        
    $file1 = $this->request->getFile('file1');
    $file2 = $this->request->getFile('file2');


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
                'lname' => $this->db->escapeString($lname),
                'type' => $this->db->escapeString($type),
                'publish' => $this->db->escapeString($publish),
                'karyapalika' => $this->db->escapeString($karyapalika),
                'fiscalyear' => $this->db->escapeString($fiscalyear),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : "",
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : "",
                "user_id" => $this->db->escapeString($userId),
            ];

            // Save record to the database using prepared statements
            $builder = $this->db->table('lawdirective');
            $builder->insert($dataToSave);
       
             // Set flash message for failure
             $this->session->setFlashdata('main_success', "Record Saved Successfully.");
        
            // Redirect to the yearlist page
            return redirect()->to('/laws-list');
}

    
    public function edit($id)
    {
        $this->permissionCheck('law_edit');
        $model =new YearModel();
        $data['years'] = $model->findAll();
        // Fetch the existing record from the database
        $existingRecord = $this->model->find($id);
        $data['old_year'] = $existingRecord['fiscalyear'];

        $model = new LawDirectiveModel();
        // Find the year by ID
        $data['lawdirective'] = $model->find($id);
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'ऐन कार्यविधि अद्यावधिक';
        
          // Load the edit view with the business data
        return view('progress/lawsdirective/edit', $data);

        
    }

    
    public function update($id)
{
    $this->permissionCheck('law_edit');
    // Ensure the uploads directory exists
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];
    $model =new YearModel();
    $data['years'] = $model->findAll();
    // Get form data
    $lname = $this->request->getPost('lname');
    $type = $this->request->getPost('type');
    $publish = $this->request->getPost('publish');
    $karyapalika = $this->request->getPost('karyapalika');
    $fiscalyear = $this->request->getPost('fiscalyear');
    
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
                'lname' => $this->db->escapeString($lname),
                'type' => $this->db->escapeString($type),
                'publish' => $this->db->escapeString($publish),
                'karyapalika' => $this->db->escapeString($karyapalika),
                'fiscalyear' => $this->db->escapeString($fiscalyear),
                "edited_by" => $this->db->escapeString($userId),
                "file_path" => isset($filePaths[0]) ? $filePaths[0] : $existingFilePath,
                "image_path" => isset($filePaths[1]) ? $filePaths[1] : $existingImagePath
            ];

            // Update the record in the database using prepared statements
            $builder = $this->db->table('lawdirective');
            $builder->where('id', $id);
            $builder->update($dataToUpdate);
    
        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record updated successfully.");
        // Redirect to the LawDirective page
        return redirect()->to('/laws-list');
}

    
    public function delete($id)
    {
        $this->permissionCheck('laws_delete');
        $model = new LawDirectiveModel();
        // Delete the lawDirective from the database
        $model->delete($id);
         // Set flash message for failure
         $this->session->setFlashdata('main_success', "Record deleted Successfully.");
        return redirect()->to('/laws-list');
    }

    
 
}
