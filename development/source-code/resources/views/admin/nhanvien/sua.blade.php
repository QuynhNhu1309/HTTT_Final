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
                    <li><a href="{!! route('danh_sach_nhan_vien') !!}">Thông tin cá nhân</a></li>
                    <li class="active">Nhân viên</li>
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
                  @if(session('thongbao'))

                  <div class="alert alert-success" fade in>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('thongbao')}}
                  </div>
                  @endif
                  <?php 

                    if(isset($chi_tiet_nhan_vien))
                    {

                  ?>
                  @foreach($chi_tiet_nhan_vien as $item)
                    <form action="{{ URL::Route('post_sua_nhanvien',['id'=>$item->id]) }}" method="POST" name="form_sua_nv" ng-app="myApp_sua_nv" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{asset('assets/img/'.$item->HinhDaiDien)}}" alt="Avatar" title="Change the avatar" width ="220px" height ="220px">
                        </div>
                      </div>
                      <h3>Samuel Doe</h3>
                      <input type="file" name="upload_img" />

                      <ul class="list-unstyled user_data">
                        <li>
                            <div class="form-group">
                                <br/>
                                <label>Mã nhân viên</label>
                                <input type="text" class="form-control border-input" readonly value="{!! $item->MaTaiKhoan !!}">
                            </div>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> 
                          <?php
                                if($item->idGroup ==1)
                                echo 'Nhân viên bán hàng';
                                else if ($item->idGroup ==2)
                                echo "Quản lý kho";
                          ?>
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
                                                <input type="text" class="form-control border-input" name ="txt_hoten"  placeholder="Họ và tên" value="{!! $item ->HoTen !!}">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input type="text" class="form-control border-input" name ="txt_ten_dang_nhap" placeholder="Username" value="{!! $item->Username !!}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="txt_email">Email</label>
                                                <input type="email" class="form-control border-input" name="txt_email"placeholder="Email" value ="{!! $item->Email !!}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <label>Giới tính</label>
                                                <br/>
                                                <input type="radio" name="gender" value="6" <?php if($item->GioiTinh == 6) echo "checked ='checked'"; ?>> Nam
                                                <span style="padding-left: 5em;"></span>
                                                <input type="radio" name="gender" value="7" <?php if($item->GioiTinh == 7) echo "checked ='checked'"; ?>> Nữ
                                                <span style="padding-left: 5em;"></span>
                                                 <input type="radio" name="gender" value="8" <?php if($item->GioiTinh == 8) echo "checked ='checked'"; ?>> Khác
                                                <span style="padding-left: 6em;"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control border-input" placeholder="Số điện thoại" name ="txt_sdt" value="{!! $item->DienThoai !!}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control border-input" placeholder="Địa chỉ" name ="txt_diachi" value="{!! $item->DiaChi !!}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Lương</label>
                                                <input type="text" class="form-control border-input" placeholder="Lương" name ="txt_luong" value="{!! $item->Luong !!}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ngày tạo</label>
                                                 <input type="text" class="form-control border-input" name ="txt_ngaytao" value="{!! $item->NgayDangKy !!}" readonly>
                                           
                                            </div>
                                            </div>
                                    
                                        <div class="col-md-4">
                                            <div class="form-group">                              
                                                <label>Ngày cập nhật</label>
                                                <input type="text" class="form-control border-input" name ="txt_ngaycapnhat" value="{!! $item->NgayCapNhat !!}" readonly>
                                            </div>   
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Chức vụ</label>
                                                <select class="form-control" name="cb_chucvu" id="cb_chucvu">

                                                     <option value="1" <?php if($item->idGroup == 1) echo "selected"; ?>>Bán hàng</option>
                                                    <option value="2" <?php if($item->idGroup == 2) echo "selected"; ?> >Quản lý kho</option>

                                                 </select>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="text-center">
                                        <br/>
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Cập nhật</button>
                                        <button type="reset" class="btn btn-success btn-fill btn-wd">Hủy</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                      

                     
                    </div>



                        @endforeach
                    <?php } //end if $chi_tiet_nhan_vien ?>
                  </div>
                </div>
              </div>
            </div>
          
        </div>
        <!-- /page content -->
       
       @endsection