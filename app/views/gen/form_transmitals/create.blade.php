<?php
$chief = User::where("division", "=", Auth::user()->division)->where("job_title", "=", "Chief")->first();
$cases = Kase::where("status", "=", "Ongoing")->where("agent_id", "=", Auth::user()->id)->get();

$coll = [
];
?>
<form id="form1" action="{{URL::to("form_transmitals/store")}}" method="post">
    <div class="row ">

        <div class="col-lg-6">
            <div class="panel panel-black">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$case->name}}</h3>
                </div>
                <div class="panel-body">

                    <div style="height: 30vh; overflow: auto">
                        <table class="table table-condensed table-bordered table-striped">

                            <tbody>
                                <tr>
                                    <td><strong>Case Details</strong></th>
                                    <td>{{$case->details}}</th>
                                </tr>  
                                <tr>
                                    <td><strong>Date Assigned</strong></th>
                                    <td>{{$case->date_reported}}</th>
                                </tr>  
                                <tr>
                                    <td><strong>Agent Assigned</strong></th>
                                    <td>
                                        <?php $a = User::find($case->agent_id); ?>
                                        <p>{{$a->id}}</p>
                                        <p>{{$a->last_name.", ".$a->first_name." ".$a->middle_name}}</p>
                                        </th>
                                </tr>

                                <tr>
                                    <td><strong>Date Reported</strong></th>
                                    <td>{{$complaint->date_reported}}</th>
                                </tr>
                                <tr>
                                    <td><strong>Date Committed</strong></td>
                                    <td>{{$complaint->date_commited}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Case Type</strong></th>
                                    <td>
                                        @foreach($case_type_tags as $ctt)
                                        {{$ctt->type}} /
                                        @endforeach
                                        </th>
                                </tr>

                                <tr>
                                    <td><strong>Complainant</strong></th>
                                    <td>
                                        <?php $complainant = Client::find($case->complainant_id); ?>
                                        <p>{{$complainant->last_name.", ".$complainant->first_name." ".$complainant->middle_name}}</p>
                                        <p>@if(strlen($complainant->birthdate) == 10)
                                            {{Time::getAge($complainant->birthdate)}} years old
                                            @endif
                                        </p>

                                        <p><strong>Sex:</strong> {{$complainant->sex}} </p>
                                        <p><strong>Birthdate: </strong> {{$complainant->birthdate}} </p>
                                        <p><strong>Civil Status:</strong> {{$complainant->civil_status}} </p>
                                        <p><strong>Citizenship:</strong> {{$complainant->citizenship}}  </p>
                                        <p><strong>Occupation: </strong>{{$complainant->occupation}} </p>
                                        </th>
                                </tr>

                                <tr>
                                    <td><strong>Narration</strong></td>
                                    <td>{{$complaint->narration}}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <div class="panel panel-black">
                <div class="panel-heading">
                    <h3 class="panel-title">Case Collection</h3>
                </div>

                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Case Collection Summary
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <table class="table table-bordered table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th width="30%">Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Case Subjects</td>
                                                <td>{{$case_subjects->count()}}</td>
                                            </tr>
                                            <tr>
                                                <td>Case Victims</td>
                                                <td>{{$case_victims->count()}}</td>
                                            </tr>
                                            <tr>
                                                <td>Evidence Recordings</td>
                                                <td>{{count($evidence_recordings)}}</td>
                                            </tr>
                                            <tr>
                                                <td>Evidence Pictures</td>
                                                <td>{{count($evidence_pictures)}}</td>
                                            </tr>
                                            <tr>
                                                <td>Evidence Videos</td>
                                                <td>{{count($evidence_videos)}}</td>
                                            </tr>
                                            <tr>
                                                <td>Evidence Documents</td>
                                                <td>{{count($evidence_documents)}}</td>
                                            </tr>
                                            <tr>
                                                <td>Evidence Objects</td>
                                                <td>{{count($evidence_objects)}}</td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        @if(count($case_victims) != 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#victims">
                                        Case Victims
                                    </a>
                                </h4>
                            </div>
                            <div id="victims" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table table-bordered table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th>Name</th>
                                                <th width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($case_victims as $cd)
                                            <?php $s = Client::find($cd->client_id) ?>
                                            <tr>
                                                <td><input type="checkbox" class="form-control" name="title[]" value="Victim - {{$s->last_name}}, {{$s->first_name}}"/></td>
                                                <td>{{$s->last_name}}, {{$s->first_name}}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-default" data-toggle="modal" data-target="#viewAgent_{{$cd->id}}"><i class="fa fa-user"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(count($case_subjects) != 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#subjects">
                                        Case Subjects
                                    </a>
                                </h4>
                            </div>
                            <div id="subjects" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table table-bordered table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th colspan="">Name</th>
                                                <th width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($case_subjects as $cd)
                                            <?php $s = Client::find($cd->client_id) ?>
                                            <tr>
                                                <td><input type="checkbox" class="form-control" name="title[]" value="Subject - {{$s->last_name}}, {{$s->first_name}}"/></td>
                                                <td>{{$s->last_name}}, {{$s->first_name}}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-default" data-toggle="modal" data-target="#viewAgent_{{$cd->id}}"><i class="fa fa-user"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(count($evidence_recordings) != 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#recordings">
                                        Evidence Recordings 
                                    </a>
                                </h4>
                            </div>
                            <div id="recordings" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table table-bordered table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th>Name</th>
                                                <th width="12%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($evidence_recordings as $cd)
                                            <tr>
                                                <td><input type="checkbox" class="form-control" name="title[]" value="Recording - {{$cd->details}}"/></td>
                                                <td>{{$cd->details}}</td>
                                                <td>
                                                    <span class="btn-group btn-group-xs ">
                                                        <button class="btn btn-success"data-toggle="modal" data-target="#viewEvidenceRecording_{{$cd->id}}"><i class="fa fa-eye"></i></button>
                                                        <a class="btn btn-success"  href="{{URL::asset("nbi/evidences/recordings/".$cd->file_name)}}"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(count($evidence_pictures) != 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#pictures">
                                        Evidence Pictures
                                    </a>
                                </h4>
                            </div>
                            <div id="pictures" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table table-bordered table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th>Name</th>
                                                <th width="12%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($evidence_pictures as $cd)
                                            <tr>
                                                <td><input type="checkbox" class="form-control" name="title[]" value="Picture - {{$cd->details}}"/></td>
                                                <td>{{$cd->details}}</td>
                                                <td>
                                                    <span class="btn-group btn-group-xs ">
                                                        <button class="btn btn-default"data-toggle="modal" data-target="#viewEvidencePictures_{{$cd->id}}"><i class="fa fa-eye"></i></button>
                                                        <a class="btn btn-default" target="_blank" href="{{URL::asset("nbi/evidences/pictures/".$cd->file_name)}}"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(count($evidence_videos) != 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#videos">
                                        Evidence Videos
                                    </a>
                                </h4>
                            </div>
                            <div id="videos" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table table-bordered table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th>Name</th>
                                                <th width="12%">

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($evidence_videos as $cd)
                                            <tr>
                                                <td><input type="checkbox" class="form-control" name="title[]" value="Video - {{$cd->details}}"/></td>
                                                <td>{{$cd->details}}</td>
                                                <td>
                                                    <span class="btn-group btn-group-xs ">
                                                        <button class="btn btn-success"data-toggle="modal" data-target="#viewEvidenceVideo_{{$cd->id}}"><i class="fa fa-eye"></i></button>
                                                        <a class="btn btn-success"  href="{{URL::asset("nbi/evidences/videos/".$cd->file_name)}}"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(count($evidence_documents) != 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#documents">
                                        Evidence Documents
                                    </a>
                                </h4>
                            </div>
                            <div id="documents" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table table-bordered table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th>Name</th>
                                                <th width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($evidence_documents as $cd)
                                            <tr>
                                                <td><input type="checkbox" class="form-control" name="title[]" value="Document - {{$cd->details}}"/></td>
                                                <td>{{$cd->details}}</td>
                                                <td>
                                                    <span class="btn-group btn-group-xs ">
                                                        <a class="btn btn-default"  href="{{URL::asset("nbi/evidences/documents/".$cd->file_name)}}"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(count($evidence_objects) != 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#objects">
                                        Evidence Objects
                                    </a>
                                </h4>
                            </div>
                            <div id="objects" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table table-bordered table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th>Name</th>
                                                <th width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($evidence_objects as $cd)
                                            <tr>
                                                <td><input type="checkbox" class="form-control" name="title[]" value="Object - {{$cd->details}}"/></td>
                                                <td>{{$cd->details}}</td>
                                                <td>
                                                    <span class="btn-group btn-group-xs ">
                                                        <button class="btn btn-success"data-toggle="modal" data-target="#viewEvidenceObjects_{{$cd->id}}"><i class="fa fa-eye"></i></button>
                                                        <a class="btn btn-success"  href="{{URL::asset("nbi/evidences/objects/".$cd->file_name)}}"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif



                        <!--<button>asdasd</button>-->
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-black">
                <div class="panel-heading">
                    <h3 class="panel-title">Transmittal Report Form</h3>
                </div>
                <!--<form action="{{URL::to("form_dispositions/store")}}" method="post">-->

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label ><span class="c-red">*</span>Case</label>

                            <select name="case_id" class="form-control">
                                <option value="{{$case->id}}">{{$case->name}}</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label ><span class="c-red">*</span>Date</label>
                            <input class="form-control" type="date" name="date"><br>
                            <label><span class="c-red">*</span>Header</label>
                            <textarea type="text" name="header" class="form-control" rows="4" cols="20"></textarea>
                            <br>
                            <label><span class="c-red">*</span>Introduction</label>
                            <textarea type="text" name="introduction" class="form-control" rows="4" cols="20"></textarea>
                            <br>
                            <label><span class="c-red">*</span>Crime</label>
                            <textarea type="text" name="crime" class="form-control" rows="4" cols="20"></textarea>
                            <br>
                            <label><span class="c-red">*</span>How the crime is committed</label>
                            <textarea type="text" name="how" class="form-control" rows="4" cols="20"></textarea>
                            <br>
                            <label><span class="c-red">*</span>Closing</label>
                            <textarea type="text" name="closing" class="form-control" rows="4" cols="20"></textarea>
                            <br>
                            <label><span class="c-red">*</span>To</label>
                            <textarea type="text" name="to" class="form-control" rows="4" cols="20"></textarea>

                        </div>
                    </div>
                    <div class="row hidden">
                        <hr>
                        <span class="c-red">*</span>Annexes
                        <div class="col-lg-12">
                            <table class="table table-condensed table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width='10%'>Letter</th>
                                        <th>Title</th>
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


                </div>
                <div class="panel-footer clearfix">
                    <span class="c-red">* Required</span>
                    <span class="btn-group btn-group-sm pull-right">
                        <button id="submit" class="btn btn-primary" type="">Submit</button>
                    </span>
                </div>
            </div>
        </div>
</form>



<div class="hidden">
    <div >
        <table>
            <thead>

            </thead>
            <tbody id="members_item">
                <tr>
                    <td>
                        <!--<input name="letter[]" type="text" class="form-control" placeholder="A">-->
                    </td>
                    <td>
                        <!--<input name="title[]" type="text" class="form-control" placeholder="Title">-->
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
</div>


<script>
//    $("#submit").on("click", function(){
    $("#form1").on("submit", function() {
//    $("#form1").submit(function() {
//        alert("asds");
        var ser = $("#form2").serialize() + "&" + $("#form1").serialize();
//        console.log();
        $.post("{{URL::to('agent/validate')}}", ser, function(data) {
            alert(data);
            console.log(data);
//        return false; 
        });

//       return false; 
    });


    $("#members_add").on("click", function() {
        var x = $("#members_item").html();
        $("#members_body").append(x);
    });


    $("body").on("click", ".remove", function() {
        $(this).parent().parent().parent().remove();
    });

</script>

@foreach($evidence_pictures as $ed)
<div id="viewEvidencePictures_{{$ed->id}}" class="modal container fade" tabindex="-1" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">View</h4>
        </div>
        <div class="modal-body">
            <img src="{{URL::asset('nbi/evidences/pictures/'.$ed->file_name)}}" class="img-responsive center-block">
        </div>
        <div class="modal-footer">
            <span class="btn-group btn-group-sm">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </span>
        </div>
    </div>
</div>

@endforeach


@foreach($evidence_videos as $ed)
<div id="viewEvidenceVideo_{{$ed->id}}" class="modal container fade" tabindex="-1" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">View {{$ed->title}}</h4>
        </div>
        <div class="modal-body" >

            <video width="320" height="240" controls class="center-block">
                <source src="{{URL::to('nbi/evidences/videos/'.$ed->file_name)}}" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'>
                <!--<source src="movie.ogg" type="video/ogg">-->
                Your browser does not support the video tag.
            </video>


        </div>
        <div class="modal-footer">
            <span class="btn-group btn-group-sm">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </span>
        </div>
    </div>
</div>
@endforeach


@foreach($evidence_recordings as $ed)
<div id="viewEvidenceRecording_{{$ed->id}}" class="modal container fade" tabindex="-1" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">View</h4>
        </div>
        <div class="modal-body">
            <audio controls class="center-block" style="width: 100%">
                <!--<source src="horse.ogg" type="audio/ogg">-->
                <source src="{{URL::asset('nbi/evidences/recordings/'.$ed->file_name)}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
        <div class="modal-footer">
            <span class="btn-group btn-group-sm">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </span>
        </div>
    </div>
</div>
@endforeach



@foreach($evidence_objects as $ed)
<div id="viewEvidenceObjects_{{$ed->id}}" class="modal container fade" tabindex="-1" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">View</h4>
        </div>
        <div class="modal-body">
            <img src="{{URL::asset('nbi/evidences/objects/'.$ed->file_name)}}" class="img-responsive center-block">
        </div>
        <div class="modal-footer">
            <span class="btn-group btn-group-sm">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </span>
        </div>
    </div>
</div>

@endforeach


@foreach($case_subjects as $a)
<?php $addresses = Client_address::where("client_id", "=", $a->id)->get(); ?>
<?php $contacts = Client_contact::where("client_id", "=", $a->id)->get(); ?>
<?php $a = Client::find($a->id); ?>

<div class="modal container fade" id="viewAgent_{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Update user status</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-2">
                    <img src="{{URL::asset('nbi/client/picture/'.$a->img_picture)}}" width="100%" class="img-rounded">
                </div>
                <div class="col-lg-3">
                    <h4>{{$a->last_name.", ".$a->first_name." ".$a->middle_name}}</h4>
                    <hr>
                    <p>id : {{$a->id}}</p>
                    <p>alias : {{$a->alias}}</p>
                    <p>educational attainment : {{$a->educational_attainment}}</p>
                    <hr>
                    <p>hair color : {{$a->hair_color}}</p>
                    <p>weight : {{$a->weight}}</p>
                    <p>height : {{$a->height}}</p>
                    <p>complexion : {{$a->complexion}}</p>
                    <p>build : {{$a->build}}</p>
                    <p>race : {{$a->race}}</p>

                </div>
                <div class="col-lg-2">
                    <h4>Contacts</h4>
                    <hr>
                    @foreach($contacts as $c)
                    @if($c->type == "Email")<p class=""><i class="fa fa-envelope"></i> 
                        @elseif($c->type == "Mobile")<p class=""><i class="fa fa-phone"></i> 
                        @endif {{$c->contact}}</p>
                    @endforeach
                </div>

                <div class="col-lg-3">
                    <h4>Address</h4>
                    <hr>
                    @foreach($addresses as $a)
                    <p class="">{{$a->street}} </p>
                    <p class="">{{$a->city}} </p>
                    <p class="">{{$a->province}} </p>
                    <p class="">{{$a->barangay}} </p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="btn-group btn-group-sm pull-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endforeach

@foreach($case_victims as $a)
<?php $addresses = Client_address::where("client_id", "=", $a->id)->get(); ?>
<?php $contacts = Client_contact::where("client_id", "=", $a->id)->get(); ?>
<?php $a = Client::find($a->id); ?>


<div class="modal container fade" id="viewAgent_{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Update user status</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-2">
                    <img src="{{URL::asset('nbi/client/picture/'.$a->img_picture)}}" width="100%" class="img-rounded">
                </div>
                <div class="col-lg-3">
                    <h4>{{$a->last_name.", ".$a->first_name." ".$a->middle_name}}</h4>
                    <hr>
                    <p>id : {{$a->id}}</p>
                    <p>alias : {{$a->alias}}</p>
                    <p>educational attainment : {{$a->educational_attainment}}</p>
                    <hr>
                    <p>hair color : {{$a->hair_color}}</p>
                    <p>weight : {{$a->weight}}</p>
                    <p>height : {{$a->height}}</p>
                    <p>complexion : {{$a->complexion}}</p>
                    <p>build : {{$a->build}}</p>
                    <p>race : {{$a->race}}</p>

                </div>
                <div class="col-lg-2">
                    <h4>Contacts</h4>
                    <hr>
                    @foreach($contacts as $c)
                    @if($c->type == "Email")<p class=""><i class="fa fa-envelope"></i> 
                        @elseif($c->type == "Mobile")<p class=""><i class="fa fa-phone"></i> 
                        @endif {{$c->contact}}</p>
                    @endforeach
                </div>

                <div class="col-lg-3">
                    <h4>Address</h4>
                    <hr>
                    @foreach($addresses as $a)
                    <p class="">{{$a->street}} </p>
                    <p class="">{{$a->city}} </p>
                    <p class="">{{$a->province}} </p>
                    <p class="">{{$a->barangay}} </p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="btn-group btn-group-sm pull-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endforeach