{{-- @if (Session::has('success'))
<div class="alert alert-success alert-dismissible session fade show" role="alert">
    <strong>Sucess! </strong>{{ Session::get('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif --}}

@props([
    'type' => 'other',
])
@if (session()->has($type))
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toastr-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        @if($type == 'success')
        toastr.success("{{ Session::get('success') }}", 'Success!', {
            timeOut: 12000
        });
        @elseif ($type == 'fail')
        toastr.error("{{ Session::get('fail') }}", 'Fail!', {
            timeOut: 12000
        });
        @else
        toastr.info("{{ Session::get('other') }}", {
            timeOut: 12000
        });
        @endif
    </script>
@endif
