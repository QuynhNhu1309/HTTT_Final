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
                    <button class="btn"><a href="/admin/donhang/them">Báo hết hàng</a></button>
                
                </ul>
               
                </h2>
           
              </div>

                 
           

              <div class="title_right">
                
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                 <form action="{{ URL::Route('getSPList_hethang')}}" method="GET" name="form_search_sp">
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
            <form action="{{ URL::Route('getSPList_hethang')}}" method="GET" name="form_ad_search_nv">

              <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                         <select class="form-control" name="status" id="status">
                            <option value="">Tình trạng</option>

                            <option value="2" <?php if (isset($_GET['status']) && $_GET['status'] == 2) echo 'selected'; ?>>Sắp hết hàng</option>

                            <option value="3" <?php if (isset($_GET['status']) && $_GET['status'] == 3) echo 'selected'; ?>>Hết hàng</option>
                            </select>
                </div>
              </div>

              <div class="col-md-1 col-sm-1 col-xs-12">
                <div class="form-group">
                     
                      <button class="btn btn-default" type="submit">Lọc</button>
                      
                </div>

              </div>
               <div class="col-md-1 col-sm-1 col-xs-12">
                <div class="form-group">
                     
                      <a href="{{ URL::Route('getHetHang')}}"><button class="btn btn-default" type="button">Xem báo cáo</button></a>
                      
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
                  <form method="POST" action="{!! route('postHetHang') !!}"> 
                   {{ csrf_field() }}
                    <table id="datatable_SPhethang" class="table table-striped table-bordered" name="datatable_SPhethang">
                      <thead>
                        <tr>
                          <th></th>
                          <th>STT</th>
                          <th>Mã SP</th>
                          <th>Loại SP</th>
                          <th>Tên SP</th>
                          <th>Số lượng</th>
                          <th>Giá bán</th>
                          
                        
                         
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
                          <td><input type="checkbox"  name="idSanPham[]" value="{!!  $item->id !!}"></td>
                          <td>{!! $stt !!}</td>
                          <td>{!!  $item->MaSP !!}</td>
                           <td>{!!  $item_lsp->TenLoai !!}</td>
                           <td>{!!  $item->TenSP !!}</td>
                           <td>{!!  $item->SoLuongTonKho !!}</td>
                           <td>{!!  (float)$item->GiaBan !!}</td>    
            
                      
                          
                        </tr>
                        
                          <?php } ?>
                          @endforeach 
                       @endforeach 
                    </table>
                          <div class="form-group">
                          <label for="comment">Ghi chú</label>
                          <textarea class="form-control" name="ghiChu" rows="5" id="ghiChu"></textarea>
                          </div>
                            <center><button type="submit" class="btn btn-default">Gửi</button></center>
                            </form>
                    

                  
                    

                        
                       <div class="pagination">{!! $sp->appends(Request::except('page'))->render() !!}</div>
                      
                     

                  </div>
                </div>

                

              </div>

               

            </div>

            <!-- Table dynamics -->

           
</div>

    <!-- End Content -->

@endsection