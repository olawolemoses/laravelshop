@if(session('success'))
<div class="alert alert-success alert-block">
<button type="button" class="close" data-dismiss="alert">x</button>
    {{session('success')}}
</div>
@elseif(session('error'))
<div class="alert alert-success alert-block">
<button type="button" class="close" data-dismiss="alert">x</button>
    {{session('error')}}
</div>
@endif