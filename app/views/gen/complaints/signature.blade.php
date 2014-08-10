<?php
$user = Auth::user();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sherlock</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <style>
            body {

                zoom: 87%;
                /*height: 600vh;*/
                /*transform: scale(.80);*/
                /*transform-origin: 10% 10%;*/
                /*font-size: 100%;*/
                /*background: url('{{URL::asset("bg/congruentoutline.png")}}')*/

            }
        </style>
<!--        {{HTML::style("LTE/css/font-awesome.min.css")}}
        {{HTML::style("LTE/css/ionicons.min.css")}}
        {{HTML::style("css/bootstrap-datetimepicker.css")}}-->
        <!--{{HTML::style("css/fullcalendar.print.css")}}-->
<!--        {{HTML::style("css/fullcalendar.css")}}
        {{HTML::style("css/dtable3.css")}}-->
        {{HTML::style("LTE/css/bootstrap.min.css")}}
        {{HTML::style("LTE/css/AdminLTE.css")}}
        <!--{{HTML::style("css/dataTables.css")}}-->
        <!--{{HTML::style("css/lumen.bootstrap.min.css")}}-->
<!--        {{HTML::style("css/bootstrap-tagsinput.css")}}
        {{HTML::style("css/bootstrap-modal-bs3patch.css")}}
        {{HTML::style("css/bootstrap-modal.css")}}
        {{HTML::style("css/bootstrap-datetimepicker.css")}}
        {{HTML::style("css/font-awesome.css")}}
        {{HTML::style("css/wilhelmpaulm.css")}}
        {{HTML::style("css/timeline.css")}}
        {{HTML::style("css/nv.d3.css")}}
        {{HTML::style("css/printer.css")}}
        {{HTML::style("css/wilhelm-panel.css")}}
        {{HTML::style("css/bootstrap-select.css")}}
        {{HTML::style("css/bootstrap-fullcalendar.css")}}-->



        <!--{{HTML::script("js/raphael.js")}}-->
        {{HTML::script("js/jquery.js")}}
        {{HTML::script("js/sketch.js")}}
        <!--{{HTML::script("js/morris.js")}}-->
        <!--{{HTML::script("js/moment.js")}}-->
        <!--{{HTML::script("js/bootstrap-tagsinput.js")}}-->
        <!--{{HTML::script("js/daterangepicker.js")}}-->
        <!--{{HTML::script("js/dataTables.min.js")}}-->
        <!--{{HTML::script("js/bootstrap3-typeahead.js")}}-->
        <!--{{HTML::script("js/typeahead.js")}}-->
        <!--{{HTML::script("js/dtable3.js")}}-->
        <!--{{HTML::script("js/fullcalendar.js")}}-->
        {{HTML::script("js/bootstrap.min.js")}}
        {{HTML::script("LTE/js/AdminLTE/app.js")}}

<!--        {{HTML::script("js/bootstrap.min.js")}}
        {{HTML::script("js/bootstrap-modalmanager.js")}}
        {{HTML::script("js/bootstrap-modal.js")}}
        {{HTML::script("js/bootstrap-datetimepicker.min.js")}}
        {{HTML::script("js/list.js")}}-->
        <!--{{HTML::script("js/list.fuzzysearch.min.js")}}-->
        {{HTML::script("js/bootstrap-select.js")}}
<!--        {{HTML::script("js/d3.v3.js")}}
        {{HTML::script("js/nv.d3.js")}}
        {{HTML::script("js/colorbrewer.js")}}
        {{HTML::script("js/highcharts/highcharts.js")}}
        {{HTML::script("js/highcharts/modules/data.js")}}
        {{HTML::script("js/highcharts/modules/exporting.js")}}-->
        <!--<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
        <!-- font Awesome -->
        <!--<link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Ionicons -->
        <!--<link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Theme style -->
        <!--<link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
       
        <![endif]-->

    </head>
    <body class="skin-black">

        <hr>
        <div id="con">
        <canvas id="colors_sketch" style="border: 1px solid #eee; zoom: 115%" width="500" height="300"></canvas>
        </div>
        <hr>
        <div class="tools btn-group ">
            <a href="#colors_sketch" class="btn btn-primary pull-left" data-download="png" style="">Download</a>
            <button id="clear" class="btn btn-warning pull-right" data-download="png" style="">Clear</button>
        </div>
        <script type="text/javascript">
            $(function() {
//                $.each(['#f00', '#ff0', '#0f0', '#0ff', '#00f', '#f0f', '#000', '#fff'], function() {
//                    $('#colors_demo .tools').append("<a href='#colors_sketch' data-color='" + this + "' style='width: 10px; background: " + this + ";'></a> ");
//                });
//                $.each([3, 5, 10, 15], function() {
//                    $('#colors_demo .tools').append("<a href='#colors_sketch' data-size='" + this + "' style='background: #ccc'>" + this + "</a> ");
//                });
                $('#colors_sketch').sketch();
            });
               var cc = $("#colors_sketch").clone();
            
            $("#clear").on("click", function(){
               $("#colors_sketch").remove();
//               console.log(cc);
               $("#con").append(cc);
                $('#colors_sketch').sketch();
            });
        </script>

    </body>

<!--    <script type="text/javascript">
        $(function() {
            $('#simple_sketch').sketch();
        });

    </script>-->
</html>