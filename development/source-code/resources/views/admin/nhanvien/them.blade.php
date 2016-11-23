@extends('admin.layouts.main')

@section('title','Trang chủ')

@section('content')
    <!--Begin Content -->
        <!-- page content -->
        <div class="">
         
            <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="#">Thông tin cá nhân</a></li>
                    <li class="active">Thêm Nhân viên</li>
                </ul>
                </h2>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nhân viên</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  @if(count($errors) > 0 )
                  <div class="alert alert-danger" fade in>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach($errors->all() as $err)
                        {{ $err }}<br/>
                    @endforeach
                  </div>
                  @endif

                  
                    <form action="{{ URL::Route('post_nhan_vien_them') }}" method="POST" name="form_them_nv" ng-app="myApp_sua_nv" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{asset('assets/img/user.png')}}" alt="Avatar" title="Change the avatar" width ="220px" height ="220px">
                        </div>
                      </div>
                      <br/>
                      <input type="file" name="upload_img" />

                      <ul class="list-unstyled user_data">
                        <li>
                            <div class="form-group">
                                
                            </div>
                        </li>

                        <li>
                         
                        </li>

                        <li class="m-top-xs">

                        </li>
                      </ul>

                      
                      <br />

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Thông tin chi tiết</h2>
                        </div>
                      </div>
                        
                      <div class="col-md-12">
                        <div class="card">
                            <br/>
                            <div class="content">
                                
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input type="text" class="form-control border-input" name ="txt_hoten"  placeholder="Họ và tên" value="">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input type="text" class="form-control border-input" name ="txt_ten_dang_nhap" placeholder="Tên đăng nhập" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="txt_email">Email</label>
                                                <input type="email" class="form-control border-input" name="txt_email" placeholder="Email" value ="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <label>Giới tính</label>
                                                <br/>
                                                <input type="radio" name="gender" value="6" checked > Nam
                                                <span style="padding-left: 5em;"></span>
                                                <input type="radio" name="gender" value="7" > Nữ
                                                <span style="padding-left: 5em;"></span>
                                                 <input type="radio" name="gender" value="8" > Khác
                                                <span style="padding-left: 6em;"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control border-input" placeholder="Số điện thoại" name ="txt_sdt" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control border-input" placeholder="Địa chỉ" name ="txt_diachi" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Lương</label>
                                                <input type="text" class="form-control border-input" placeholder="Lương" name ="txt_luong" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                 <input type="password" class="form-control border-input" name ="txt_mat_khau" value="">
                                           
                                            </div>
                                            </div>
                                    
                                        <div class="col-md-4">
                                            <div class="form-group">                              
                                                <label>Nhập lại mật khẩu</label>
                                                <input type="password" class="form-control border-input" name ="txt_mat_khau_again" value="">
                                            </div>   
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Chức vụ</label>
                                                <select class="form-control" name="cb_chucvu" id="cb_chucvu">

                                                     <option value="1" >Bán hàng</option>
                                                    <option value="2">Quản lý kho</option>

                                                 </select>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="text-center">
                                        <br/>
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Thêm</button>
                                        <button type="reset" class="btn btn-success btn-fill btn-wd">Hủy</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                      

                     
                    </div>



                  </div>
                </div>
              </div>
            </div>
          
        </div>
        <!-- /page content -->
       
       @endsection