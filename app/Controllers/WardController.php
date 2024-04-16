<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\AdminBaseController;
use CodeIgniter\Files\UploadedFile;

use App\Models\WardModel;

class WardController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;

    public function __construct(){
        $this->db = db_connect();
        $this->model= new WardModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
    }
    public function addWard()
    {
        $this->permissionCheck('ward_add');
        // Check if the user is authenticated (you might want to use a middleware for this)
            $data['title'] = 'वडा विवरण';
            return view('ward/create', $data); 
    }
    public function wardlist()
    {
        $this->permissionCheck('ward_list');
        $model = new WardModel();
        $data['title'] = 'वडा विवरण';
        $data['ward'] = $model->findAll(); // Retrieve all users from the database
        return view('ward/wardlist', $data); // Load view with user data
    }
        
    public function ward()
{
    
    $this->permissionCheck('ward_add');
    // Retrieve form data
    $ward = $this->request->getPost('ward');
    $status = $this->request->getPost('status');
    
    $validation = \Config\Services::validation();
    $validation->setRules([
        'ward' => 'required|is_unique[ward.ward]',
        
    ]);

    // validate
    if (! $this->validate([
        'ward' => 'required|is_unique[ward.ward]',
        
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    // Build the data to be saved, 
    $dataToSave = [
        "ward" => $this->db->escapeString($ward),
        "status" => $this->db->escapeString($status)
        
    ];

    // Save record to the database using prepared statements
    $builder = $this->db->table('ward');
    $builder->insert($dataToSave);

    // Set flash message for success
    $this->session->setFlashdata('main_success', "Record saved successfully.");

    
    // Redirect to the wardlist page
    return redirect()->to('/wardlist');
}

    
    public function edit($id)
    {
        $this->permissionCheck('ward_edit');
        $model = new WardModel();
        // Find the ward by ID
        $data['ward'] = $model->find($id);
        // Load the edit view with the ward data
        return view('ward/edit', $data);
    }

    
    public function update($id)
{
    $this->permissionCheck('ward_edit');
    // Get form data
    $ward = $this->request->getPost('ward');
    $status = $this->request->getPost('status');
    
    $validation = \Config\Services::validation();
    $validation->setRules([
        'ward' => 'required|is_unique[ward.ward]',
        
    ]);

    // validate
    if (! $this->validate([
        'ward' => 'required|is_unique[ward.ward]',
        
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    // Build the data to be updated, assigning file paths from their respective positions or existing values if not uploaded
    $dataToUpdate = [
        "ward" => $this->db->escapeString($ward),
        "status" => $this->db->escapeString($status)
        
    ];

    // Update the record in the database using prepared statements
   $builder = $this->db->table('ward');
   $builder->where('id', $id);
   $builder->update($dataToUpdate);

    // Set flash message for success
    $this->session->setFlashdata('main_success', "Record updated successfully.");

    // Redirect to the wardlist page
    return redirect()->to('/wardlist');
}

    
    public function delete($id)
    {
        $this->permissionCheck('ward_delete');
        $model = new WardModel();
        // Delete the ward from the database
        $model->delete($id);
        // Set flash message for success
        $this->session->setFlashdata('main_success', "Record deleted successfully.");

        return redirect()->to('/wardlist');
    }
}
