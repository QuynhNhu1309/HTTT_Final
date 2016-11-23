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
                           <td>{!!  $item->GiaBan !!}</td>    
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
                       <div class="pagination"> {{ $sp->links() }} </div>
                     

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