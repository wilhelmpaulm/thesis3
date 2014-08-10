<?php $ccc = Kase::where("agent_id", "=", Auth::user()->id)->orderBy('created_at', 'desc')->get(); ?>
<?php // $mrs = Task::where("user_id", "=", Auth::user()->id)->where("status", "=", "Pending")->orderBy('created_at', 'desc')->get(); ?>
<?php $count = 0; ?>



<ul class="dropdown-menu long-down"  id="alert-tasks">
   
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            @foreach($ccc as $cc)
            <?php
            $ts = Task::where("case_id", "=", $cc->id)->get();
            $dt = 0;
            $pt = 0;
            $tt = 0;
            foreach ($ts as $t) {
                if ($t->status == "Done") {
                    $dt++;
                } else {
                    $pt++;
                    $count++;
                }
                $tt++;
            }
            
            ?>
            @if($tt!= 0)
            <?php $u = User::find($cc->agent_id) ?>
            <li><!-- Task item -->
                <a href="#">
                    <h5>
                        Case # {{$cc->id}}
                        <small class="pull-right">{{$dt}}/{{$tt}} done</small>
                    </h5>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua " style="width: {{round(($dt/$tt),2)*100}}%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">{{round(($dt/$tt),2)*100}}% Complete</span>
                        </div>
                    </div>
                </a>
            </li><!-- end task item -->
            @endif
            @endforeach 
        </ul>
    </li>
     @if($count == 0)
    <li class="header">You have no tasks</li>
    @elseif($count == 1)
    <li class="header">You have a task</li>
    @else
    <li class="header">You have {{$count}} tasks</li>
    @endif
    <!--<li class="footer"><a href="{{URL::to(strtolower(Auth::user()->job_title)."/messages")}}">See All Messages</a></li>-->
</ul>