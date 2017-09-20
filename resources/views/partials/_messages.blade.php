@if(Session()->has('success'))
    <div class="alert alert-success alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Success!</strong> {{Session()->get('success')}}
    </div>
@endif