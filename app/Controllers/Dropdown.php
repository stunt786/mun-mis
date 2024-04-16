<?php

namespace App\Controllers;
use App\Controllers\AdminBaseController;
use App\Models\CommonModel;

class Dropdown extends AdminBaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new CommonModel();;
    }

   
    public function district()
    {
        
        $provinceID = $this->request->getPost("pId");
        $districtData = $this->model->selectData("district", array("province_id" => $provinceID));

        $output = "";
        foreach ($districtData as $district) {
            $output .= "<option value='$district->id'>$district->district</option>";
        }
        // echo json_encode($output);
        echo json_encode($districtData);
    }


    public function municipality()
    {
        $districtID = $this->request->getPost("dId");
        $municipalityData = $this->model->selectData("municipality", array("district_id" => $districtID));

        $output = "<option>select Municipality</option>";
        foreach ($municipalityData as $municipality) {
            $output .= "<option value='$municipality->id'>$municipality->municipality</option>";
        }
        echo json_encode($output);
        // echo json_encode($stateData);
    }
}
