<div class="panel panel-black">
    <div class="panel-heading">
        <h3 class="panel-title"> Complaint Sheet</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-justified">

            <li class="active">
                <a href="#tab1" data-toggle="tab">
                    <h4>Complaint Details</h4>
                    <!--<p class=""></p>-->
                </a>
            </li>
            <li class="">
                <a href="#tab2" data-toggle="tab">
                    <h4>Sworn Statement</h4>
                    <!--<p class="">Sworn Statement</p>-->
                </a>
            </li>


        </ul>
        <br>
        <!--    <div class="progress progress-striped active">
                <div id="pg-add" class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                    <span id="pg-add-text"></span>
                </div>
            </div>-->
    </div>
</div>


<!-- Tab panes -->
<div class="tab-content">

    <div class="tab-pane   active" id="tab1">
        <div class="panel panel-black">
            <div class="panel-heading">
                <h3 class="panel-title">Complaint Details</h3>
            </div>
            <div class="panel-body">
                @include("gen.complaints.details")
            </div>
        </div>
        <!--DETAILS HERE-->

    </div>
    <?php
    $suspects = DB::select("select * from complaint_subjects join clients on "
                                            . "complaint_subjects.client_id = clients.id where complaint_subjects.complaint_id = ?", [$complaint->id]);
                         $case_type_tags = Complaint_type_tag::where("complaint_id", "=", $complaint->id)->get();
    $case_name_x = "";
    foreach ($suspects as $s) {
        $case_name_x .= $s->first_name . " " . $s->last_name;
        if (end($suspects) != $s) {
            $case_name_x .= ", ";
        }
    }

    $case_name_x .=" - ";
    foreach ($case_type_tags as $ctt) {
        $case_name_x .= $ctt->type."";
        if (end($case_type_tags) != $ctt) {
            $case_name_x .= " ";
        } else {

        }
    }
            $case_name_x .= " Case";
    ?>


    <!--END OF TAB 3-->


    <!--END OF TAB 3-->
    <div class="tab-pane fade" id="tab2">
        <div class="panel panel-black">
            <div class="panel-heading">
                <h3 class="panel-title">Sworn Statement</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="{{URL::to('complaints/store-chief/'.$complaint->id)}}" method="post" enctype="multipart/form-data">
                    <div class="hidden">
                        <label for="complaint_name">Complaint Title</label>
                        <input type="text" class="form-control" id="complaint_name" name="complaint_name" placeholder="Complaint Title" value="{{$case_name_x}}">
                        <div class="form-group">
                            <label for="agency_reported">Has the matter been reported to any agency? If so, to what police agency?</label>
                            <input type="text" class="form-control" id="agency_reported" name="agency_reported" placeholder="Agency name">
                        </div>
                        <div class="form-group">
                            <label for="agency_report_details">Is the matter complained of the subject of any court action or proceedings? If so, where?</label>
                            <textarea class="form-control" name="agency_report_details" rows="4" cols="20" placeholder="Details . . . "></textarea>
                        </div>
                        <div class="form-group">
                            <label for="agency_report_status">Agency Report Status</label>
                            <input type="text" class="form-control" id="agency_report_status" name="agency_reported_status" placeholder="eg. Pending / Accomplished / On Hold">
                        </div>
                        <div class="form-group">
                            <label for="court_action_details">Court Action Details</label>
                            <input type="text" class="form-control" id="court_action_details" name="court_action_details" placeholder="eg. Pending / Accomplished / On Hold">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="consoiderations">What consideration/s impelled you to report to the NBI?</label>
                                <textarea class="form-control" name="considerations" rows="4" cols="20" placeholder="I chose to report this incident bacause . . ."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="narration"> Narration of Facts</label>
                                <textarea class="form-control" name="narration" rows="10" cols="20" placeholder=" I was . . ."></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="img_signature">Signature Photo</label>
                                <input type="file" id="img_signature" name="img_signature">
                                <p class="help-block">Please upload a clear image. Click <span id="upload" class="c-red">here</span> to make a new signature image.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group hidden">
                                <label for="img_right_thumb">Right Thumb Photo</label>
                                <input type="file" id="img_right_thumb" name="img_right_thumb">
                                <p class="help-block">Please upload a clear image.</p>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <hr>
                    <div class="btn-group btn-group-sm pull-right">
                        <button type="submit" class="btn  btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>




<script>
    $('#upload').click(function() {
//        $.post('{{URL::to("complaints/signature/".$complaint->id)}}', {img_signature: $('#simple_sketch').get(0).toDataURL("image/png"), lol:"boom"}, function(data) {
//            alert(data);
//        });
        window.open('{{URL::to("complaints/signature/".$complaint->id)}}', "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400");
//        window.open($('#simple_sketch').get(0).toDataURL());
    });

    $('a').on("click", function() {
        var x = 2;//number of forms
        var xx = ($(this).attr("href")).substring(4, 8); //would be the # tab based on href 
        xx *= (100 / x).toFixed(2);
        $("#pg-add").css({width: xx + "%"}).removeClass("progress-bar-success");
        $("#pg-add-text").text("");

        if (xx == 100) {
            $("#pg-add").addClass("progress-bar-success");
        }
        else {
            $("#pg-add").removeClass("progress-bar-success");
        }
    });

</script>