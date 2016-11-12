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
                    <li><a href="#">Sản phẩm</a></li>
                    <li class="active">Loại sản phẩm</li>
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
                    
                    <table id="datatable" class="table table-striped table-bordered" name="datatable">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>id</th>
                          <th>Mã loại</th>
                          <th>Tên loại</th>
                          <th><center><a href="{{ route('getLSPThem') }}">Thêm</a></center></th>
                         
                        </tr>
                      </thead>
                        <?php $stt = 0; ?>
                          @foreach($lsp as $item)
                          <?php $stt++; ?>

                      <tbody>
                        <tr>
                          <td>{!! $stt !!}</td>
                          <td>{!! $item->id !!}</td>
                          <td>{!! $item->MaLoai !!}</td>
                          <td>{!! $item->TenLoai !!}</td>
                          <td>
                          <center>
                          
                            <a href="{!! route('getLSPSua',['id'=>$item->id]) !!}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Sửa </a>
                            <a href="{!! route('getLoaiSPXoa',['id'=>$item->id]) !!}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xóa </a>
                          </center>
                          </td>
                          
                        </tr>
                       
                        </tbody>
                  

                        @endforeach
                    </table>
                      
                      

                  </div>
                </div>
              </div>
            </div>

            <!-- Table dynamics -->
</div>

    <!-- End Content -->

@endsection