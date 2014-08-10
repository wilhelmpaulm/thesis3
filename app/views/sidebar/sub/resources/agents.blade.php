<?php // $agents = User::where("division", "=", Auth::user()->division)->where("job_title", "!=", "Secretary")->where("status", "=", "Active")->get();      ?>
<?php $date = new DateTime() ?>

<?php
//$agents = DB::select("select * from users join resource_histories on users.id = resource_histories.user_id");
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
$alist = [];
foreach ($agents as $a) {
    if (!in_array($a->user_id, $alist)) {
        array_push($alist, $a->user_id);
    }
}

//
//function sortSuccessRatio($a, $b) {
//    if ($a[1] == $b[1]) {
//        return 0;
//    }
//    return ($a[1] < $b[1]) ? 1 : -1;
//}
//
//function sortAverageLoad($a, $b) {
//    if ($a[2] == $b[2]) {
//        return 0;
//    }
//    return ($a[2] < $b[2]) ? 1 : -1;
//}
//
//function sortSummary($a, $b) {
//    if ($a[7] == $b[7]) {
//        return 0;
//    }
//    return ($a[7] < $b[7]) ? 1 : -1;
//}
//$coll contents are as follows
/*  0 => agent_id
 *  1 => case load summary
 *  2 => case success ratio
 *  3 => seniority
 * 
 */
foreach ($alist as $al) {
    $a = User::find($al);

    $blank = [$a->id];

    //seniority
    $s = 0;
    //pending
    $pending = 0;
    //approved
    $approved = 0;
    //rlate
    $rlate = 0;
    //rearly
    $rearly = 0;
    //rontime
    $rontime = 0;
    //onhand
    $onhand = 0;
    foreach ($agents as $aa) {

        if ($aa->user_id == $a->id)
            if ($aa->date_approved != "") {
                $approved++;

                if ($aa->date_returned != "" && $aa->date_issued != "") {
                    if ($aa->date_due > $aa->date_returned) {
                        $rearly++;
                    }
                    if ($aa->date_due < $aa->date_returned) {
                        $rlate++;
                    }
                    if ($aa->date_due == $aa->date_returned) {
                        $rontime++;
                    }
                }
                if ($aa->date_returned == "" && $aa->date_issued != "" && ($aa->date_due > $date->format("Y-m-d"))) {
                    if ($aa->date_returned == "") {
                        $onhand++;
                    }
                }
            }
        if ($aa->date_approved == "") {
            $pending++;
        }
    }




    $rankscore = 0;
    for ($index = 0; $index < count($rankings); $index++) {
        if ($a->rank == $rankings[$index]) {
            $rankscore = $index + 1;
        }
    }
//consider ranking
    array_push($blank, $rankscore);
    $blank[2] = $rlate;
    $blank[3] = $rontime;
    $blank[4] = $rearly;
    $blank[5] = $pending;
    $blank[6] = $approved;
    $blank[7] = $onhand;
//   [0     1        2      3        4      5        6         7]
//[user_id, ranking, late, ontime, early, pending, approved, onhand]
    array_push($coll, $blank);
}
?>



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
            <?php // usort($coll, "sortSummary");    ?>
            @foreach($coll as $c)
            <?php $a = User::find($c[0]); ?>
            <li><a  id="" class="list-group-item c_link">
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
                                            <p class="label label-success list_csr"> %</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><small>Case Load Average</small></p>


                                        </td>
                                        <td>
                                            <p class="label label-warning list_cla">{{$c[0]}}</p>

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


<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->


















<script>
    var options = {
        valueNames: ['list_name', 'list_created_at', 'list_details', 'list_csr', 'list_cla', 'list_r']
    };

    var agentList = new List('agent_list', options);


</script>

























<script>
    $("table").dataTable();
</script>