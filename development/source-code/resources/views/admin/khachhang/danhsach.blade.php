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
                  <form action="{{ URL::Route('danh_sach_khach_hang')}}" method="GET" name="form_search_kh">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm nhanh ... " name="search" id="search" 
                    value ="<?php if(isset($_GET['search'])) {echo $_GET['search']; }?>">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">Tìm1</button>
                    </span>
                  </div>
                </form>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

             <div class="row">
            <form action="{{ URL::Route('danh_sach_khach_hang')}}" method="GET" name="form_ad_search_nv">

              <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">

                         <select class="form-control" name="chucvu" id="chucvu" >
                            <option value="">Chức vụ</option>
                         @foreach($khachhhang_sort_NguoiTao as $item)
                            <option value="{{ $item->id}}" <?php if (isset($_GET['chucvu']) && $_GET['chucvu'] == $item->id) echo 'selected'; ?>>{{ $item->TinhTrang }}</option>
                        @endforeach
                            </select>
                </div>
              </div>

              

              <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                         <select class="form-control" name="sapxep" id="sapxep">
                            <option value="">Sắp xếp</option>
                            <option value="1" 
                            <?php if(isset($_GET['sapxep']) && $_GET['sapxep'] == 1) echo 'selected'; ?>>Tăng dần</option>
                            <option value="2" <?php if(isset($_GET['sapxep']) && $_GET['sapxep'] == 2) echo 'selected'; ?>>Gỉam dần</option>
                            </select>
                </div>
              </div>

              <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm ... " name="key" id="key" 
                    value ="<?php if(isset($_GET['key'])) {echo $_GET['key']; }?>">
                  </div>
              </div>


              <div class="col-md-1 col-sm-1 col-xs-12">
                <div class="form-group">
                     
                      <button class="btn btn-default" type="submit">Lọc</button>
                  
                </div>
              </div>


            </form>
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
                        

                        
                        </tbody>
                  

                        
                    </table>

                      <div class="pagination">{!! $danhsach_khachhang->appends(Request::except('page'))->render() !!}</div>
                      

                  </div>
                </div>
              </div>
            </div>

            <!-- Table dynamics -->
</div>

    <!-- End Content -->

@endsection