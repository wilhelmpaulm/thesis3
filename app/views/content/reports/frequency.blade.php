<?php
$date = new DateTime();
$year = $date->format("Y");
if (Input::get("year") != "") {
    $year = Input::get("year");
}
$cttt = Case_type::all();
//$date2 = new DateTime($c->date);
$selection = ["Rape", "Murder", "Robbery"];
if(Input::get("tys") != null){
    $selection = Input::get("tys");
    
}
//else{
//    $selection = [];
//}
    
//foreach (Input::get("tys[]") as $value) {
//    echo $value;
//}
//var_dump(Input::get("tys"));

$user_division = Auth::user()->division;
$types = [];
$coll = [];
$fin = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

$cases = DB::select("select * from case_type_tags join kases on kases.id = case_type_tags.case_id "
                . "where kases.division = ? ", [$user_division]);

foreach ($cases as $c) {
    if (!in_array($c->type, $types)) {
        array_push($types, $c->type);
    }
}
sort($types);

foreach ($types as $t) {
    if (in_array($t, $selection)) {
        $tt = [];
        $sub = 0;
        array_push($tt, $t);
        $dates = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($cases as $c) {
            if ($c->type == $t) {
                if (date("m", strtotime($c->date_assigned)) == "01") {
                    $fin[0] = $fin[0] + 1;
                    $dates[0] = $dates[0] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "02") {
                    $fin[1] = $fin[1] + 1;
                    $dates[1] = $dates[1] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "03") {
                    $fin[2] = $fin[2] + 1;
                    $dates[2] = $dates[2] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "04") {
                    $fin[3] = $fin[3] + 1;
                    $dates[3] = $dates[3] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "05") {
                    $fin[4] = $fin[4] + 1;
                    $dates[4] = $dates[4] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "06") {
                    $fin[5] = $fin[5] + 1;
                    $dates[5] = $dates[5] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "07") {
                    $fin[6] = $fin[6] + 1;
                    $dates[6] = $dates[6] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "08") {
                    $fin[7] = $fin[7] + 1;
                    $dates[7] = $dates[7] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "09") {
                    $fin[8] = $fin[8] + 1;
                    $dates[8] = $dates[8] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "10") {
                    $fin[9] = $fin[9] + 1;
                    $dates[9] = $dates[9] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "11") {
                    $fin[10] = $fin[10] + 1;
                    $dates[10] = $dates[10] + 1;
                    $sub++;
                } else if (date("m", strtotime($c->date_assigned)) == "12") {
                    $fin[11] = $fin[11] + 1;
                    $dates[11] = $dates[11] + 1;
                    $sub++;
                }
            }
        }
        $fin[12] = $fin[12] + $sub;
        array_push($tt, $dates);
        array_push($tt, $sub);
        array_push($coll, $tt);
    }
}

//foreach($cases as $c){
//    
//}
?>

<div class="panel panel-black">
    <div class="panel-heading">
        <h3 class="panel-title">Agent Rankings</h3>
    </div>
    <!--<div class="panel-body" style="height:85vh; overflow: auto">-->
    <div class="panel-body" style="">
        <div class="row">
            <div class="col-lg-12">
                <div class=" ">
                    <form>
                        <label>Case Types</label>
                        <select name="tys[]" class="selectpicker form-control " multiple data-live-search="true" multiple>
                        @foreach($cttt as $ct)
                        <option value="{{$ct->type}}">{{$ct->type}}</option>
                        @endforeach
                    </select>
                        <br>
                        <br>
                        <span class="btn-group btn-group-sm pull-right">
                            <button  class="btn btn-primary ">send</button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <br>
        @if($selection!=null)
        <div class="row">
            <div class="col-lg-12">
                <div class=" ">
                    <div id="hc1" class="zoom-100" style=" z-index: 888">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-striped"  id="hcd1"  style="width: 100%; text-align: center;">
                    <thead>
                        <!--                       
                                                <tr>
                                                    <th>TYPE</th>
                                                    <th>JAN</th>
                                                    <th>FEB</th>
                                                    <th>MAR</th>
                                                    <th>APR</th>
                                                    <th>MAY</th>
                                                    <th>JUN</th>
                                                    <th>JUL</th>
                                                    <th>AUG</th>
                                                    <th>SEP</th>
                                                    <th>OCT</th>
                                                    <th>NOV</th>
                                                    <th>DEC</th>
                                                    
                                                </tr>-->
                        <tr>
                            <th></th>
                            @foreach($coll as $c)
                            <th>{{$c[0]}}</th>

                            @endforeach
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td>JAN</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][0]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>FEB</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][1]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>MAR</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][2]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>APR</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][3]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>MAY</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][4]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>JUN</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][5]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>JUL</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][6]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>AUG</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][7]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>SEP</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][8]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>OCT</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][9]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>NOV</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][10]}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>DEC</td>
                            @foreach($coll as $cs)
                            <td>{{$cs[1][11]}}</td>
                            @endforeach
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>

<table class="hidden">
    <thead>
        <tr>
            <th>0</th>
            <th>a</th>
            <th>b</th>
            <th>c</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td>15</td>
            <td>4</td>
            <td>65</td>
        </tr>
        <tr>
            <td></td>
            <td>234</td>
            <td>12</td>
            <td>10</td>
        </tr>
        <tr>
            <td></td>
            <td>8</td>
            <td>12</td>
            <td>65</td>
        </tr>
        <tr>
            <td></td>
            <td>100</td>
            <td>12</td>
            <td>200</td>
        </tr>
    </tbody>
</table>

<script>
    $(function() {
        chart = $('#hc1').highcharts({
            data: {
                table: document.getElementById('hcd1')
            },
            chart: {
                type: 'line'
            },
            title: {
                text: 'Case Type Frequency'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Frequency'
                }
            },
            xAxis: {
                allowDecimals: false,
                title: {
                    text: 'Months'
                },
//                 categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
//                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            plotOptions: {
                bar: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        format: '<b>{point.name}</b>: <br>{point.y}'
//                        format: '{point.y}'
                    },
                    showInLegend: true
                }
            },
            tooltip: {
//                headerFormat: '<span style="font-size:20px">{point.key}</span><div style="overflow:auto; height:30vh; width:20vh"><table class="table table-bordered">',
//                pointFormat: '<tr ><td style="color:{series.color};padding:0">{series.name}: </td>' +
//                        '<td width="50" style="padding:0" class="chz"><b>{point.y}</b></td></tr>',
//                footerFormat: '</table></div>',
//               
                shared: true,
                useHTML: true
            }

//            tooltip: {
//                formatter: function() {
//                    return '<b>' + this.point.name + '</b><br/>' +
//                            this.point.y + ' ' + this.point.name.toLowerCase();
//                }
//            }
        });


//        chart.redraw();
         $('.selectpicker').selectpicker();
    });


</script>