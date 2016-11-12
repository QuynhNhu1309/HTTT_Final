@extends('admin.layouts.main')

@section('title','Thêm Sản Phẩm Mới')

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

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

                <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                      
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã SP: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_masp" required="required" class="form-control col-md-7 col-xs-12" value=""/>
                          
                        </div>

                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="txt_loaisp">
                            <option>Chọn</option>
                            @foreach($data as $item)
                            <option value="{!! $item->MaLoai !!}">{!! $item->TenLoai !!}</option>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên SP: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_mota" required="required" class="form-control col-md-7 col-xs-12" value=""/>                          
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giá bán: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_giaban" required="required" class="form-control col-md-7 col-xs-12" value=""/>                          
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giá bán hiện tại: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_giaban_hientai" required="required" class="form-control col-md-7 col-xs-12" value=""/>                          
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
                      <input type="file" name="anh_1" id="file">
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh chi tiết 1:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="anh_ct_1" id="file">
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh chi tiết 2:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="anh_ct_2" id="file">
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh chi tiết 3:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="anh_ct_3" id="file">
                      </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tình trạng</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="txt_tinhtrang">
                            <option>Chọn</option>
                            @foreach($data1 as $item1)
                            <option value="{!! $item1->id !!}">{!! $item1->TinhTrang !!}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                   
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="btnLSPSua" class="btn btn-primary">Thêm</button>
                          <button type="submit" class="btn btn-success">Submit</button>
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