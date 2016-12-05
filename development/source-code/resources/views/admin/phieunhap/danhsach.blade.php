@extends('admin.layouts.main')

@section('title','Sản Phẩm')

@section('content')
    <!--Begin Content -->

    <div class="row tile_count">
              <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="#">Phiếu nhập</a></li>
                    <li class="active">Danh sách phiếu nhập</li>
                </ul>
                </h2>
              </div>

                 
           

              <div class="title_right">
                
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                 <form action="{{ URL::Route('getSPList')}}" method="GET" name="form_search_sp">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm nhanh ... " name="search" id="search" 
                    value ="<?php if(isset($_GET['search'])) {echo $_GET['search']; }?>">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">Tìm</button>
                    </span>
                  </div>
                </form>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
            <form action="{{ URL::Route('danh_sach_phieu_nhap')}}" method="GET" name="form_ad_search_pn">

              <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                         <select class="form-control" name="month" id="month" onchange ="this.form.submit()">
                            <option value="">Tháng</option>
                         @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" <?php if (isset($_GET['month']) && $_GET['month'] == $i) echo 'selected'; ?>>Tháng {{ $i }}</option>
                        @endfor

                          
                            </select>
                </div>
              </div>


        
              


            </form>
            </div>

            <div class="clearfix"></div>

            <!-- Table dynamics -->
             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
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
                          <th>Mã phiếu nhập</th>
                          <th>Tổng tiền</th>
                          <th>Ngày xuất hóa đơn</th>
                          <th>Ngày cập nhật</th>
                          <th><center><a href="{!! route('get_them_phieu_nhap') !!}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Thêm </a></center></th>
                        
                         
                        </tr>
                      </thead>
                      <?php $stt = 0; ?>
                          @foreach($phieunhap as $item)
                          <?php
                         
                           $stt++; ?>

                      <tbody>
                        <tr>
                          <td>{!! $stt !!}</td>
                          <td>{!!  $item->MaPhieuNhap !!}</td>
                           <td>{!!  (float)$item->TongTien !!}</td>
                           <td>{!!  $item->NgayXuatHoaDon !!}</td>
                           <td>{!!  $item->NgayCapNhat!!}</td>
                          <td>
                          <center>
                    
                            <a href="{!! route('get_chi_tiet_phieu_nhap',['id'=>$item->id]) !!}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Xem </a>
                            <a href="{!! route('getSpSua',['id'=>$item->id]) !!}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Thêm </a>
                          </center>
                          </td>
                          
                        </tr>
                        
                    
                       @endforeach 
                    </table>
                       <div class="pagination">{!! $phieunhap->appends(Request::except('page'))->render() !!}</div>
                     

                  </div>
                </div>
              </div>
            </div>

            <!-- Table dynamics -->
</div>

    <!-- End Content -->
<script>
function xacnhanxoa (msg) {
	if (window.confirm(msg)) {
		return true;
	}
	return false;
}
</script>
@endsection