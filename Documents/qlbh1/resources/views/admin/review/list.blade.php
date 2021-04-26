@extends('admin.admin-layout')
@section('content')
<!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
       
         </div>
     </div>
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary float-left">Review</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <tr>
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Tên sản phẩm</th>
                <th>Review</th>
                <th>Đánh giá</th>
                <th>Ngày</th>
                <th>Tình trạng</th>
                <th>Hành động</th>
              </tr>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Khách hàng</th>
              <th>Tên sản phẩm</th>
              <th>Review</th>
              <th>Đánh giá</th>
              <th>Ngày</th>
              <th>Tình trạng</th>
              <th>Hành động</th>  
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td>ID</td>
              <td>Khách hàng</td>
              <td>Tên sản phẩm</td>
              <td>Review</td>
              <td><li style="float:left;color:#F7941D;"><i class="fa fa-star"></i></li></td>
              <td>Ngày</td>
              <td>Tình trạng</td>
              <td>
                <a href="" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <button class="btn btn-danger btn-sm dltBtn"  style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
              </td>  
          </tr>  
           
          </tbody>
        </table>
        <span style="float:right"></span>
       
      </div>
    </div>
</div>
@endsection

