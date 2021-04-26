@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Sửa người dùng</h5>
    <div class="card-body">
      <form method="post" action="">

        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Tên</label>
          <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{old('name')}}" class="form-control">
 
          </div>
  
          <div class="form-group">
              <label for="inputEmail" class="col-form-label">Email</label>
            <input id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{old('email')}}" class="form-control">
         
          </div>
  
          <div class="form-group">
              <label for="inputPassword" class="col-form-label">Password</label>
            <input id="inputPassword" type="password" name="password" placeholder="Enter password"  value="{{old('password')}}" class="form-control">
     
          </div>
  
          <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Photo</label>
     
          <input type="file" id="photoUsers"  name="photoUsers" class="form-control " />
      
         
          </div>
        <div class="form-group">
            <label for="role" class="col-form-label">Role</label>
            <select name="role" class="form-control">
                <option value="">-----Select Role-----</option>
               
            </select>
     
        </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Hoạt đông</option>
              <option value="inactive">Không hoạt động</option>
          </select>
     
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Quay lại</button>
           <button class="btn btn-success" type="submit">Cập nhật</button>
        </div>
      </form>
    </div>
</div>

@endsection
