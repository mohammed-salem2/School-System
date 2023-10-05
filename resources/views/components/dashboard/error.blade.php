@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible session fade show" role="alert">
    <strong>Failed! </strong>{{ Session::get('error') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
