<?php
//$dateLoop = [];
//foreach ($cases as $co) {
//    if (!in_array($co->created_at, $dateLoop)) {
//        array_push($dateLoop, $co->created_at);
//    }
//}
$ccc = [];
//$cts = Case_type::all();

foreach ($agents as $a) {
    $ccc_sub = [];

    $agent_score = 0;
    $unfinished = 0;
    $finished = 0;
    $cases = Kase::where("agent_id", "=", $a->id)->get();
    $agent_cases = $cases;

    foreach ($cases as $c) {
        
        if ($c->status == "Closed_Unfinished" || $c->status == "Closed_Finished") {
            
            if ($c->status == "Closed_Unfinished") {
                $unfinished++;
            }if (($c->status == "Closed_Finished")) {
                $finished++;
            }
            $ctts = DB::select("SELECT * FROM case_type_tags inner JOIN case_types
                        ON case_type_tags.type_id=case_types.id where 
                        case_type_tags.case_id=?", [$c->id]);
            $case_type_sub = 0;
            $l = 0;
            foreach ($ctts as $ctt) {
                $case_type_sub += (($ctt->difficulty + $ctt->time + $ctt->manpower) / 3);
                $l++;
            }
            if ($case_type_sub != 0) {

                $case_type_sub = (($c->chief_priority + ($case_type_sub / $l)) / 2);
                if ($c->status == "Closed_Unfinished") {
                    $case_type_sub = $case_type_sub*3;
                }if (($c->status == "Closed_Finished")) {
                    $case_type_sub = $case_type_sub*5;
                }
            }
//            array_push($agent_cases, $case_type_sub);
            $agent_score += $case_type_sub;
        }
    }
    array_push($ccc_sub, $a);
    array_push($ccc_sub, $agent_score);
    array_push($ccc_sub, $cases);
    array_push($ccc_sub, $finished);
    array_push($ccc_sub, $unfinished);
    array_push($ccc, $ccc_sub);
}
//
//
//var_dump($evidence_pictures);
//rsort($dateLoop);
//var_dump($dateLoop);
?>

<div class="panel panel-black">
    <div class="panel-heading">
        <h3 class="panel-title">Agent Rankings</h3>
    </div>
    <!--<div class="panel-body" style="height:85vh; overflow: auto">-->
    <div class="panel-body" style="">
        <div class="row">
            <div class="col-lg-12">
                <div class="container ">
                    <div id="hc1" class="zoom-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Agent</th>
                            <th>Cases</th>
                            <th>Finished</th>
                            <th>Unfinished</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ccc as $cc)
                        <tr>
                            <td>{{$cc[0]->last_name}}, {{$cc[0]->first_name}}</td>
                            <td>{{count($cc[2])}}</td>
                            <td>{{round($cc[3])}}</td>
                            <td>{{round($cc[4])}}</td>
                            <td>{{round($cc[1])}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<table id="hcd1" class="hidden">
    <thead>
        <tr>
            <th>Agent</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ccc as $cc)
        <tr>
            <td>{{$cc[0]->last_name}}</td>
            <td>{{round($cc[1])}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(function() {
        chart = $('#hc1').highcharts({
            data: {
                table: document.getElementById('hcd1')
            },
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Agent Ranking'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Points'
                }
            },
//            xAxis: {
//                allowDecimals: false,
//                title: {
//                    text: 'Agent'
//                },
//            },
            plotOptions: {
                bar: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
//                        format: '<b>{point.name}</b>: <br>{point.y}'
                        format: '{point.y}'
                    },
                    showInLegend: true
                }
            }
//            tooltip: {
//                formatter: function() {
//                    return '<b>' + this.point.name + '</b><br/>' +
//                            this.point.y + ' ' + this.point.name.toLowerCase();
//                }
//            }
        });
        chart.redraw();
    });
</script>