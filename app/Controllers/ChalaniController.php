<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\UploadedFile;
use App\Models\YearModel;
use App\Models\ChalaniModel;
use App\Controllers\AdminBaseController;

class ChalaniController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;
        
    public function __construct(){
        $this->db = db_connect();
        $this->model= new ChalaniModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
    }
    
    public function addChalani()
    {
        $this->permissionCheck('chalani_add');
        // Check if the user is authenticated (you might want to use a middleware for this)
        $data['title'] = 'नयाँ चलानी';
            return view('dartachalani/add-chalani', $data); 
    }

    public function chalanilist()
    {
        $this->permissionCheck('chalani_list');
        $model = new ChalaniModel();
        $data['title'] = 'चलानी';
        $data['chalani'] = $model->findAll(); // Retrieve all users from the database

        // Fetch the active year
    $yearModel = new YearModel();
    $activeYear = $yearModel->where('active', 1)->first();

    // Fetch Chalani records for the active year
    $model = new ChalaniModel();
    $data['chalani'] = $model->where('year', $activeYear['year'])->findAll();
        return view('dartachalani/list-chalani', $data); // Load view with user data
    }

    public function chalani()
    {
        // Get logged-in user ID
        $userId = $this->session->get('logged')['id'];
        $this->permissionCheck('chalani_add');
        if(!is_dir('./uploads/')){
        mkdir('./uploads/');
    }
    //Retrive the data
        $received_date = $this->request->getPost('received_date');
        $subject = $this->request->getPost('subject');
        $office = $this->request->getPost('office');
        $address = $this->request->getPost('address');
        $email = $this->request->getPost('email');
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
                "email" =>$this->db->escapeString($email),
                "type" =>$this->db->escapeString($type),
                "remarks" => $this->db->escapeString($remarks),
                "year" => $activeYear['year'],
                "serial_number" => $newSerial,
                "user_id" => $this->db->escapeString($userId),
                "file_path" => "uploads/".$fname
            ]);
            //Set flash message for success
            $this->session->setFlashdata('main_success',"New File Saved successfully.");
            return redirect()->to('/list-chalani');
        }else{
            //set message for failure
            $this->session->setFlashdata('main_success',"Record failed to save.");
        }
    }else{
        //Save record to the database without file upload
        $this->model->save([
                "received_date" =>$this->db->escapeString($received_date),
                "subject" =>$this->db->escapeString($subject),
                "office" =>$this->db->escapeString($office),
                "address" =>$this->db->escapeString($address),
                "email" =>$this->db->escapeString($email),
                "type" =>$this->db->escapeString($type),
                "remarks" => $this->db->escapeString($remarks),
                "year" => $activeYear['year'],
                "user_id" => $this->db->escapeString($userId),
                "serial_number" => $newSerial, 
        ]);
        //Set flash message for success
        $this->session->setFlashdata('main_success',"New Record successfully.");
    }
        // Redirect to the darta page
    return redirect()->to('/list-chalani');
    }

    public function edit($id)
    {
        $this->permissionCheck('chalani_edit');
        $model = new ChalaniModel();
        // Find the year by ID
        $data['title'] = 'चलानी अद्यावधिक';
        $data['chalani'] = $model->find($id);
        // Load the edit view with the year data
        return view('dartachalani/edit-chalani', $data);
    }

    
    public function update($id)
{
    $this->permissionCheck('chalani_edit');
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
    $email = $this->request->getPost('email');
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
                "email" => $this->db->escapeString($email),
                "type" => $this->db->escapeString($type),
                "remarks" => htmlentities($remarks),
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
                "email" => $this->db->escapeString($email),
                "type" => $this->db->escapeString($type),
                "remarks" => htmlentities($remarks),
                "edited_by" => $userId,
        ]);

        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record updated successfully.");
    }

    // Redirect to the dartalist page
    return redirect()->to('/list-chalani');
}
    public function delete($id)
    {
        $this->permissionCheck('chalani_delete');
        $model = new ChalaniModel();
        // Delete the chalani from the database
        $model->delete($id);

        return redirect()->to('/list-chalani');
    }
    // Method to show details of a record
    public function chalaniDetails($id)
    {
        $this->permissionCheck('chalani_view');
        $model = new ChalaniModel();
        $data['detail'] = $model->find($id);

        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record deleted successfully.");

        return view('dartachalani/chalanidetails', $data);
    }
}
