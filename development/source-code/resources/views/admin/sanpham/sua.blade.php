@extends('admin.layouts.main')

@section('title','Chi tiết sản phẩm')

@section('content')
    <!--Begin Content -->



          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>
                <ul class="breadcrumb">
                    <li><a href="#">Sản phẩm</a></li>
                    @foreach($sps as $item)
                    <li class="active">{!!  $item->TenSP !!}</li>
                    @endforeach
                </ul>
                </h2>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                @foreach($sps as $item) 
                  <form class="form-horizontal form-label-left input_mask" action="{{ URL::Route('postSpSua',['id'=>$item->id]) }}" method="POST" name="form_sua_sp" enctype="multipart/form-data" ng-app="myApp" 
                  ng-controller="myCtrl">
                   {{ csrf_field() }}
                  <div class="x_title">
                    <h2>{!!  $item->TenSP !!}</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     @if(count($errors) > 0 )
                  <div class="alert alert-danger" fade in>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach($errors->all() as $err)
                        {{ $err }}<br/>
                    @endforeach
                  </div>
                  @endif
                  @if(session('thongbao'))

                  <div class="alert alert-success" fade in>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('thongbao')}}
                  </div>
                  @endif
                    <div class="col-md-8 col-sm-8 col-xs-12" >

                    
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="txt_loaisp">
                            @foreach($lsp as $lsp)
                            <option value="{!!  $lsp->id !!}" <?php if($item->idLoai == $lsp->id) echo  "selected";?>>
                            {!!  $lsp->TenLoai !!}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã sản phẩm</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_masp" required="required" class="form-control col-md-7 col-xs-12" value="{{ $item->MaSP }}" readonly/>                          
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên Sản Phẩm</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name ="txt_tensp" placeholder="Default Input" value="{!!  $item->TenSP !!}">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mô tả: <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <!--<input type="text" name="txt_mota" required="required" class="form-control col-md-7 col-xs-12" value=""/>   -->  
                          <textarea id="txt_mota" name="txt_mota" rows="7" required="required" class="form-control ckeditor col-md-7 col-xs-12" placeholder="Thêm mô tả vào đây">{{ $item->MoTa }}</textarea>                      
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
                          <input type="number" name="txt_gianhap" id ="txt_gianhap" required="required" class="form-control col-md-7 col-xs-12" value="{{ (float)$item->GiaNhap }}" oninput="Process_Cost()" />                          
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giá bán = <span class="required">Gía nhập  + 30% Gía nhập</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="txt_giaban" id ="txt_giaban" required="required" class="form-control col-md-7 col-xs-12" value="{{ (float)$item->GiaBan }}" readonly />                          
                        </div>
                      </div>

                    <!--- Khuyến mãi tối đa 30% -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phần trăm khuyến mãi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="txt_phantramKM" id ="txt_phantramKM" required="required" class="form-control col-md-7 col-xs-12" value="{{ (float)$item->PhanTramKM }}" oninput="Process_Cost()"/>                          
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giá bán hiện tại =  <span class="required">Gía bán - Gía bán * % KM</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="txt_giaban_hientai" id ="txt_giaban_hientai" required="required" class="form-control col-md-7 col-xs-12" readonly value="{{ (float)$item->GiaBanHienTai }}"/>                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng tồn</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="txt_soluong" value="{{ $item->SoLuongTonKho }}">
                        </div>
                      </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhà Sản Xuất</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="txt_nsx" required="required" value="{{ $item->NhaSanXuat }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày tạo</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="txt_ngay_tao" required="required" readonly value="{{ $item->NgayTao}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày cập nhật</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="txt_ngay_cap_nhat" required="required" readonly value="{{ $item->NgayCapNhat}}">
                        </div>
                      </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện</label>
                    <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-2">
                         <img src="{{asset('assets/img/'.$item->AnhDaiDien)}}" alt="..."  width ="220px" height ="220px"/>
                            <h4>Ảnh đại diện: {{$item->AnhDaiDien}}</h4>
                            <input type="file" name="anh_dai_dien" id="anh_1" />
                    </div>
                    </div> 
                        
                  </div>
               
                      
                      
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="row">
                            
                            <div class="col-md-11 col-sm-11 col-xs-12  col-md-offset-1">
                        <div style ="margin-top : 40px;"></div>
                          <img src="{{asset('assets/img/'.$item->AnhCT1)}}" alt="..." width ="220px" height ="220px"/>
                          <h4>Ảnh chi tiết 1: {{$item->AnhCT1}}</h4>
                            <input type="file" name="anh_ct_1" id="anh_ct_1" />
                            <br/>
                   
                          <img src="{{asset('assets/img/'.$item->AnhCT2)}}" alt="..." width ="220px" height ="220px"/>
                          <h4>Ảnh chi tiết 2: {{$item->AnhCT2}}</h4>
                      <input type="file" name="anh_ct_2" id="anh_ct_2"/>
                        <br/>
                        
                          <img src="{{asset('assets/img/'.$item->AnhCT3)}}" alt="..." width ="220px" height ="220px"/>
                          <h4>Ảnh chi tiết 3: {{$item->AnhCT3}}</h4>
                      <input type="file" name="anh_ct_3" id="anh_ct_3" />
                            </div>
                        </div>
                        
                      
                    </div>

                    

                    <br/><br/>
                      <div class="form-group">
                        <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-primary">Lưu</button>
                          <button type="reset" class="btn btn-success">Hủy</button>
                        </div>
                      </div>

                    
                      <br />

                   
                
              </div>
              </form>

              <script>
              function Process_Cost()
              {
                var gianhap = parseInt(document.getElementById("txt_gianhap").value);
                console.log(gianhap);
                var cm = gianhap*0.3;
                console.log(cm);
                var giaban = gianhap+gianhap*0.3;
                console.log(giaban);
                document.getElementById("txt_giaban").value = giaban;
                var phantramKM = parseInt(document.getElementById("txt_phantramKM").value);
                var giabanhientai = giaban - giaban* phantramKM/100;
                document.getElementById("txt_giaban_hientai").value = giabanhientai;
                console.log(giabanhientai)
              }


              </script>

              
               @endforeach
            </div>
          </div>
        </div>

    <!-- End Content -->

@endsection

 