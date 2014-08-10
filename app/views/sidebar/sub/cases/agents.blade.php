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


<div class="row">
    <div class="col-md-3">
        <div class="panel panel-black">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users"></i> {{Auth::user()->division}} Agents</h3>
            </div>
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
                        <li><a  id="" data-toggle="modal" data-target="#agent_details_{{$a->id}}" class="list-group-item c_link">
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
    </div>


    @foreach($agents as $a)
    <?php
    $contacts = User_contact::where("user_id", "=", $a->id)->get();
    $languages = User_language::where("user_id", "=", $a->id)->get();
//$ucs_similar = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Ongoing")->get();
    $ucs_ongoing = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Ongoing")->get();
    $ucs_nonviable = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Non-viable")->get();
    $ucs_pending = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Pending")->get();
    $ucs_unfinished = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Closed_Unfinished")->get();
    $ucs_finished = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Closed_Finished")->get();
    $ucs = Kase::where("agent_id", "=", $a->id)->where("status", "!=", "Pending")->get();

    $criteria = [
        "agent_id" => $a->id,
        "cases_held" => $ucs->count(),
        "cases_ongoing" => $ucs_ongoing->count(),
        "cases_finished" => $ucs_finished->count(),
    ];
    $cases_held = $ucs->count();

    array_push($aCom, $criteria);
    ?>
    <div class="modal fade container" id="agent_details_{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">{{$a->last_name.", ".$a->first_name}}</h4>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#home{{$a->id}}" data-toggle="tab">Profile</a></li>
                    <li><a href="#messages{{$a->id}}" data-toggle="tab">Case Status Summary</a></li>
                    <li><a href="#settings{{$a->id}}" data-toggle="tab">Case Breakdown</a></li>
                </ul>
                <hr>
                <!-- Tab panes -->
                <div class="tab-content">




                    <?php
                    $case_types = Case_type::all();
                    ?>



                    <?php
                    $case_nums = [];
                    $agent_cases = Kase::where("agent_id", "=", $a->id)->where("status", "!=", "Pending")->get();
                    $ongoing_cases = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Ongoing")->get();
                    $nonviable_cases = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Non-viable")->get();
                    $unfinished_cases = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Closed_Unfinished")->get();
                    $finished_cases = Kase::where("agent_id", "=", $a->id)->where("status", "=", "Closed_Finished")->get();

                    foreach ($agent_cases as $ac) {
                        if (!in_array($ac->id, $case_nums)) {
                            array_push($case_nums, $ac->id);
                        }
                    }
                    ?>

                    <div class="tab-pane" id="settings{{$a->id}}">
                        <div class="row">
                            <div class="col-md-12 " >


                                <table id="3datatable{{$a->id}}" class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <!--<th>total</th>-->
                                            <th>Ongoing</th>
                                            <th>Non-viable</th>
                                            <th>Finished</th>
                                            <th>Unfinished</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($case_types as $ct)
                                        <?php
                                        $num = 0;
                                        $ongoing = 0;
                                        $nonviable = 0;
                                        $finished = 0;
                                        $unfinished = 0;
                                        foreach ($case_nums as $cn) {
                                            $case_tag = Case_type_tag::where("case_id", "=", $cn)->first();
                                            if ($case_tag->type == $ct->type) {
                                                $cas = Kase::find($cn);
                                                $num++;


                                                if ($cas->status == "Ongoing") {
                                                    $ongoing++;
                                                }
                                                if ($cas->status == "Non-viable") {
                                                    $nonviable++;
                                                }
                                                if ($cas->status == "Closed_Unfinished") {
                                                    $unfinished++;
                                                }
                                                if ($cas->status == "Closed_Finished") {
                                                    $finished++;
                                                }
                                            }
                                        }
                                        ?>
                                        @if($num!= 0)
                                        <tr>
                                            <th>{{$ct->type}}</th>
                                            <!--<td>{{$num}}</td>-->
                                            <td>{{$ongoing}}</td>
                                            <td>{{$nonviable}}</td>
                                            <td>{{$finished}}</td>
                                            <td>{{$unfinished}}</td>
                                        </tr>
                                        @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <hr>
                            <br>
                            <br>
                            @if($agent_cases->count() != 0)
                            <div id="3container{{$a->id}}" class="zoom-100" style="margin-left: 15%"></div>
                            @else
                            <div class="text-center lead">
                                <p>No cases found</p>
                            </div>
                            @endif



                        </div>




                    </div>



                    <div class="tab-pane" id="messages{{$a->id}}">

                        <div class="row ">
                            <div class="col-md-12">
                                <table id="datatable{{$a->id}}" class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Number of cases</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Ongoing</th>
                                            <td>{{$ongoing_cases->count()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Finished</th>
                                            <td>{{$finished_cases->count()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Unfinished</th>
                                            <td>{{$unfinished_cases->count()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Non-viable</th>
                                            <td>{{$nonviable_cases->count()}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <!--style="min-width: 310px; height: 400px; margin: 0 auto"-->

                                @if($agent_cases->count() != 0)
                                <div id="container{{$a->id}}" class="zoom-100" style="margin-left: 15%"></div>
                                @else
                                <div class="text-center lead">
                                    <p>No cases found</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>





                    <script>


                        $(function() {
                            $('#container{{$a->id}}').highcharts({
                                data: {
                                    table: document.getElementById('datatable{{$a->id}}')
                                },
                                chart: {
                                    type: 'pie'
                                },
                                title: {
                                    text: 'Case Type Status'
                                },
                                yAxis: {
                                    allowDecimals: false,
                                    title: {
                                        text: 'Number of cases'
                                    }
                                },
                                plotOptions: {
                                    pie: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        dataLabels: {
                                            enabled: true,
                                            color: '#000000',
                                            connectorColor: '#000000',
                                            format: '<b>{point.name}</b>: <br>{point.y}'
                                        },
                                        //                    startAngle: -90,
                                        //                    endAngle: 90,
                                        //                    center: ['50%', '75%'],
                                        showInLegend: true
                                    }
                                },
                                tooltip: {
                                    formatter: function() {
                                        return '<b>' + this.series.name + '</b><br/>' +
                                                this.point.y + ' ' + this.point.name.toLowerCase();
                                    }
                                }
                            });
                        });

                        $(function() {
                            $('#3container{{$a->id}}').highcharts({
                                data: {
                                    table: document.getElementById('3datatable{{$a->id}}')
                                },
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Case Status and Type Combination'
                                },
                                yAxis: {
                                    allowDecimals: false,
                                    title: {
                                        text: 'Number of Cases'
                                    }
                                },
                                plotOptions: {
                                    pie: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        dataLabels: {
                                            enabled: true,
                                            color: '#000000',
                                            connectorColor: '#000000',
                                            format: '<b>{point.name}</b>: <br>{point.y}'
                                        },
//                    startAngle: -90,
//                    endAngle: 90,
//                    center: ['50%', '75%'],
                                        showInLegend: true
                                    }
                                },
                                tooltip: {
//                formatter: function() {
//                    return '<b>' + this.series.name + '</b><br/>' +
//                            this.point.y + ' ' + this.point.name.toLowerCase();
//                }

                                    shared: true
                                }
                            });
                        });



                        //$("table").dataTable();
                    </script>



                    <div class="tab-pane active" id="home{{$a->id}}">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="{{URL::asset('nbi/agent/picture/'.$a->file_picture)}}" width="85%" class="img img-thumbnail">
                            </div>
                            <div class="col-lg-3">
                                <strong>Name</strong>
                                <p>{{$a->last_name.", ".$a->first_name." ".$a->middle_name}}</p>
                                <strong>ID Number</strong>
                                <p>{{$a->id}}</p>
                                <strong>Contacts</strong>
<!--                                <p> 639279655572</p>
                                <p> 025613793</p>-->
                                <!--<p> untalan.kier@nbi.ph</p>-->


                                @foreach($contacts as $ccc)
                                @if($ccc->type == "Email")<p class=""><i class="fa fa-envelope"></i> 
                                    @elseif($ccc->type == "Mobile")<p class=""><i class="fa fa-phone"></i> 
                                    @endif {{$ccc->contact}}</p>
                                @endforeach
                            </div>
                            <div class="col-lg-2">
                                <strong>Division</strong>
                                <p>{{$a->division}}</p>
                                <strong>Position</strong>
                                <p>{{$a->job_title}}</p>
                                <strong>Rank</strong>
                                <p>{{$a->rank}}</p>
                                <strong>Date Hired</strong>
                                <p>{{$a->date_hired}}</p>
                            </div>
                            <div class="col-lg-3 hidden">
                                <strong>Educational Background</strong>
                                <p>De la Salle University  - BS Accountancy</p>
                                <p>Ateneo De Manila University - Law</p>
                                <strong>Case Types Commonly Handled</strong>
                                <p>Rape, Murder, Suicide</p>
                                <strong>Languages Spoken</strong>
                                <p>Filipino, Hungarian, French, German</p>


                            </div>
                            <!--                            <div class="col-lg-3">
                                                            <h4>Languages Spoken</h4>
                                                            @foreach($languages as $l)
                                                            <p class="">- {{$l->language}}</p>
                                                            @endforeach
                            
                                                        </div>-->

                        </div>
                    </div>













                </div>



            </div>
            <div class="modal-footer">
                <form action="{{URL::to('cases/assign/'.$case->id)}}" method="POST">
                    <input type="hidden" value="{{$a->id}}" name="agent_id">
                    <span class="btn-group btn-group-sm ">
                        <button  class="btn btn-primary">Assign Case</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </span>
                </form>
            </div>
        </div>
    </div>
    @endforeach



















    <script>
        var options = {
            valueNames: ['list_name', 'list_created_at', 'list_details', 'list_csr', 'list_cla', 'list_r']
        };

        var agentList = new List('agent_list', options);


    </script>
    <div class="col-lg-9">

        <div class="panel panel-black">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list-ul"></i> Assignment Summary</h3>
            </div>

            <br>
            <ul class="nav nav-tabs nav-justified">
                <li class=""><a href="#home" data-toggle="tab">Case Success Ratio</a></li>
                <li class="active"><a href="#profile" data-toggle="tab">Current Case Load Average</a></li>
            </ul>
            <br>
            <div class="panel-body" style="height:70vh; overflow-y:auto">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane " id="home">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Agent</th>
                                    <th>Related Cases Solved</th>
                                    <th>Related Cases Handled</th>
                                    <th>Case Success Ratio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php usort($coll, "sortSuccessRatio"); ?>
                                @foreach($coll as $co)
<?php $a = User::find($co[0]) ?>
                                <tr>
                                    <td>{{$a->last_name}}</td>
                                    <td>{{$co[3]}}</td>
                                    <td>{{$co[4]}}</td>
                                    <td>{{$co[1]}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>     
                    </div>
                    <div class="tab-pane active" id="profile">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Agent</th>
                                    <th>Case ID</th>
                                    <th width="20%">Case Type</th>
                                    <th>Difficulty Average</th>
                                    <th>User Rating</th>
                                    <th>User Priority</th>
                                    <th>Chief Priority</th>
                                    <th>Current Load Average</th>
                                </tr>
                            </thead>
                            <tbody>
<?php usort($coll, "sortAverageLoad"); ?>
                                <!--//[case_id, types, diff avg, user rating, user prio, chief prio, load ave]-->
                                @foreach($coll as $co)
<?php $a = User::find($co[0]) ?>
                                <tr>
                                    <td>{{$a->last_name}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach($co[6] as $cc)
                                <tr>
                                    <td></td>
                                    <td>{{$cc[0]}}</td>
                                    <td>{{$cc[1]}}</td>
                                    <td>{{round($cc[2], 2)}}</td>
                                    <td>{{$cc[3]}}</td>
                                    <td>{{$cc[4]}}</td>
                                    <td>{{$cc[5]}}</td>
                                    <td>{{round($cc[6],2)}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Current Load Average</td>
                                    <td>{{$co[2]}}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>  




                    </div>

                </div>
            </div>


        </div>
    </div>
</div>


























<script>
    $("table").dataTable();
</script>