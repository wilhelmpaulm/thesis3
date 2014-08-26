@extends("layouts.new")
@section("main")

<div class="row content">
    <div class="col-md-12">
        @include("content.notifications")

    </div>
</div>


<script>
    $("table").dataTable();

</script>

@stop