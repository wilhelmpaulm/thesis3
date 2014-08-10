<?php
$chief = User::where("division", "=", Auth::user()->division)->where("job_title", "=", "Chief")->first();
$agents = User::where("job_title", "!=", "Secretary")->get();
//$cases = Kase::where("status", "=", "Ongoing")->where("agent_id", "=", Auth::user()->id)->get();
$case = Kase::find(Input::get("id"));
?>
<?php $agents = User::where("division", "=", Auth::user()->division)->where("job_title", "!=", "Secretary")->where("status", "=", "Active")->get(); ?>
<?php
$coll = [];
$arrg = [];
$rankings = [
    "Special Investigator 1",
    "Special Investigator 2",
    "Special Investigator 3",
    "Special Investigator 4",
    "Agent 1",
    "Agent 2",
    "Agent 3",
    "Senior Agent",
    "Supervising Agent",
    "Head Agent",
];

function sortSuccessRatio($a, $b) {
    if ($a[1] == $b[1]) {
        return 0;
    }
    return ($a[1] < $b[1]) ? 1 : -1;
}

function sortAverageLoad($a, $b) {
    if ($a[2] == $b[2]) {
        return 0;
    }
    return ($a[2] < $b[2]) ? 1 : -1;
}

function sortSummary($a, $b) {
    if ($a[7] == $b[7]) {
        return 0;
    }
    return ($a[7] < $b[7]) ? 1 : -1;
}

//$coll contents are as follows
/*  0 => agent_id
 *  1 => case load summary
 *  2 => case success ratio
 *  3 => seniority
 * 
 */
foreach ($agents as $a) {
    $blank = [$a->id];
    //case load summary
    $cls = 0;
    //total matched cases
    $tmc = 0;
    //case success ratio
    $csr = 0;
    //seniority
    $s = 0;

    //currrent cases
    //[case_id, types, diff avg, user rating, user prio, chief prio, load ave]
    $cccc = [];


    //case success ratio computation
    foreach ($case_type_tags as $ctt) {
        $tcases = DB::select("SELECT * FROM kases inner JOIN case_type_tags
                        ON kases.id=case_type_tags.case_id where 
                        case_type_tags.type = ? and kases.agent_id=?", [$ctt->type, $a->id]);
        $tfcases = DB::select("SELECT * FROM kases inner JOIN case_type_tags
                        ON kases.id=case_type_tags.case_id where 
                        case_type_tags.type = ? and kases.status = 'Closed_Finished' and kases.agent_id=?", [$ctt->type, $a->id]);
        $csr += count($tfcases);
        $tmc += count($tcases);
    }
    $tttt2 = 0;
    //case load summary computation
    $acases = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Ongoing")->get();
    foreach ($acases as $ac) {
        $caray = [];
        array_push($caray, $ac->id);

//        $ctts = Case_type_tag::where("case_id", "=", $ac->id)->get();
        $ctts = DB::select("SELECT * FROM case_type_tags JOIN case_types
                        ON case_type_tags.type=case_types.type where 
                        case_type_tags.case_id = ?", [$ac->id]);
        $caseTypeString = "";
        $tttt = 0;
//        var_dump($ctts)   ;
        foreach ($ctts as $ctt) {
            $caseTypeString .= $ctt->type . ", ";
//            print_r($ctt);
            $tttt += (($ctt->difficulty + $ctt->time + $ctt->manpower) / 3);
        }

        $tttt = ($tttt / count($ctts));

        array_push($caray, $caseTypeString);
        array_push($caray, $tttt);
        array_push($caray, $ac->user_rating);
        array_push($caray, $ac->user_priority);
        array_push($caray, $ac->chief_priority);
        //considers user rating
//        $tttt = (($tttt + $ac->user_rating) / 2);
        //consider priority status
        $tttt2 += (($tttt + $ac->user_rating + $ac->user_priority + $ac->chief_priority) / 4);
        array_push($caray, (($tttt + $ac->user_rating + $ac->user_priority + $ac->chief_priority) / 4));
        array_push($cccc, $caray);
    }

    $tncases = $acases->count();
    $sr = 0;
    $lo = 0;
    //success ratio
    if ($tmc != 0) {
        $sr = round(($csr / $tmc) * 10, 2);
        array_push($blank, round(($csr / $tmc) * 10, 2));
    } else {
        array_push($blank, 0);
    }

    //load of the user
    if ($tncases != 0) {
//        $lo = round($tttt2 / $tncases, 2);
        $lo = round($tttt2, 2);
        array_push($blank, round($tttt2, 2));
    } else {
        array_push($blank, 0);
    }

    //successful cases
    array_push($blank, $csr);
    //total related cases
    array_push($blank, $tmc);
    //total cases of an agent ongoing
    array_push($blank, $tncases);
    array_push($blank, $cccc);


    $rankscore = 0;
    for ($index = 0; $index < count($rankings); $index++) {
        if ($a->rank == $rankings[$index]) {
            $rankscore = $index + 1;
        }
    }
    array_push($blank, ($rankscore + ($sr * 10)) - $lo);
    //consider ranking
    array_push($blank, $rankscore);

    //[user_id, success ratio, load, finished cases, total related, ongoing, cccc, total, ranking]
    array_push($coll, $blank);
}
?>


<div class="panel panel-black">
    <div class="panel-heading">
        <h3 class="panel-title">Create Coordination Form</h3>
    </div>
    <form action="{{URL::to("form_coordinations/store")}}" method="post">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4">
                    <label><span class="c-red">*</span>Location</label>
                    <textarea type="text" name="area" class="form-control" rows="4" cols="20"></textarea>
                </div>
                <div class="col-lg-4">
                    <label><span class="c-red">*</span>Time</label>
                    <input type="time" name="time" class="form-control">
                    <label><span class="c-red">*</span>Date </label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="col-lg-4">
                    <label ><span class="c-red">*</span>Case</label>
                    <select name="case_id" class="form-control">
                        <option value="{{$case->id}}">{{$case->name}}</option>
                    </select>
                </div>
            </div>
            <hr>
            <span class="c-red">*</span>MEMBERS
            <div class="row">
                <div class="col-lg-12">
                    <table class="table  table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    
                                    NBI Agents
                                    
                                    <button class=" pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                                        Division Agent Summary
                                    </button>
                                </th>
                              
                            </tr>
                        </thead>
                        <tbody id="">
                            <tr>
                                <td>
                                    <select name="nbi_agent[]" class="selectpicker form-control " multiple data-live-search="true" multiple data-selected-text-format="count">
                                        @foreach($agents as $a)
                                        <option value="{{$a->id}}">{{$a->job_title}} - {{$a->first_name}} {{$a->last_name}}</option>
                                        @endforeach
                                    </select>

                                </td>
                            </tr>    
                        </tbody>
                    </table>

                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-condensed table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Agency</th>
                                <th>Name</th>
                                <th width='10%'>
                                    <span class="btn-group btn-group-sm">
                                        <button  class="btn btn-success " id="members_add" type="button"><i class="fa fa-plus"></i></button>
                                    </span> 
                                </th>
                            </tr>
                        </thead>
                        <tbody id="members_body">

                        </tbody>
                    </table>

                </div>

            </div>

            <hr>
            <span class="c-red">*</span>VEHICLES
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-condensed table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Vehicle</th>
                                <th>Model</th>
                                <th>Color</th>
                                <th>Plate Number</th>
                                <th width='10%'>
                                    <span class="btn-group btn-group-sm">
                                        <button  class="btn btn-success " id="vehicles_add" type="button"><i class="fa fa-plus"></i></button>
                                    </span> 
                                </th>
                            </tr>
                        </thead>
                        <tbody id="vehicles_body">

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
        <div class="panel-footer clearfix">
            <span class="c-red">* Required</span>
            <span class="btn-group btn-group-sm pull-right">
                <button class="btn btn-primary" type="">Submit</button>
            </span>
        </div>
    </form>
</div>



<div class="hidden">
    <div >
        <table>
            <thead>

            </thead>
            <tbody id="members_item">
                <tr>
                    <td>
                        <input name="agency[]" type="text" class="form-control" placeholder="Agency ">
                    </td>
                    <td>

                        <input name="name[]" type="text" class="form-control" placeholder="Name of agent">
                    </td>
                    <td>
                        <span class="btn-group btn-group-sm">
                            <button class="btn btn-danger remove" type="button"><i class="fa fa-trash-o"></i></button>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div >
        <table>
            <thead>

            </thead>
            <tbody id="vehicles_item">
                <tr>
                    <td>
                        <input name="vehicle[]" type="text" class="form-control" placeholder="Vehicle">
                    </td>
                    <td>
                        <input name="model[]" type="text" class="form-control" placeholder="Model">
                    </td>
                    <td>
                        <input name="color[]" type="text" class="form-control" placeholder="Color">
                    </td>
                    <td>

                        <input name="plate_no[]" type="text" class="form-control" placeholder="Plate Number">
                    </td>
                    <td>
                        <span class="btn-group btn-group-sm">
                            <button class="btn btn-danger remove" type="button"><i class="fa fa-trash-o"></i></button>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>


<script>
    $("#members_add").on("click", function() {
        var x = $("#members_item").html();
        $("#members_body").append(x);
    });
    $("#vehicles_add").on("click", function() {
        var x = $("#vehicles_item").html();
        $("#vehicles_body").append(x);
    });

    $("body").on("click", ".remove", function() {
        $(this).parent().parent().parent().remove();
    });

</script>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Agent Details</h4>
        </div>
        <div class="modal-body">
                <div  id="agent_list" class="list-group" >
                    <div class="list-group-item ">
                        <div class="input-group custom-search-form input-group-sm">
                            <input type="text" class="search form-control " placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default sort" type="button" data-sort="list_name">
                                    <i class="fa fa-sort-alpha-asc"></i>
                                </button>
                                <button class="btn btn-success sort" type="button" data-sort="list_csr">
                                    <i class="fa fa-sort"></i>
                                </button>
                                <button class="btn btn-warning sort" type="button" data-sort="list_cla">
                                    <i class="fa fa-sort"></i>
                                </button>
                                <button class="btn btn-primary sort" type="button" data-sort="list_r">
                                    <i class="fa fa-sort"></i>
                                </button>
                            </span>

                        </div>
                    </div>

                    <div style="height:60vh; overflow-y:auto">

                        <ul class="list list-unstyled    ">
                            <?php usort($coll, "sortSummary"); ?>
                            @foreach($coll as $c)
                            <?php $a = User::find($c[0]); ?>
                            <li><a  id=""  class="list-group-item c_link">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <img src="{{URL::asset('nbi/agent/picture/'.$a->file_picture)}}" width="100%" class="img img-thumbnail">
                                            <hr>  
                                            <div style="overflow-x: auto; overflow-y: hidden">
                                                <p class="label label-primary ">{{$a->id}}</p>
                                                <p class="label label-default list_details">{{$a->job_title}}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <table class="table table-bordered table-condensed">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            <p class="list-group-item-heading list_name "><strong>{{$a->last_name.", ".$a->first_name}}</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><small>Case Success Ratio</small></p>
                                                        </td>
                                                        <td>
                                                            <p class="label label-success list_csr">{{$c[1]}} %</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><small>Case Load Average</small></p>


                                                        </td>
                                                        <td>
                                                            <p class="label label-warning list_cla">{{$c[2]}}</p>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><small>{{$a->rank}}</small></p>


                                                        </td>
                                                        <td>
                                                            <p class="label label-primary list_r">{{$c[8]}}</p>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        <!--<p class=" list_created_at text-muted">{{$a->created_at}}</p>-->
                                        </div>
                                    </div>

                                </a></li>
                            @endforeach
                        </ul>

                    </div>

                </div>
        </div>
        <div class="modal-footer">
            <span class="btn-group btn-group-sm ">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </span>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->
<script>
        var options = {
            valueNames: ['list_name', 'list_created_at', 'list_details', 'list_csr', 'list_cla', 'list_r']
        };

        var agentList = new List('agent_list', options);


    </script>