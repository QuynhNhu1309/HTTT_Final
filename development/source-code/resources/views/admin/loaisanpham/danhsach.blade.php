@extends('admin.layouts.main')

@section('title','Trang chủ')

@section('content')
    <!--Begin Content -->

    <div class="row tile_count">
              <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="{{ Route('getSPList') }}">Sản phẩm</a></li>
                    <li class="active"><a href="{{ Route('getLoaiSPList') }}">Loại sản phẩm</a></li>
                </ul>
                </h2>
              </div>

                 
           

              <div class="title_right">
                
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                  <form action="{{ URL::Route('getLoaiSPList')}}" method="GET" name="form_search_lsp">
                  <div class="input-group">
                    
                    <input type="text" class="form-control" placeholder="Nhập tên loại..." name="search" id="search_lsp"  value ="<?php if(isset($_GET['search'])) {echo $_GET['search']; }?>">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">Tìm</button>
                    </span>
                  </div>
                  </form>

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
                          <th>Mã loại</th>
                          <th>Tên loại</th>
                          <th><center><a href="{!! route('getLSPThem') !!}" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> Thêm </a></center></th>
                         
                        </tr>
                      </thead>
                        <?php $stt = 0; ?>
                          @foreach($lsp as $item)
                          <?php $stt++; ?>

                      <tbody>
                        <tr>
                          <td>{!! $stt !!}</td>
                          <td>{!! $item->MaLoai !!}</td>
                          <td>{!! $item->TenLoai !!}</td>
                          <td>
                          <center>
                          
                            <a href="{!! route('getLSPSua',['id'=>$item->id]) !!}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Sửa </a>
                            <!--<a href="{!! route('getLoaiSPXoa',['id'=>$item->id]) !!}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xóa </a>-->
                          </center>
                          </td>
                          
                        </tr>
                       
                        </tbody>
                  

                        @endforeach
                    </table>
                      
                      <div class="pagination">{!! $lsp->appends(Request::except('page'))->render() !!}</div>
                      

                  </div>
                </div>
              </div>
            </div>

            <!-- Table dynamics -->
</div>

    <!-- End Content -->

@endsection