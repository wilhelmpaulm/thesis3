<?php $agents = User::where("division", "=", Auth::user()->division)->where("job_title", "!=", "Secretary")->get(); ?>

<div class="row">
    <div class="col-md-12">
<!--        <div class="panel panel-black">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users"></i> {{Auth::user()->division}} Agents</h3>
            </div>-->
            <div  id="agent_list" class="list-group " >
                <div class="list-group-item list-group-item-text bg-333">
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

                <div style="height: 450px; overflow-y:auto">

                    <ul class="list list-unstyled    ">
                        @foreach($agents as $a)
                        <?php
                $la = "";

                if ($id != null) {
                    if ($a->id == $id) {
                        $la = "active bg-gray";
                    }
                }
                ?>
                           
                        <li><a  id="" href="{{URL::to('secretary/calendar-agents/'.$a->id)}}" class="list-group-item bg-333 c_link {{$la}}">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <img src="{{URL::asset('nbi/agent/picture/'.$a->file_picture)}}" width="100%" class="img-rounded">
                                    </div>
                                    <div class="col-lg-7">
                                        <h5 class="list-group-item-text list_name ">{{$a->last_name.", ".$a->first_name}}</h5>
                                        <p class="label label-primary">{{$a->id}}</p>
                                        <p class="label label-success list_details">{{$a->job_title}}</p>
                                        <!--<p class=" list_created_at text-muted">{{$a->created_at}}</p>-->
                                    </div>
                                </div>

                            </a></li>
                        @endforeach
                    </ul>

                </div>

            <!--</div>-->
        </div>
    </div>

    <script>
        var options = {
            valueNames: ['list_name', 'list_created_at', 'list_details']
        };

        var agentList = new List('agent_list', options);


    </script>
    
</div>