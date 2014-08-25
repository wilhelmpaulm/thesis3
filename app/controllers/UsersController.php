<?php

class UsersController extends BaseController {

    public function postStatus($id = null) {
        if(Hash::check(Input::get("password"), Auth::user()->password) && $id!= Auth::user()->id){
        $u = User::find($id);
        $u->status = Input::get("status");
        $u->save();
        }
//        System_logsController::createLog($target_id, $case_id, $reference_id, $action, "users");
        System_logsController::createLog($u->id, 0, 0, "has edited your status to ".$u->status, "users");
        System_logsController::createLog(Auth::user()->id, 0, 0, "has edited your the status of ".$u->first_name." ".$u->last_name." please reassign his pending cases.", "users");
        return Redirect::back();
    }

}
