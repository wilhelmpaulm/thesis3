<div class="panel panel-black">
    <div class="panel-heading clearfix">
        <p class="pull-left"><i class="fa fa-table"></i> Case Resources</p>
        
    </div>
    <div class="panel-body">
        <table class="dtable table  table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Date Requested</th>
                    <th>Date Due</th>
                    <th>Date Returned</th>
                </tr>
            </thead>
            <tbody>
                <?php // $case_resources = Resource_history::where("case_id", "=", $case->id)->where("status", "=", "Approved")->orWhere("status", "=", "Received")->orWhere("status", "=", "Returned")->get(); ?>
                <?php $case_resources = DB::select("select * from resource_histories where case_id = ?", [$case->id]); ?>
                @foreach($case_resources as $cq)
                <?php $r = Resource::find($cq->resource_id);?>
                <tr  class="clickable" >
                    <td>{{$r->category}}</td>
                    <td>{{$r->name}}</td>
                    <td>
                        @if($cq->status == "Approved")<p class="label label-success">
                    @elseif($cq->status == "Pending")<p class="label label-warning">
                    @elseif($cq->status == "Disapproved")<p class="label label-danger">
                            @else<p class="label label-primary">
                            @endif
                            {{$cq->status}}</p></td>
                    <td>{{$cq->amount}}</td>
                    <td>{{$cq->date_requested}}</td>
                    <td>{{$cq->date_due}}</td>
                    <td>{{$cq->date_returned}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
$(".dtable").dataTable();

</script>