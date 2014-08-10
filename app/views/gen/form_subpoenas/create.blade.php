<?php
$chief = User::where("division", "=", Auth::user()->division)->where("job_title", "=", "Chief")->first();
$cases = Kase::where("status", "=", "Ongoing")->where("agent_id", "=", Auth::user()->id)->get();
?>

<div class="panel panel-black">
    <div class="panel-heading">
        <h3 class="panel-title">Create Subpoena</h3>
    </div>
    <form action="{{URL::to("form_subpoenas/store")}}" method="post">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-4">
                <label><span class="c-red">*</span>Location</label>
                <input type="text" name="location" class="form-control">
                <label><span class="c-red">*</span>Name</label>
                <input type="text" name="time" class="form-control">
            </div>
            <div class="col-lg-4">
                <label><span class="c-red">*</span>Date Requested</label>
                <input type="date" name="date_requested" class="form-control">
                <label><span class="c-red">*</span>Date Signed</label>
                <input type="date" name="date_signed" class="form-control">
            </div>
            <div class="col-lg-4">
                <label ><span class="c-red">*</span>Case</label>
                <select name="case_id" class="form-control">
                    @foreach($cases as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
                <label><span class="c-red">*</span>Chief</label>
                <input disabled=""  type="text" name="" class="form-control " value="{{$chief->first_name." ".$chief->last_name}}">
                <input  type="hidden" name="chief" class="form-control" value="{{$chief->id}}">
            </div>
        </div>
    </div>
    <div class="panel-footer clearfix">
        <span class="c-red">* Required</span>
        
        <span class="btn-group btn-group-sm pull-right">
            <button class="btn btn-primary">Submit</button>
        </span>
    </div>
    </form>
</div>
<!--
<div class="panel panel-black">
    <div class="panel-heading">
        <h3 class="panel-title">Subpoena</h3>
    </div>
    <div class="panel-body clearfix" style="margin: auto; position: relative">
        @include("forms.subpoena")
    </div>
    <div class="panel-footer clearfix">
        <span class="btn-group btn-group-sm pull-right">
            <button class="btn btn-success"><i class="fa fa-print"></i> Print</button>
        </span>
    </div>
    </form>
</div>-->