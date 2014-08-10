<?php
$chief = User::where("division", "=", Auth::user()->division)->where("job_title", "=", "Chief")->first();
$cases = Kase::where("status", "=", "Ongoing")->where("agent_id", "=", Auth::user()->id)->get();
?>
<div class="row ">

    <div class="col-lg-12">
        <div class="panel panel-black">
            <div class="panel-heading">
                <h3 class="panel-title">Case Details</h3>
            </div>
            <form action="{{URL::to(strtolower(Auth::user()->job_title)."/form-transmital")}}" method="post">
                <div class="panel-body">
                    <h5>Select Case</h5>

                    <label ><span class="c-red">*</span>Case</label>
                    <select name="id" class="form-control">
                        @foreach($cases as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="panel-footer clearfix">
                    <span class="btn-group btn-group-sm pull-right">
                        <button class="btn btn-primary" type="">Submit</button>
                    </span>
                </div>
            </form>
        </div>
    </div>



</div>
