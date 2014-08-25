<?php
$notifications2 = System_log::where("target_id", "=", Auth::user()->id)->orderBy('id', 'desc')->take(10)->get();
//$notifications = DB::select("select * from system_logs  join users on system_logs.user_id = users.id where system_logs.target_id = ? order by system_logs.id desc limit 10", [Auth::user()->id]);
$isUnread = "";
?>
<?php 

$count = 0; //count($notifications); 
foreach($notifications2 as $xx){
    if($xx->status == "unread"){
        $count++;
    }
}
?>




<ul class="dropdown-menu long-down"  id="alert-notifications">
    @if($count == 0)
    <li class="header">You have no new notifications</li>
    @elseif($count == 1)
    <li class="header">You have {{$count}} notification</li>
    @else
    <li class="header">You have {{$count}} notifications</li>
    @endif
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            @foreach($notifications2 as $n)
            <?php $a = User::find($n->user_id)?>
            <?php
            if ($n->status == "read") {
                $isUnread = "";
            } else {
                $isUnread = "";
            }
            ?>
            @if($n->status == "unread")
            <li class=" c-white" style="background: #f9f9f9"><!-- start message -->
             @else
            <li class="" style=""><!-- start message -->
             @endif
             
             @if($n->case_id != "0")
                <a href="{{URL::to(''.strtolower(Auth::user()->job_title).'/cases-ongoing/'.$n->case_id)}}" class="">
              @else 
                    <a href="#" class="">
               @endif     
                    <div class="pull-left">
                        <img src="{{asset('nbi/agent/picture/'.$a->file_picture)}}" class="img-circle" alt="User Image"/>
                    </div>
                    <h4>
                        {{$a->last_name.", ".$a->first_name}}
                    </h4>
                    <p>
                        <small><i class="fa fa-clock-o"></i> {{$n->updated_at}}</small>
                        <br>

                        {{$n->action}}

                    </p>

                </a>
            </li><!-- end message -->
            @endforeach 
        </ul>
    </li>
    <li class="footer"><a href="{{URL::to(strtolower(Auth::user()->job_title)."/notifications")}}">See All Notifications</a></li>
</ul>



<?php
foreach ($notifications2 as $n) {
    $n->status = "read";
    $n->save();
}
?>
