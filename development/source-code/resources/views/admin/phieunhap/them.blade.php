@extends('admin.layouts.main')

@section('title','Thêm Phiếu Nhập mới')

@section('content')
    <!--Begin Content -->



          <div class="" ng-controller="NhapSanPhamCtrl">
            <div class="page-title">
              <div class="col-md-7">
                <h2>
                <ul class="breadcrumb">
                    <li><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#themmoi">Thêm sản phẩm mới</button></li>
                    <li>
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#them">Thêm sản phẩm</button>
                    </li>
                    <li>
                      <a class="btn btn-info" href="{{ URL::Route('get_danh_sach_bao_cao') }}">Danh sách báo cáo</a>
                    </li>
                </ul>
                </h2>
              </div>

              
            </div>
            
            <div class="clearfix"></div>
            <!-- Thêm sản phẩm đã tồn tại -->
              <div class="row collapse" id="them" >
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel " >
                <div class="x_content" >

                 <form class="form-horizontal form-label-left input_mask" action="{{URL::Route('post_them_phieu_nhap')}}" name= "form_nhap_san_pham" method="POST">
                                        {{csrf_field()}}
                 <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" ng-model="maSanPham" class="form-control" placeholder="Nhập mã sản phẩm" name="ma_san_pham" id="ma_san_pham">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" ng-click="submitSanPham()">Tìm</button>
                                    </span>
                            </div>
                        </div>

                        <div class="x_content" ng-show="panelSanPhamShow">
                            <table id="datatable" class="table table-striped table-bordered" name="datatable">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">STT</th>
                                        <th class="col-md-1">Mã sản phẩm</th>
                                        <th class="col-md-1">Tên sản phẩm</th>
                                        <th class="col-md-1">Gía nhập</th>
                                        <th class="col-md-1">Số lượng</th>
                                        <th class="col-md-1">Thành tiền</th>
                                        <th class="col-md-1">Chức năng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr ng-repeat="sanpham in sanPhamInfo | orderBy : 'MaSP'">
                                        <td>@{{$index + 1}}</td>
                                        <td>@{{sanpham.MaSP}}</td>
                                        <td>@{{sanpham.TenSP}}</td>
                                        <td>
                                            <input type="number" ng-model="sanpham.GiaBanHienTai" class="form-control" name="so_luong" id="so_luong">
                                        </td>
                                        
                                        <td> 
                                            <input type="number" ng-model="sanpham.soLuong" class="form-control" name="so_luong" id="so_luong">
                                        </td>
                                        <td>@{{sanpham.GiaBanHienTai*sanpham.soLuong}}</td>
                                        <td>
                                            <center>
                                                <button class="btn btn-danger btn-xs" ng-click ="removeSanPham(sanpham.MaSP)"><i class="fa fa-trash-o"></i> Delete </button>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>   
                                        <td colspan="5" class="text-right"><strong>Tổng tiền</strong></td>
                                        <td colspan="2">@{{getTotal()}}</td>
                                    </tr>
                                </tfoot>
                            </table>

                           
                        </div>

                         <div class="text-right">
                <button class="btn btn-primary btn-hoan-tat" type="button" ng-click="submitDonHang(form_nhap_san_pham.$valid)">Hoàn tất</button>
            </div>
                        </form>
                </div>
                </div>
                </div>

              </div>
              <!-- End thêm sản phẩm đã tồn tại -->
              <div class="row collapse" id="themmoi">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel " >
                 
                 
                  <div class="x_content" >

                   @if(count($errors) > 0 )
                  <div class="alert alert-danger" fade in>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach($errors->all() as $err)
                        {{ $err }}<br/>
                    @endforeach
                  </div>
                  @endif
                    <br />

                     @if(session('thongbao'))

                  <div class="alert alert-success" fade in>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('thongbao')}}
                  </div>
                  @endif
                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ URL::Route('post_them_phieu_nhap') }}" enctype="multipart/form-data" ng-app="">
                        {{ csrf_field() }}
                      

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại sản phẩm</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="txt_loaisp">
                            @foreach($data as $item)
                            <option value="{!! $item->id !!}">{!! $item->TenLoai !!}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên SP: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_tensp" required="required" class="form-control col-md-7 col-xs-12" value=""/>                          
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mô tả: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<input type="text" name="txt_mota" required="required" class="form-control col-md-7 col-xs-12" value=""/>   -->  
                          <textarea id="txt_mota" name="txt_mota" rows="7" required="required" class="form-control ckeditor col-md-7 col-xs-12" placeholder="Thêm mô tả vào đây"></textarea>                      
                                <script type="text/javascript">
                                      CKEDITOR.replace( 'txt_mota',
                                      {
                                        customConfig : 'config.js',
                                        toolbar : 'simple'
                                        })
                              </script> 
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giá nhập: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="txt_gianhap" required="required" ng-model="txt_gianhap" class="form-control col-md-7 col-xs-12" value="" ng-value="txt_gianhap"/>                          
                          @{{txt_gianhap}}
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giá bán = <span class="required">Gía nhập  + 30% Gía nhập</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="txt_giaban" required="required" class="form-control col-md-7 col-xs-12" ng-model="txt_gianhap + txt_gianhap*0.3" ng-value="txt_giaban" readonly/>                          
                        </div>
                      </div>

                    <!--- Khuyến mãi tối đa 30% -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phần trăm khuyến mãi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="txt_phantramKM" required="required" class="form-control col-md-7 col-xs-12" value="" ng-value="txt_phantramKM" ng-model="txt_phantramKM"/>                          
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giá bán hiện tại =  <span class="required">Gía bán - Gía bán * % KM</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="txt_giaban_hientai" required="required" class="form-control col-md-7 col-xs-12" ng-model="(txt_gianhap + txt_gianhap * 0.3) - (txt_gianhap + txt_gianhap * 0.3)* txt_phantramKM/100" readonly/>                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Số lượng tồn: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_soluong" required="required" class="form-control col-md-7 col-xs-12" value=""/>                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nhà Sản Xuất: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_nsx" required="required" class="form-control col-md-7 col-xs-12" value=""/>                          
                        </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="anh_dai_dien" id="anh_1">
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh chi tiết 1:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="anh_ct_1" id="anh_ct_1">
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh chi tiết 2:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="anh_ct_2" id="anh_ct_2">
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh chi tiết 3:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="anh_ct_3" id="anh_ct_3">
                      </div>
                      </div>

                    
                   
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="btnLSPSua" class="btn btn-primary">Thêm</button>
                          <button type="reset" class="btn btn-success">Hủy</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

  
        </div>

    <!-- End Content -->

@endsection