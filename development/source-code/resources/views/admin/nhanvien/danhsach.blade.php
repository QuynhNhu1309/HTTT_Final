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
                    <li class="active">Nhân viên</li>
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
                    <h2>Nhân viên</h2>
                    
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
                          <th>Mã</th>
                          <th>Họ tên</th>
                          <th>Tên đăng nhập</th>
                          <th>Chức vụ</th>
                          <th><center><a href="{!! route('get_nhan_vien_them') !!}" class="btn btn-info btn-xs"><i class="fa fa-plus-circle"></i> Thêm </a><center></th>
                          
                        </tr>
                      </thead>


                      <tbody>

                      <?php
                      
                              $stt = 0;
                              if(isset($danhsach_nhanvien))
                              {
                                
                      ?>
                      @foreach($danhsach_nhanvien as $item)
                          <?php $stt++; ?>
                        <tr>
                          <td>{{ $stt}}</td>
                          <td>{!! $item -> MaTaiKhoan !!}</td>
                          <td>{!! $item -> HoTen !!}</td>
                          <td>{!! $item -> Username !!}</td>
                          <td><?php if($item -> idGroup == 1) echo 'Bán hàng';
                                    else if ($item -> idGroup == 2)
                                    echo 'Quản lý kho';
                          
                          ?></td>
                          <td>
                          <center>
                            <a href="{!! route('get_sua_nhanvien', ['id'=>$item->id]) !!}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Sửa </a>
                            <?php 
                              if($item -> idTinhTrang == 4)
                              {
                            ?>
                            <a href="{!! route('get_nhan_vien_an', ['id'=>$item->id]) !!}" class="btn btn-warning btn-xs" style ="width: 50px;"><i class="fa fa-low-vision"></i> Ẩn</a>

                            <?php }
                            else if($item -> idTinhTrang == 5)
                            {
                              ?>
                              <a href="{!! route('get_nhan_vien_hien', ['id'=>$item->id]) !!}" class="btn btn-success btn-xs" style ="width: 50px;"><i class="fa fa-eye"></i>Hiện</a>


                           <?php  } ?>
                            
                          </center>
                          </td>
                          
                        </tr>
                        
                        @endforeach
                        <?php } ?>
                         
                        
                        </tbody>
                  

                        
                    </table>
                      
                     <!-- <div class="pagination_div">
                       <ul class="pagination pagination-sm">
                            <li><a href="#"><<</a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">>></a></li>
                          </ul>-->
                          <div class="pagination"> {{ $danhsach_nhanvien->links() }} </div>
                      
                      <!--</div> -->

                  </div>
                </div>
              </div>
            </div>

            <!-- Table dynamics -->
</div>

   <!-- End Content -->

@endsection