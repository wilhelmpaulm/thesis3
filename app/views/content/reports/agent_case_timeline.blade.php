<?php 
    

?>

<?php
$dateLoop = [];

foreach ($cases as $co) {
    if (!in_array($co->created_at, $dateLoop)) {
        array_push($dateLoop, $co->created_at);
    }
}

//var_dump($evidence_pictures);
?>


<?php
rsort($dateLoop);
//var_dump($dateLoop);
?>

<div class="panel panel-black">
    <div class="panel-heading">
        <h3 class="panel-title">Case Timeline</h3>
    </div>
    <div class="panel-body" style="height:85vh; overflow: auto">
        <ul class="timeline">
            @foreach($dateLoop as $dl)
            


            <?php $i =0; ?>
            @foreach($cases as $c)
            @if($dl == $c->created_at) 
            @if($i % 2 == 0 ) 
            <li class="timeline-inverted">
                @else
            <li>
                @endif
                
                @if($c->status == "Closed_Finished")
                <div class="timeline-badge bg-teal"><i class="fa fa-check"></i></div>
                @elseif($c->status == "Closed_Unfinished")
                <div class="timeline-badge label-warning"><i class="fa fa-warning"></i></div>
                @elseif($c->status == "Non-viable")
                <div class="timeline-badge label-default"><i class="fa fa-cloud"></i></div>
                @endif
                
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        
                            @if($c->status == "Closed_Finished")
                            <a href="{{URL::to(strtolower(Auth::user()->job_title).'/cases-closed/'.$c->id)}}">
                            @elseif($c->status == "Closed_Unfinished")
                            <a href="{{URL::to(strtolower(Auth::user()->job_title).'/cases-closed/'.$c->id)}}">
                            @elseif($c->status == "Non-viable")
                            <a href="{{URL::to(strtolower(Auth::user()->job_title).'/cases-non-viable/'.$c->id)}}">
                            @endif
                        <h4 class="timeline-title">{{$c->name}}</h4>
                    </a>
                    </div>
                    <hr>
                    <div class="timeline-body">
                        <!--<p class="text-muted"><small>{{$c->details}}</small></p>-->
                        <div style="height: 10vh; overflow-y: auto">
                                <p class="text-muted"><small>
                                        <span>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </span>
                                        <span>
                                            Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
                                        </span>

                                        
                                        
                            </small></p>
                        </div>
                        <hr>
                        @if($c->status == "Closed_Finished")
                <p class="label bg-teal"><i class="fa fa-check"></i> Closed-Finished</p>
                @elseif($c->status == "Closed_Unfinished")
                <p class="label label-warning"><i class="fa fa-warning"></i> Closed-Unfinished</p>
                @elseif($c->status == "Non-viable")
                <p class="label label-default"><i class="fa fa-cloud"></i> Non-viable</p>
                @endif
                        <p class="text-muted label label-success">CASE {{$c->id}}</p>
                        <p class="text-muted label label-info"><i class="fa fa-clock-o"></i> {{$c->created_at}}</p>
                    </div>
                </div>
            </li>
            
            @endif
            
           <?php $i++;?>

            
            @endforeach
            @endforeach


        </ul>
    </div>
</div>



<!--
<li>
    <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
    <div class="timeline-panel">
        <div class="timeline-heading">
            <h4 class="timeline-title">Mussum ipsum cacilds</h4>
            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
        </div>
        <div class="timeline-body">
            <p>Mussum ip num gostis.</p>
        </div>
    </div>
</li>
<li class="timeline-inverted">
    <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
    <div class="timeline-panel">
        <div class="timeline-heading">
            <h4 class="timeline-title">Mussum ipsum cacilds</h4>
        </div>
        <div class="timeline-body">
            <p>Mu num gostis.</p>
        </div>
    </div>
</li>
-->
