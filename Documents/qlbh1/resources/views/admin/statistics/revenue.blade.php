@extends('admin.admin-layout')
@section('content')
    <div class="card">
        <h5 class="card-header">Thống kê doanh thu
            <div class="input-group input-daterange">
                <input type="text"
                       name="from_date"
                       class="form-control date"
                       autocomplete="off"
                       id="fromDate"
                       value="{{ request('from_date', today()->format('d/m/Y')) }}">
                <div class="input-group-addon mx-2">đến</div>
                <input type="text"
                       class="form-control date"
                       id="toDate"
                       autocomplete="off"
                       name="to_date"
                       value="{{ request('to_date', today()->addDays(10)->format('d/m/Y')) }}">
            </div>
        </h5>
        <div class="card-body">
            <canvas id="myChart" width="300" height="100"></canvas>
        </div>
        <input type="hidden" value="{{ json_encode($labels) }}"
               id="labels">
        <input type="hidden"
               value="{{ json_encode($revenues) }}"
               id="revenues">
    </div>
@endsection
@push('javascripts')
    <script>
     
     
        $('.input-daterange input').each(function() {
            $(this).datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                todayHighlight: true,
            });
        });

        let ctx = document.getElementById('myChart');
        const labels = JSON.parse($('#labels').val())
        const revenues = JSON.parse($('#revenues').val())
        const data = {
            labels: labels,
            datasets: [{
                label: "Doanh thu",
                data: revenues,
            }]
        };

        const chartOptions = {
            legend: {
                display: false,
                position: 'top',
                labels: {
                    boxWidth: 80,
                    fontColor: 'black'
                }
            },
        
         
        };
        const chart = new Chart($('#myChart'), {
            type: 'line',
            data: data,
            options: chartOptions
        });
        $(document).on('change', '.date', function () {
            let fromDate = $('#fromDate').val();
            let toDate = $('#toDate').val();
            let urlSearchParams = new URLSearchParams(window.location.search);
            urlSearchParams.set('from_date', fromDate);
            urlSearchParams.set('to_date', toDate);
            window.location.search = urlSearchParams.toString();
        });
    </script>
@endpush
