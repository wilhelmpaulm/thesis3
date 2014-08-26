@extends("layouts.new")
@section("main")


    <div class="row content">
    <div class="col-md-12">
        @include("content.agents")

    </div>
    </div>



<script>
    $("table").dataTable();

</script>

@stop