<?php

class Form_casesController extends BaseController {


    public function getAnnual() {
        $data = [
           
        ];
        
        return View::make("gen.form_cases.annual", $data);
    }
    public function postMonthly() {
        $data = [
           
        ];
        
        return View::make("gen.form_cases.monthly", $data);
    }
    
    public function getMonthly() {
        $data = [ "agents" => User::where("division", "=", Auth::user()->division)->where("job_title", "!=", "Secretary")->get()];
        
        return View::make("base.forms.open_cases_monthly", $data);
    }
    
    public function getDivision() {
        $data = [ "agents" => User::where("division", "=", Auth::user()->division)->where("job_title", "!=", "Secretary")->get()];
        
        return View::make("base.forms.open_cases_division", $data);
    }

    

    public function postDestroy($id = null) {
      
        
        return Redirect::back();
    }


}
