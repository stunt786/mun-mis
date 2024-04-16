<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\UploadedFile;
use App\Controllers\AdminBaseController;

use App\Models\BuscatModel;

class BuscatController extends AdminBaseController
{
    
    protected $db;
    protected $model;
    protected $session;
    protected $request;

    public function __construct(){
        $this->db = db_connect();
        $this->model= new BuscatModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
    }
    public function addCategory()
    {
        $this->permissionCheck('buscat_add');
        // Check if the user is authenticated (you might want to use a middleware for this)
            $data['title'] = 'व्यवशाय प्रकृति';
            return view('business/buscategory/create', $data); 
    }
    public function buscatlist()
    {
        $this->permissionCheck('buscat_list');
        $model = new BuscatModel();
        $data['title'] = 'व्यवशाय प्रकृति';
        $data['buscategory'] = $model->findAll(); // Retrieve all users from the database
        return view('business/buscategory/buscategorylist', $data); // Load view with user data
    }
        
    public function buscat()
{
    $this->permissionCheck('buscat_add');
    // Check if the uploads directory exists, create it if not
    if (!is_dir('./uploads/')) {
        mkdir('./uploads/');
    }

    // Retrieve form data
    $category = $this->request->getPost('category');
    $status = $this->request->getPost('status');
    
    $validation = \Config\Services::validation();
    $validation->setRules([
        'category' => 'required|string|is_unique[buscategory.category]',
        
    ]);

    // validate
    if (! $this->validate([
        'category' => 'required|string|is_unique[buscategory.category]',
        
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Build the data to be saved, assigning file paths from their respective positions or empty strings if not uploaded
    $dataToSave = [
        "category" => $this->db->escapeString($category),
        "status" => $this->db->escapeString($status)
        
    ];

    // Save record to the database using prepared statements
    $builder = $this->db->table('buscategory');
    $builder->insert($dataToSave);

    // Set flash message for success
    $this->session->setFlashdata('main_success', "Record saved successfully.");

    
    // Redirect to the yearlist page
    return redirect()->to('/buscategorylist');
}

    
    public function edit($id)
    {
        $this->permissionCheck('buscat_edit');
        $model = new BuscatModel();
        // Find the year by ID
        $data['title'] = 'व्यवशाय प्रकृति';
       $data['buscategory'] = $model->find($id);
        // return view('business/buscategory/edit', $data);
        return view('business/buscategory/edit', $data);
    }

    
    public function update($id)
{
    
    $this->permissionCheck('buscat_edit');
    // Get form data
    $category = $this->request->getPost('category');
    $status = $this->request->getPost('status');
    
    $validation = \Config\Services::validation();
    $validation->setRules([
        'category' => 'required|string|is_unique[buscategory.category]',
        
    ]);

    // validate
    if (! $this->validate([
        'category' => 'required|string|is_unique[buscategory.category]',
        
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Build the data to be updated, assigning file paths from their respective positions or existing values if not uploaded
    $dataToUpdate = [
        "category" => $this->db->escapeString($category),
        "status" => $this->db->escapeString($status)
        
    ];

    // Update the record in the database using prepared statements
   $builder = $this->db->table('buscategory');
   $builder->where('id', $id);
   $builder->update($dataToUpdate);

    // Set flash message for success
    $this->session->setFlashdata('main_success', "Record updated successfully.");

    // Redirect to the yearlist page
    return redirect()->to('/buscategorylist');
}

    
    public function delete($id)
    {
        $this->permissionCheck('buscat_delete');
        $model = new BuscatModel();
        // Delete the year from the database
        $model->delete($id);
         // Set flash message for failure
         $this->session->setFlashdata('main_success', "Record deleted Successfully.");
        return redirect()->to('/buscategorylist');
    }
}
