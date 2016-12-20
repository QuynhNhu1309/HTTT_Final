@extends('admin.layouts.main')

@section('title','Chi tiết báo cáo hết hàng')

@section('content')
    <!--Begin Content -->

<div class="row tile_count">
              <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="#">Sản phẩm</a></li>
                    <li class="active">Chi tiết báo cáo hết hàng</li>
                    <?php if(Auth::user()->idGroup == 1 || Auth::user()->idGroup == 2    )
                      {?>
                    <button class="btn"><a href="{{ URL::Route('getSPList_hethang')}}">Báo hết hàng</a></button>
                    <?php } ?>
                
                </ul>
               
                </h2>
           
              </div>

                 
           

              
            </div>
            
            <div class="clearfix"></div>

           

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
                          <th>STT</th>
                          <th>Mã Sản Phẩm</th>
                          <th>Loại sản phẩm</th>
                          <th>Tên Sản Phẩm</th>
                          <th>Số lượng</th>
                          <th>Giá Nhập</th>
                       </tr>
                      </thead>

                      <tbody>
                        @foreach ($dsctbaocao as $key=>$ctbaocao)
                          <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$ctbaocao->san_pham->MaSP}}</td>
                            <td>{{$ctbaocao->loai->TenLoai}}</td>
                            <td>{{$ctbaocao->san_pham->TenSP}}</td>
                            <td>{{$ctbaocao->san_pham->SoLuongTonKho}}</td>
                            <td>{{$ctbaocao->san_pham->GiaNhap}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                      
                          <a class="btn btn-default" href="{{ URL::previous() }}">Quay lại</a>
                    </table>
                          
                            </form>
                    

                  
                    

                        
                       
                      
                     

                  </div>
                </div>

                

              </div>

               

            </div>

            <!-- Table dynamics -->

           
</div>

@endsection

<!-- assets/js/Chart_custom.js -->