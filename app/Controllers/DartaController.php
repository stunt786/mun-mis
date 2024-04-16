<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\UploadedFile;
use App\Controllers\AdminBaseController;
use App\Models\YearModel;
use App\Models\DartaModel;

class DartaController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;
        
    public function __construct(){
        $this->db = db_connect();
        $this->model= new DartaModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
    }
    
    public function addDarta()
    {
        $this->permissionCheck('darta_add');
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'नयाँ दर्ता';
            return view('dartachalani/add-darta', $data); 
    }
    public function dartalist()
    {
        $this->permissionCheck('darta_list');
        $model = new DartaModel();
        // $data['darta'] = $model->findAll(); // Retrieve all users from the database

        // Fetch the active year
        $yearModel = new YearModel();
        $activeYear = $yearModel->where('active', 1)->first();

        // Fetch Darta records for the active year
        $model = new DartaModel();
        $data['title'] = 'दर्ता सूची';
        $data['darta'] = $model->where('year', $activeYear['year'])->findAll();
        return view('dartachalani/list-darta', $data); // Load view with user data
    }

    public function darta()
    {
        $this->permissionCheck('darta_add');
        if(!is_dir('./uploads/')){
        mkdir('./uploads/');
    }
        // Get logged-in user ID
        $userId = $this->session->get('logged')['id'];
    //Retrive the data
        $received_date = $this->request->getPost('received_date');
        $subject = $this->request->getPost('subject');
        $office = $this->request->getPost('office');
        $address = $this->request->getPost('address');
        $send_date = $this->request->getPost('send_date');
        $email = $this->request->getPost('email');
        $chalani = $this->request->getPost('chalani');
        $type = $this->request->getPost('type');
        $remarks = $this->request->getPost('remarks');
        $file = $this->request->getFile('file');
       
        // Fetch the active year
        $yearModel = new YearModel();
        $activeYear = $yearModel->where('active', 1)->first();

        // Fetch the highest serial number for the active year
    $highestSerial = $this->model->where('year', $activeYear['year'])->orderBy('serial_number', 'DESC')->first();

    // Calculate the new serial number
    $newSerial = ($highestSerial) ? $highestSerial['serial_number'] + 1 : 1;

    
       //check if file is uploaded
       if ($file && $file->isValid() && !$file->hasMoved()) {
        // Generate a random name for the file
        $fname = $file->getRandomName();

        //Move the file to uploads directory
        if ($file->move("uploads/", $fname)) {
            // Check if the file with the same name already exists
            while (true) {
                $check = $this->model->where("file_path", "uploads/{$fname}")->countAllResults();
                if ($check > 0) {
                    $fname = $file->getRandomName();
                } else {
                    break;
                }
            }
            
        //Save record to the database
        
            $this->model->save([
                "received_date" =>$this->db->escapeString($received_date),
                "subject" =>$this->db->escapeString($subject),
                "office" =>$this->db->escapeString($office),
                "address" =>$this->db->escapeString($address),
                "send_date" =>$this->db->escapeString($send_date),
                "email" =>$this->db->escapeString($email),
                "chalani" =>$this->db->escapeString($chalani),
                "type" =>$this->db->escapeString($type),
                "remarks" =>$this->db->escapeString($remarks),
                "year" => $activeYear['year'],
                "user_id" => $this->db->escapeString($userId),
                "serial_number" => $newSerial,
                "file_path" => "uploads/".$fname
            ]);
            //Set flash message for success
            $this->session->setFlashdata('main_success',"New File Uploaded successfully.");
            return redirect()->to('/list-darta');
        }else{
            //set message for failure
            $this->session->setFlashdata('main_success',"File Upload failed.");
        }
    }else{
        //Save record to the database without file upload
        $this->model->save([
                "received_date" =>$this->db->escapeString($received_date),
                "subject" =>$this->db->escapeString($subject),
                "office" =>$this->db->escapeString($office),
                "address" =>$this->db->escapeString($address),
                "send_date" =>$this->db->escapeString($send_date),
                "email" =>$this->db->escapeString($email),
                "chalani" =>$this->db->escapeString($chalani),
                "type" =>$this->db->escapeString($type),
                "remarks" =>$this->db->escapeString($remarks),
                "year" => $activeYear['year'],
                "user_id" => $this->db->escapeString($userId),
                "serial_number" => $newSerial 
        ]);
        //Set flash message for success
        $this->session->setFlashdata('main_success',"New Record saved successfully.");
    }
        // Redirect to the darta page
    return redirect()->to('/list-darta');
    }

    public function edit($id)
    {
        $this->permissionCheck('darta_edit');
        $model = new DartaModel();
        // Find the year by ID
        $data['title'] = 'दर्ता अद्यावधिक';
        $data['darta'] = $model->find($id);
        // Load the edit view with the year data
        return view('dartachalani/edit', $data);
    }

    
    public function update($id)
{
    $this->permissionCheck('darta_edit');
    // Ensure the uploads directory exists
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];
    // Get form data
    $received_date = $this->request->getPost('received_date');
    $subject = $this->request->getPost('subject');
    $office = $this->request->getPost('office');
    $address = $this->request->getPost('address');
    $send_date = $this->request->getPost('send_date');
    $email = $this->request->getPost('email');
    $chalani = $this->request->getPost('chalani');
    $type = $this->request->getPost('type');
    $remarks = $this->request->getPost('remarks');
    $file = $this->request->getFile('file');

    
    // Check if a new file is uploaded
    if ($file->isValid() && !$file->hasMoved()) {
        // Generate a random name for the file
        $newName = $file->getRandomName();

        // Move the file to the uploads directory
        if ($file->move("./uploads/", $newName)) {
            // Check if the file with the same name already exists
            while (true) {
                $check = $this->model->where("file_path", "uploads/{$newName}")->countAllResults();
                if ($check > 0) {
                    $newName = $file->getRandomName();
                } else {
                    break;
                }
            }

            // Save record to the database
            $this->model->update($id, [
                "received_date" => $this->db->escapeString($received_date),
                "subject" => $this->db->escapeString($subject),
                "office" => $this->db->escapeString($office),
                "address" => $this->db->escapeString($address),
                "send_date" => $this->db->escapeString($send_date),
                "email" => $this->db->escapeString($email),
                "chalani" => $this->db->escapeString($chalani),
                "type" => $this->db->escapeString($type),
                "remarks" => $this->db->escapeString($remarks),
                "edited_by" => $this->db->escapeString($userId),
                "file_path" => "uploads/" . $newName
            ]);

            // Set flash message for success
            $this->session->setFlashdata('main_success', "File updated successfully.");
        } else {
            // Set flash message for failure
            $this->session->setFlashdata('main_success', "File upload failed.");
        }
    } else {
        // If no new file is uploaded, update other fields without changing the file path
        $this->model->update($id, [
            "received_date" => $this->db->escapeString($received_date),
                "subject" => $this->db->escapeString($subject),
                "office" => $this->db->escapeString($office),
                "address" => $this->db->escapeString($address),
                "send_date" => $this->db->escapeString($send_date),
                "email" => $this->db->escapeString($email),
                "chalani" => $this->db->escapeString($chalani),
                "type" => $this->db->escapeString($type),
                "remarks" => $this->db->escapeString($remarks),
                "edited_by" => $this->db->escapeString($userId),
        ]);

        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record updated successfully.");
    }

    // Redirect to the dartalist page
    return redirect()->to('/list-darta');
}
    public function delete($id)
    {
        $this->permissionCheck('darta_delete');
        $model = new DartaModel();
        // Delete the year from the database
        $model->delete($id);

        return redirect()->to('/list-darta');
    }
    // Method to show details of a record
    public function dartaDetails($id)
    {
        $this->permissionCheck('darta_view');
        $model = new DartaModel();
        $data['detail'] = $model->find($id);

        $this->session->setFlashdata('main_success', "Record deleted successfully.");

        return view('dartachalani/dartadetails', $data);
    }
}
