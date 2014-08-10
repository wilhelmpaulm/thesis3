@extends("layouts.new")

@section("main")
<div id="sidebarsubhtml" class="hide">
   @include("sidebar.sub.messages")
</div>




<div class="col-md-12">
    <div id="content">
        @if($message != null)
        @include("gen.messages.show")
        @endif
    </div>
</div>


<script >
//    $("#sidebarsubhtml").html("");
    $('a[href="#sub"]').tab('show');
    var sidebarsub = $("#sidebarsubhtml").html();
    $("#subheading").removeClass("hide");
    
    $("#sub").append(sidebarsub);
    
    $("#subheading").text("Messages");
    
    $('.selectpicker').selectpicker();
</script>



@stop