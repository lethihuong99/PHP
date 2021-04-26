@extends('admin.admin-layout')
@section('content')
    <div class="card">
        <h5 class="card-header">Thống kê sản phẩm bán ngày
            <input type="date"
                   value="{{request('date', today()->format('Y-m-d'))}}"
                   id="date">
        </h5>
        <div class="card-body">
            <canvas id="myChart" width="300" height="100"></canvas>
        </div>
        <input type="hidden" value="{{ json_encode($chartData['label']) }}"
               id="labels">
        <input type="hidden"
               value="{{ json_encode($chartData['datasetsData']) }}"
               id="datasetsData">
    </div>
@endsection
@push('javascripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  
    <script>
        $(document).on('change', '#date', function () {
            let date = $(this).val();
            let urlSearchParams = new URLSearchParams(window.location.search);
            urlSearchParams.set('date', date);
            window.location.search = urlSearchParams.toString();
        });
        let ctx = document.getElementById('myChart');
        const labels = JSON.parse($('#labels').val())
        const data = JSON.parse($('#datasetsData').val())
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'số lượng sản phẩm bán được',
                    data: data,
                    borderWidth: 1,
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                      ],
                    borderColor: 'rgba(0, 128, 128, 0.7)',
                   
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        maxBarThickness: 50
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        
                        }
                    }]
                },
                title:{
                    display:true,
                    text:'Biểu đồ thống kê số lượng sản phẩm bán theo ngày ',
                    fontSize:25
                  },
               
                
            }
            
        });

    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endpush
