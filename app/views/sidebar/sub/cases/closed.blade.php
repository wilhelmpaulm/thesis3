<!--<div class="panel panel-black">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-suitcase"></i> Closed Cases</h3>
    </div>-->
    <div  id="list_plug" class="list-group" >
       <div class="">
        <div class="input-group custom-search-form input-group-sm">
            <input type="text" class="search form-control " placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default sort" type="button" data-sort="list_name">
                    <i class="fa fa-sort-alpha-asc"></i>
                </button>
                <button class="btn btn-default sort" type="button" data-sort="list_created_at">
                    <i class="fa fa-sort-numeric-asc"></i>
                </button>
            </span>

        </div>
    </div>
        <br>
        <div style="height: 60vh; overflow-y: auto; overflow-x: hidden">

            <?php $cases = Kase::where("status", "=", "Closed_unfinished")->orWhere("status", "=", "Closed_finished")->get(); ?>
            <ul class="list list-unstyled sidebar-menu">
            @foreach($cases as $c) 
            <?php
            $la = "";
            $lo = "";

            if ($case != null) {
                if ($c->id == $case->id) {
                    $la = "active";
                    $lo = "bg-gray";
                }
            }
            ?>
            <li class="treeview {{$la}} {{$lo}}">
                <a href="#">
                    <div class="row">
                        <div class="col-lg-2">
                            <div>
                                <span class="label bg-teal">{{round(($c->user_priority + $c->chief_priority)/2, 2)}}</span>
                            </div>
                            <?php
                            $fr = 0;
                            $ra = 0;

                            $ctts = DB::select("SELECT * FROM case_type_tags JOIN case_types
                                                        ON case_type_tags.type=case_types.type where 
                                                        case_type_tags.case_id = ?", [$c->id]);
                            foreach ($ctts as $ctt) {
                                $fr += (($ctt->difficulty + $ctt->manpower + $ctt->time) / 3);
                            }
                            $ra = $fr / count($ctts);
                            ?>
                            <div>
                                <span class="label label-warning">{{round(($ra+$c->user_rating)/2, 2)}}</span>
                            </div>

                        </div>
                        <div class="col-lg-10">

                            <span class="list_name"> {{$c->name}}</span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            
                            <?php 
                                $agent = User::find($c->agent_id); 
                            ?>
                            
                            <p class=" list_details label label-success "><i class="fa fa-user"></i> {{$agent->first_name}} {{$agent->last_name}}</p>
                            <p class="label label-primary bg-lightblue ">{{$c->division}}</p>
                            <a   id="" href="{{URL::to(strtolower(Auth::user()->job_title).'/cases-ongoing/'.$c->id)}}" data-c_id="{{$c->id}}" class="list_name c_link {{$la}} label label-default">CASE {{$c->id}}</a>
                        </div>
                    </div>

                    <br>
                </a>
                <ul class="treeview-menu">
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-10">
                            
                            <p class="list_created_at label label-info"><i class="fa fa-calendar"></i> {{$c->created_at}}</p>
                            <?php $case_type_tags = Case_type_tag::where("case_id", "=", $c->id)->get(); ?>
                            @foreach($case_type_tags as $ctt)
                            <p class="label label-primary bg-orange">
                                {{$ctt->type}}
                            </p> 
                            @endforeach
                        </div >
                           <br>
                    </div >
                </ul>
            </li>
            
            @endforeach
        </ul>


        </div>
    </div>
<!--</div>-->
<script>
    var options = {
        valueNames: ['list_name', 'list_created_at', 'list_details']
    };

    var userList = new List('list_plug', options);

</script>
