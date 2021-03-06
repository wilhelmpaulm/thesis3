<?php

class System_logsController extends BaseController {

    public static function createLog($target_id, $case_id, $reference_id, $action, $table){
        
        $me = Auth::user();
        $myName = $me->first_name." ".$me->last_name;
        if($target_id == $me->id){
            $myName = "";
        }
        
        System_log::create([
           "user_id" => $me->id, 
           "target_id" => $target_id, 
           "case_id" => $case_id, 
           "reference_id" => $reference_id, 
           "table" => $table, 
           "division" => Auth::user()->division, 
           "action" => $myName." ".$action, 
        ]);
    }
    
    public function getIndex() {
        
    }

    public function getCreate() {
        
    }

    public function postStore() {
        
    }

    public function getShow($id = null) {
        
    }

    public function getEdit($id = null) {
        
    }

    public function postUpdate($id = null) {
        
    }

    public function postDestroy($id = null) {
        
    }

}
