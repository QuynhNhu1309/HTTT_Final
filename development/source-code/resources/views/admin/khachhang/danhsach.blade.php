@extends('admin.layouts.main')

@section('title','Trang chủ')

@section('content')
    <!--Begin Content -->

    <div class="">
              <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="#">Thông tin cá nhân</a></li>
                    <li class="active">Khách hàng</li>
                </ul>
                </h2>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." name="search_input" id="search_input">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button" onclick="search_function()">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <!-- Table dynamics -->
             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Khách hàng</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  @if(session('thongbao'))

                  <div class="alert alert-success" fade in>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('thongbao')}}
                  </div>
                  @endif

                    
                    <table id="datatable" class="table table-striped table-bordered" name="datatable">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Mã khách hàng</th>
                          <th>Họ tên</th>
                          <th>Địa chỉ</th>
                          <th>Điện thoại</th>
                          <th><center><a href="/admin/khachhang/them" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Thêm</a></center></th>
                         
                        </tr>
                      </thead>


                      <tbody>
                      <?php $stt = 0;?>
                      @foreach($danhsach_khachhang as $khachhang)

                      <?php $stt++; ?>
                        <tr>
                          <td>{{$stt}}</td>
                          <td>{{$khachhang->MaKhachHang}}</td>
                          <td>{{$khachhang->HoTen}}</td>
                          <td>{{$khachhang->DiaChi}}</td>
                          <td>{{$khachhang->DienThoai}}</td>
                          <td>
                          <center>
                            <a href="/admin/khachhang/chitiet/{{$khachhang->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Xem </a>
                            <!--<a href="/admin/khachhang/sua/{{$khachhang->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>-->
                          </center>
                          </td>
                          
                        </tr>
                        @endforeach
                        
                        </tr>
                        
                        </tbody>
                  

                        
                    </table>
                      <div class="pagination"> {{ $danhsach_khachhang->links() }} </div>
                      

                  </div>
                </div>
              </div>
            </div>

            <!-- Table dynamics -->
</div>

    <!-- End Content -->

@endsection