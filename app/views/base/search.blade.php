@extends("layouts.new")
@section("main")


    <div class="col-md-12">
        @include("content.search")
    </div>


<script>
    $("table").dataTable();

</script>

@stop