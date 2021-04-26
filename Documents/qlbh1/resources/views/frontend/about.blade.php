@extends('frontend.frontend-layout')
@section('content')
    <div class="container">
        <h5 class="my-4">Thông tin địa chỉ</h5>
        <div id="googleMap" style="width:100%;height:400px;"></div>
    </div>
@endsection
@push('javascripts')
    <script>
        function myMap() {
            var mapProp= {
                center:new google.maps.LatLng(51.508742,-0.120850),
                zoom:5,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
@endpush
