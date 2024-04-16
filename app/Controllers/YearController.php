<?php

namespace App\Controllers;

use App\Controllers\AdminBaseController;

use App\Models\YearModel;

class YearController extends AdminBaseController
{
    protected $db;
    protected $model;
    protected $session;
    protected $request;
        
    public function __construct(){
        $this->db = db_connect();
        $this->model= new YearModel();
        $this->session = session();
        $this->request =  \Config\Services::request();
        
    }
    public function addYear()
    {
        // Check if the user is authenticated (you might want to use a middleware for this)
            $this->permissionCheck('year_add');
            $data['title'] = 'Year Page';
            return view('year/create', $data); 
    }
    public function yearlist()
    {
        $this->permissionCheck('year_list');
        $model = new YearModel();
        $data['title'] = "आर्थिक वर्ष";
        $data['years'] = $model->findAll(); // Retrieve all users from the database
        return view('year/yearlist', $data); // Load view with user data
    }
        
    public function year()
{
    $this->permissionCheck('year_add');    
    // Retrieve form data
    $year = $this->request->getPost('year');
    $active = $this->request->getPost('active');
    
    // Get logged-in user ID
    $userId = $this->session->get('logged')['id'];

    $validation = \Config\Services::validation();
    $validation->setRules([
        'year' => 'required|is_unique[years.year]|regex_match[/^\d{4}\/\d{3}$/]',
        
    ]);

    // validate
    if (! $this->validate([
        'year' => 'required|is_unique[years.year]|regex_match[/^\d{4}\/\d{3}$/]',
        
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    // Build the data to be saved, assigning file paths from their respective positions or empty strings if not uploaded
    $dataToSave = [
        "year" => $this->db->escapeString($year),
        "active" => $this->db->escapeString($active) ,
        "user_id" => $userId       
    ];

    // Save record to the database using prepared statements
    $builder = $this->db->table('years');
    $builder->insert($dataToSave);

    // Set flash message for success
    $this->session->setFlashdata('main_success', "Record Saved successfully.");

    
    // Redirect to the yearlist page
    return redirect()->to('/yearlist')->with('notifySuccess', "Record Saved Successfully ");
}

    
    public function edit($id)
    {
        $this->permissionCheck('year_edit');   
       
         // Find the year by ID
         $data['title'] = 'आर्थिक वर्ष';
         $data['year'] = $this->model->find($id);
        // Load the edit view with the year data
        return view('year/edit', $data);
    }

    
    public function update($id)
{
    
    $this->permissionCheck('year_edit');   
    // Get form data
    $year = $this->request->getPost('year');
    $active = $this->request->getPost('active');
    
     // Get logged-in user ID
     $userId = $this->session->get('logged')['id'];

     $validation = \Config\Services::validation();
     $validation->setRules([
         'year' => 'required|regex_match[/^\d{4}\/\d{3}$/]',
         
     ]);
 
     // validate
     if (! $this->validate([
         'year' => 'required|regex_match[/^\d{4}\/\d{3}$/]',
         
     ])) {
         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
     }
    // Build the data to be updated, assigning file paths from their respective positions or existing values if not uploaded
    $dataToUpdate = [
        "year" => $this->db->escapeString($year),
        "active" => $this->db->escapeString($active),
        "edited_by" => $userId,
        
    ];

   // Update the record in the database using prepared statements
   $builder = $this->db->table('years');
   $builder->where('id', $id);
   $builder->update($dataToUpdate);

    // Set flash message for success
    $this->session->setFlashdata('main_success', "Record updated successfully.");

    // Redirect to the yearlist page
    return redirect()->to('/yearlist');
}

    public function delete($id)
    {
        $this->permissionCheck('year_delete');   
        // Delete the year from the database
        $this->model->delete($id);

        // Set flash message for success
    $this->session->setFlashdata('main_success', "Record deleted successfully.");

        return redirect()->to('/yearlist');
    }
}
