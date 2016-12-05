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
                    <li><a href="#">Sản phẩm</a></li>
                    <li class="active">Danh sách sản phẩm</li>
                    <button class="btn"><a href="{{ URL::Route('getSPList_hethang')}}">Báo hết hàng</a></button>
                
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
            <form action="{{ URL::Route('getSPList')}}" method="GET" name="form_ad_search_nv">

            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">

                         <select class="form-control" name="s_loaisp" id="s_loaisp" >
                            <option value="">Loại sản phẩm</option>
                         @foreach($loaisp as $item)
                            <option value="{{ $item->id}}" <?php if (isset($_GET['s_loaisp']) && $_GET['s_loaisp'] == $item->id) echo 'selected'; ?>>{{ $item->TenLoai }}</option>
                        @endforeach
                            </select>
                </div>
              </div>


              <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                         <select class="form-control" name="status" id="status">
                            <option value="">Tình trạng</option>
                        
                            <option value="1" <?php if (isset($_GET['status']) && $_GET['status'] == 1) echo 'selected'; ?>>Còn hàng</option>

                            <option value="2" <?php if (isset($_GET['status']) && $_GET['status'] == 2) echo 'selected'; ?>>Sắp hết hàng</option>

                            <option value="3" <?php if (isset($_GET['status']) && $_GET['status'] == 3) echo 'selected'; ?>>Hết hàng</option>
                            </select>
                </div>
              </div>


              <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="row">
                  <div class="form-group">
                  
                      <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="number" class="form-control " placeholder="Gía thấp" name="cost_min" id="cost_min" 
                          value ="<?php if(isset($_GET['cost_min'])) {echo $_GET['cost_min']; }?>">
                        </div>

                        <div class="col-md-1 col-sm-1 col-xs-12"><span style = "font-size : 20px;">></span></div>

                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="number" class="form-control" placeholder="Gía cao" name="cost_max" id="cost_max" 
                          value ="<?php if(isset($_GET['cost_max'])) {echo $_GET['cost_max']; }?>">
                          
                        </div>
                    </div>
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
                          <th>Mã SP</th>
                          <th>Loại SP</th>
                          <th>Tên SP</th>
                          <th>Số lượng</th>
                          <th>Giá bán</th>
                          <th><center><a href="{!! route('getSpThem') !!}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Thêm </a></center></th>
                        
                         
                        </tr>
                      </thead>
                      <?php $stt = 0; ?>
                          @foreach($sp as $item)
                            @foreach($loaisp as $item_lsp)
                          <?php
                          if($item->idLoai == $item_lsp->id) 
                          {
                           $stt++; ?>

                      <tbody>
                        <tr>
                          <td>{!! $stt !!}</td>
                          <td>{!!  $item->MaSP !!}</td>
                           <td>{!!  $item_lsp->TenLoai !!}</td>
                           <td>{!!  $item->TenSP !!}</td>
                           <td>{!!  $item->SoLuongTonKho !!}</td>
                           <td>{!!  (float)$item->GiaBan !!}</td>    
                          <td>
                          <center>
                    
                            <a href="{!! route('getSpSua',['id'=>$item->id]) !!}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Sửa </a>
                            <a href="{!! route('getSpXoa',['id'=>$item->id]) !!}" onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Sản Phẩm Này ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xóa </a>
                          </center>
                          </td>
                          
                        </tr>
                        
                          <?php } ?>
                          @endforeach 
                       @endforeach 
                    </table>
                       <div class="pagination">{!! $sp->appends(Request::except('page'))->render() !!}</div>
                     

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