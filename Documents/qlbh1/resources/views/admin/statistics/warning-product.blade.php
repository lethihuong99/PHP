@extends('admin.admin-layout')
@section('content')
    <div class="card">
        <h5 class="card-header">Sản phẩm sắp hết hàng</h5>
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
    
        let ctx = document.getElementById('myChart');
        const labels = JSON.parse($('#labels').val())
        const data = JSON.parse($('#datasetsData').val())
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# Số lượng',
                    data: data,
                    borderWidth: 1
                  
                   
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        maxBarThickness: 60
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title:{
                    display:true,
                    text:'Biểu đồ thống kê sản phẩm sắp hết hàng ',
                    fontSize:25
                  },
                
            }
        });
    </script>
@endpush