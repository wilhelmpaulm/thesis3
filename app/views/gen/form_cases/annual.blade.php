<?php
$date = new DateTime();
$year = $date->format("Y");
if(Input::get("year") != ""){
$year = Input::get("year");
}
//$date2 = new DateTime($c->date);
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

//foreach($cases as $c){
//    
//}
?>


<html>
    <title>
        Annual Division Case Count Report ({{$year}})
    </title>
    <style>
        .indent {
            padding-left: 30px;
        }
    </style>
    <!--{{HTML::style("css/bootstrap.min.css")}}-->
    <body>
        <div style="width: 680px; margin-left: 40px; background: white" class="">
            <br>
            <div style="display: inline-block; margin: 20px" >
                <img  src="{{URL::asset('nbi/forms/images/nbi_header.png')}}" height="90" width="380" style=" float: left">
                <div style="display: block; float: right; padding-left: 120px">
                    <!--COORDINATION <br>FORM # {{$c->id}}<br>-->
                    DATE: {{$date->format("m/d/Y")}}
                </div>
            </div>




            <div style="margin:15px">

                <h3 style="text-align: center">ANNUAL DIVISION CASE COUNT REPORT ({{$year}})</h3>
                <h3 style="text-align: center">{{$user_division}}</h3>

                <br>
                <!--<table class="table table-bordered table-condensed">-->
                <table border="3" style="width: 100%; text-align: center">
                    <thead>
                       
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
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coll as $c)
                        <tr>
                            <td>{{$c[0]}}</td>
                            @foreach($c[1] as $x)
                            <td>{{$x}}</td>
                            @endforeach
                            <td>{{$c[2]}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="14"> </td>
                        </tr>
                        <tr>
                            <th>SUBTOTAL</th>
                            @foreach($fin as $x)
                            <td>{{$x}}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                <br>
                <br>






            </div>
        </div>


    </body>
</html>	

