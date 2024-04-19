<?php

namespace App\Controllers\Progress;

use App\Controllers\BaseController;
use CodeIgniter\Files\UploadedFile;
use App\Controllers\AdminBaseController;
use App\Models\progress\EduMonthlyModel;
use App\Models\YearModel;



class EduMonthlyController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;
        
    public function __construct(){
        $this->db = db_connect();
        $this->model= new EduMonthlyModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
        
    }
    public function index()
{
    // 3. Fetch Current Year
    $yearModel = new YearModel(); 
    $currentYear = $yearModel->getCurrentYear();
    // 2. Filter by Active Year
    
    $results = $this->model->where('year', $currentYear)->findAll();

        $data['title'] = 'Education Progress';
        $data['edumonthly'] = $results ? $results[0] : null; // First record or null
        $data['error'] = count($results) === 0 ? 'No records found.' : null;

    return view('progress/education/add-monthly', $data); 
}

    public function baishakh() 
    {
        helper('form'); 

        // 1. Validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'assessment' => 'required|min_length[20]',
            'progress_summary' => 'required|min_length[20]',
            'remarks' => 'permit_empty',
            'image' => 'uploaded[image]|mime_in[image,application/pdf,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.oasis.opendocument.text,application/vnd.oasis.opendocument.spreadsheet]', 
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed - reload form with errors
            return view('/progress/education/add-monthly', [
                'validation' => $validation,
                'edumonthly' => $this->request->getPost(), // Use post data to repopulate form
            ]);
        }

        // 2. File Upload & Image Name Handling
        $file = $this->request->getFile('image');
        $imageName = null; // Will hold either the new or old filename

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('proguploads/', $newName); 
            $imageName = $newName;
        }

        // Get logged-in user ID
        $userId = $this->session->get('logged')['id'];
        // 3. Fetch Current Year
        $yearModel = new YearModel(); 
        $currentYear = $yearModel->getCurrentYear();

        // 4. Fetch Existing Record (if any)
        $eduModel = new \App\Models\Progress\EduMonthlyModel();
        $existingRecord = $eduModel->where('year', $currentYear)
                                   ->find($this->request->getVar('id'));

        // 5. Data Preparation
        $data = [
            'assessment'        => $this->request->getVar('assessment'),
            'progress_summary'  => $this->request->getVar('progress_summary'),
            'remarks'           => $this->request->getVar('remarks'),
            'year'              => $currentYear, 
            'user_id'=> $this->db->escapeString($userId), 
        ];

        if ($imageName) { 
            $data['file_path'] = $imageName;  // Only update if a new file was uploaded
        }

        // 6. Update or Create Logic
        if ($existingRecord) {
            $eduModel->update($this->request->getVar('id'), $data);
        } else {
            $eduModel->insert($data);
        }

        // 7. Redirect on Success 
        return redirect()->to('/edu-monthly')->with('success', 'Data updated successfully');
    }

}

public function baishakh()
    {
        helper('form'); 
        // Load the model
        $model = new EduMonthlyModel(); // Replace YourModel with the actual name of your model
        
        // Retrieve form data
        $assessment = $this->request->getPost('assessment');
        $progress_summary = $this->request->getPost('progress_summary');
        $remarks = $this->request->getPost('remarks');
        $month = $this->request->getPost('month');
        

        // Perform validation if necessary
        $validation = \Config\Services::validation();
        $validation->setRules([
            'assessment' => 'required|min_length[20]',
            'progress_summary' => 'required|min_length[20]',
            'remarks' => 'permit_empty',
            'image' => 'uploaded[image]|mime_in[image,application/pdf,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.oasis.opendocument.text,application/vnd.oasis.opendocument.spreadsheet]', 
        ]);

        //File Upload & Image Name Handling
        $file = $this->request->getFile('image');
        $imageName = null; // Will hold either the new or old filename

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('proguploads/', $newName); 
            $imageName = $newName;
        }

        // Assuming you have an ID to identify the record you want to update
        $id = $this->request->getPost('id'); // Make sure to add a hidden input field in your form for the ID
        // Get logged-in user ID
        $userId = $this->session->get('logged')['id'];
        // 3. Fetch Current Year
        $yearModel = new YearModel(); 
        $currentYear = $yearModel->getCurrentYear();
        // Prepare data for update
        $data = [
            'assessment' => $assessment,
            'progress_summary' => $progress_summary,
            'remarks' => $remarks,
            'month' => $month,
            'file_path' => $imageName,
            'year'              => $currentYear, 
            'user_id'=> $this->db->escapeString($userId), 
            // Add other fields as needed
        ];

        // Update the record
        $model->update($id, $data);

        // Optionally, you can redirect the user to a success page or show a success message
        return redirect()->to('/edu-monthly')->with('success', 'Data updated successfully');
    }





    helper('form'); 
    if (!is_dir('./proguploads/')) {
        mkdir('./proguploads/');
    }

        // 1. Validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'assessment' => 'required|min_length[20]',
            'progress_summary' => 'required|min_length[20]',
            'remarks' => 'permit_empty',
            'image' => 'uploaded[image]|mime_in[image,application/pdf,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.oasis.opendocument.text,application/vnd.oasis.opendocument.spreadsheet]', 
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed - reload form with errors
            return view('/progress/education/add-monthly', [
                'validation' => $validation,
                'edumonthly' => $this->request->getPost(), // Use post data to repopulate form
            ]);
        }

        // 2. File Upload & Image Name Handling
        $file = $this->request->getFile('image');
        $imageName = null; // Will hold either the new or old filename

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('proguploads/', $newName); 
            $imageName = $newName;
        }

        // 3. Fetch Current Year
        $yearModel = new YearModel(); 
        $currentYear = $yearModel->getCurrentYear();

        // 4. Fetch Existing Record (if any)
        $eduModel = new \App\Models\Progress\EduMonthlyModel();
        $existingRecord = $eduModel->where('year', $currentYear)
                                   ->find($this->request->getVar('id'));

        // 5. Data Preparation
        $data = [
            'assessment'        => $this->request->getVar('assessment'),
            'progress_summary'  => $this->request->getVar('progress_summary'),
            'remarks'           => $this->request->getVar('remarks'),
            'month'           => $this->request->getVar('month'),
            'year'              => $currentYear, 
            'user_id'           => $this->db->escapeString($this->session->get('logged')['id']), // Adjust for your session setup
        ];

        if ($imageName) { 
            $data['file_path'] = $imageName;  // Only update if a new file was uploaded
        }

        // 6. Update or Create Logic
        if ($existingRecord) {
            $eduModel->update($this->request->getVar('id'), $data);
        } else {
            $eduModel->insert($data);
        }

        // 7. Redirect on Success 
        return redirect()->to('/edu-monthly')->with('success', 'Data updated successfully');
    }




    // working till now
    <?php

namespace App\Controllers\Progress;

use App\Controllers\BaseController;
use CodeIgniter\Files\UploadedFile;
use App\Controllers\AdminBaseController;
use App\Models\progress\EduMonthlyModel;
use App\Models\YearModel;



class EduMonthlyController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;
        
    public function __construct(){
        $this->db = db_connect();
        $this->model= new EduMonthlyModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
        
    }
    public function index()
    {
                
        $yearModel = new YearModel(); 
        $currentYear = $yearModel->getCurrentYear();

        $data['title'] = 'Education Progress';
        
        $selectedMonth = $this->request->getGet('month') ?? date('F'); 
        $data['selectedMonth'] = $selectedMonth; 

        $data['edumonthly'] = $this->model->where([
            'year' => $currentYear, 
            'month' => $selectedMonth
        ])->first();                
       
        return view('progress/education/add-monthly', $data); 
    }
    
    public function baishakh()
    {
        helper('form'); 
        // Load the model
        $model = new EduMonthlyModel(); 
        
        // Retrieve form data
        $assessment = $this->request->getPost('assessment');
        $progress_summary = $this->request->getPost('progress_summary');
        $remarks = $this->request->getPost('remarks');
        $month = $this->request->getPost('month');
        

        // Perform validation if necessary
        $validation = \Config\Services::validation();
        $validation->setRules([
            'assessment' => 'required|min_length[20]',
            'progress_summary' => 'required|min_length[20]',
            'remarks' => 'permit_empty',
            'image' => 'mime_in[image,application/pdf,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.oasis.opendocument.text,application/vnd.oasis.opendocument.spreadsheet]', 

        ]);

        //File Upload & Image Name Handling
        $file = $this->request->getFile('image');
        $imageName = null; // Will hold either the new or old filename

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('proguploads/', $newName); 
            $imageName = $newName;
        }

        // Assuming you have an ID to identify the record you want to update
        $id = $this->request->getPost('id'); // Make sure to add a hidden input field in your form for the ID
        // Get logged-in user ID
        $userId = $this->session->get('logged')['id'];
        // 3. Fetch Current Year
        $yearModel = new YearModel(); 
        $currentYear = $yearModel->getCurrentYear();
        // Prepare data for update
        $data = [
            'assessment' => $assessment,
            'progress_summary' => $progress_summary,
            'remarks' => $remarks,
            'month' => $month,
            'file_path' => $imageName,
            'year'              => $currentYear, 
            'user_id'=> $this->db->escapeString($userId), 
            // Add other fields as needed
        ];

        // Update the record
       // Check if a record exists for the current year and the logged-in user
       $existingRecord = $model->where('year', $currentYear)->where('user_id', $userId)->where('month', $month)->first();

    if ($existingRecord) {
        // Update the record
        $model->update($existingRecord['id'], $data);
    } else {
        // Insert a new record
        $model->insert($data);
    }

        //  a success page or show a success message
        return redirect()->to('/edu-monthly')->with('success', 'Data updated successfully');
    }

}