@extends('admin.layouts.main')

@section('title','Báo cáo hết hàng')

@section('content')
    <!--Begin Content -->

<div class="row tile_count">
              <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="#">Sản phẩm</a></li>
                    <li class="active">Báo cáo hết hàng</li>
                    <?php if(Auth::user()->idGroup == 1 || Auth::user()->idGroup == 2    )
                      {?>
                    <button class="btn"><a href="{{ URL::Route('getSPList_hethang')}}">Báo hết hàng</a></button>
                    <?php } ?>
                
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
                  
                    <table id="datatable_SPhethang" class="table table-striped table-bordered" name="datatable_SPhethang">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tài khoản</th>
                          <th>Ngày tạo</th>
                          <th>Ghi chú</th>
                          <th>Tình Trạng</th>
                          
                          <th>Chức năng</th>
                        
                          
                        
                         
                        </tr>
                      </thead>
                      <?php $stt = 0; ?>
                          @foreach($baocao as $item)
                            <?php $stt++ ?>
                              @foreach($taikhoan as $tk)
                      <tbody>
                        <tr>
                          
                          <td>{!! $stt !!}</td>
                           
                          <td>{!!  $item->tai_khoan->Username !!}</td>
                          
                           <td>{!!  $item->NgayTao !!}</td>
                           <td>{!!  $item->GhiChu !!}</td>
                           
                            <td>
                           <form method="POST" action="{{ URL::Route('updateHetHang')}}">
                           {{ csrf_field() }}
                          <input name="disabled" value="{!!  $item->tinh_trang->TinhTrang !!}" disabled>
                          <input type="hidden" name="idtinhTrang" value="{!!  $item->id !!}">
                          <?php if(Auth::user()->idGroup == 3 )
                      {?>
                          <button type="submit" class="btn btn-primary btn-sm">Duyệt</button>
                          <?php } ?>
                          </form>
                          </td>
                           <td>
                           <a href="{!! route('getCTHetHang',['id' => $item->id]) !!}">
                           <center><button type="button" class="btn btn-info">Xem</button>
                           </a></center>
                           </td>
                              
            
                      
                          
                        </tr>
                        
                          
                        @endforeach
                       @endforeach 
                      <?php if(Auth::user()->idGroup == 1  )
                      {?>
                          <a class="btn btn-default" href="{{ URL::previous() }}">Quay lại</a>
                          <?php } ?>
                    </table>
                          
                            
                    

                  
                    

                        
                       
                      
                     

                  </div>
                </div>

                

              </div>

               

            </div>

            <!-- Table dynamics -->

           
</div>

@endsection

<!-- assets/js/Chart_custom.js -->