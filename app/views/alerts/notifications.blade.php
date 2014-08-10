<?php
$notifications2 = System_log::where("target_id", "=", Auth::user()->id)->orderBy('id', 'desc')->take(10)->get();
$notifications = DB::select("select * from system_logs join users on system_logs.user_id = users.id where system_logs.target_id = ? order by system_logs.id desc limit 10", [Auth::user()->id]);
$isUnread = "";
?>
<?php $count = count($notifications); ?>




<ul class="dropdown-menu long-down"  id="alert-notifications">
    @if($count == 0)
    <li class="header">You have no notifications</li>
    @elseif($count == 1)
    <li class="header">You have {{$count}} notification</li>
    @else
    <li class="header">You have {{$count}} notifications</li>
    @endif
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            @foreach($notifications as $n)
            <?php
            if ($n->status == "read") {
                $isUnread = "";
            } else {
                $isUnread = "";
            }
            ?>
            @if($n->status == "unread")
            <li class="bg-333 c-white" style=""><!-- start message -->
             @else
            <li class="" style=""><!-- start message -->
             @endif
                <a href="#" class="">
                    <div class="pull-left">
                        <img src="{{asset('nbi/agent/picture/'.$n->file_picture)}}" class="img-circle" alt="User Image"/>
                    </div>
                    <h4>
                        {{$n->last_name.", ".$n->first_name}}
                    </h4>
                    <p>
                        <small><i class="fa fa-clock-o"></i> {{$n->created_at}}</small>
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
