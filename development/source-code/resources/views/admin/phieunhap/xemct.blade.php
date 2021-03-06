@extends('admin.layouts.main')

@section('title','Phiếu nhập')

@section('content')
    <!--Begin Content -->

    <div class="row tile_count">
              <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="{!! route('danh_sach_phieu_nhap') !!}">Phiếu nhập</a></li>
                    <li class="active">Xem chi tiết</li>
                </ul>
                </h2>
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
                          <th>Tên sản phẩm</th>
                          <th>Gía nhập</th>
                          <th>Số lượng nhập</th>
                          <th>Thành tiền</th>
                          
                        
                         
                        </tr>
                      </thead>
                      <?php $stt = 0; ?>
                          @foreach($chi_tiet_phieu_nhap as $item)
                          <?php
                         
                           $stt++; ?>

                      <tbody>
                        <tr>
                          <td>{!! $stt !!}</td>
                           <td>{!!  $item->TenSP !!}</td>
                           <td>{!!  (float)$item->GiaNhap !!}</td>
                           <td>{!!  $item->SoLuongNhap !!}</td>
                           <td>{!!  (float)$item->ThanhTien !!}</td>
                          
                          
                        </tr>
                        
                    
                       @endforeach 
                    </table>
                       <div class="pagination">{!! $chi_tiet_phieu_nhap->appends(Request::except('page'))->render() !!}</div>
                     

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