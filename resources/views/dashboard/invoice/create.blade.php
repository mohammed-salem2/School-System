@extends('layouts.master')

@section('title', 'Create Fee')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Invoice.create_new_invoice') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('invoices.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('dashboard.invoice.__form' , [
                'button' => __('app.store'),
            ])
        </form>
    </div>
@endsection

@section('JsFile')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

{{-- <script>
    $(document).ready(function () {
        $('select[name="fee_id"]').on('change', function () {
            var fee_id = $(this).val();
            if (fee_id) {
                $.ajax({
                    url: "{{ URL::to('dashboard/amounts') }}/" + fee_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('input[name="amount"]').val(data.amount);
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script> --}}


<script>
    // JavaScript code to handle item selection and quantity display
    const itemSelect = document.getElementById('fee_id');
    const amountInput = document.getElementById('AmountInput');
    const amountField = document.getElementById('amount');

    itemSelect.addEventListener('change', function() {
        const selectedOption = itemSelect.options[itemSelect.selectedIndex];
        const amount = selectedOption.dataset.quantity;

        if (amount) {
            amountInput.style.display = 'block';
            amountField.value = amount;
        } else {
            amountInput.style.display = 'none';
            amountField.value = '';
        }
    });
</script>


@endsection
