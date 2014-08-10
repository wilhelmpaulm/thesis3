<?php
$otof = [1,2,3,4,5];

?>
<div id="task_{{$task->id}}" class="modal  fade" tabindex="-1" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">View Task</h4>
        </div>
        <form action="{{URL::to('tasks/update-case/'.$task->id)}}" method="POST">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                         <label for="title">Task</label>
                        <input type="text" class="form-control" id="title" placeholder="Task here" name="title" value="{{$task->title}}">
                        <label for="title">Date Start</label>
                        <div class='input-group date' >
                            <input class='datetimepicker8 form-control' type='datetime'  name="date_start" data-format="YYYY-MM-DD h:mm:ss" value="{{$task->date_start}}"/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <label for="title">Date End</label>
                        <div class='input-group date' >
                            <input class='datetimepicker9 form-control' type='datetime'  name="date_end" data-format="YYYY-MM-DD hh:mm:ss" value="{{$task->date_end}}"/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <label for="title">Priority</label>
                        <select name="priority" class="form-control">
                               @foreach($otof as $o)
                                     @if($o == $task->priority)
                                     <option selected="">{{$o}}</option>
                                     @else
                                     <option>{{$o}}</option>
                                     @endif
                                    @endforeach
                        </select>
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                               
                                     <option >Pending</option>
                                     
                                     <option>Done</option>
                                     
                        </select>
                    </div>
                    <div class="hidden">
                       
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" rows="4" cols="20" placeholder="This task is for. . .">{{$task->body}}</textarea>
                    </div>



                </div>
            </div>
            <div class="modal-footer">
                <span class="btn-group btn-group-sm">
                    <a  id="task_destroy_{{$task->id}}" class="btn btn-danger" >Delete</a>
                    <button type="" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </span>
            </div>
        </form>
    </div>
</div>

<script>
    $("#task_destroy_{{$task->id}}").on("click", function() {
        $.post("{{URL::to('tasks/destroy/'.$task->id)}}", function(data) {
            location.reload();
        });

    });
    $(function() {
        $('.datetimepicker10').datetimepicker();
        $('.datetimepicker11').datetimepicker();
        $(".datetimepicker10").on("change.dp", function(e) {
            $('#datetimepicker11').data("DateTimePicker").setStartDate(e.date);
        });
        $(".datetimepicker11").on("change.dp", function(e) {
            $('#datetimepicker10').data("DateTimePicker").setEndDate(e.date);
        });
    });

</script>