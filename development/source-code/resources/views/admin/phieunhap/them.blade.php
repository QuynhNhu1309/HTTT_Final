@extends('admin.layouts.main')

@section('title','Thêm Phiếu Nhập mới')

@section('content')
    <!--Begin Content -->



          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>
                <ul class="breadcrumb">
                    <li><a href="#">Thêm Sản Phẩm Mới</a></li>
                </ul>
                </h2>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

                <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                      
                  <div class="x_content">

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