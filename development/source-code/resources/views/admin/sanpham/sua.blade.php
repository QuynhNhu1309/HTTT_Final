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

                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <div class="product-image">
                        <img src="../../assets/img/prod-1.jpg" alt="..." />
                      </div>
                      <div class="product_gallery">
                        <a>
                          <img src="../../assets/img/prod-2.jpg" alt="..." />
                        </a>
                        <a>
                          <img src="../../assets/img/prod-3.jpg" alt="..." />
                        </a>
                        <a>
                          <img src="../../assets/img/prod-4.jpg" alt="..." />
                        </a>
                        <a>
                          <img src="../../assets/img/prod-5.jpg" alt="..." />
                        </a>
                      </div>
                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                     @foreach($sps as $item)   
                      <h3 class="prod_title">{!!  $item->TenSP !!}</h3>

                      <p>{!!  $item->MoTa !!}</p>
                      <br />

                      <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask">

                      
                   

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control">
                            <option>Chọn Loại</option>
                            @foreach($lsp as $lsp)
                            <option value="{!!  $lsp->MaLoai !!}">{!!  $lsp->TenLoai !!}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên Sản Phẩm</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Default Input" value="{!!  $item->TenSP !!}">
                        </div>
                      </div>

                                            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Input</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                      </div>

                                            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Input</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                      </div>

                                            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Input</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                      </div>

                                            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Input</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                      </div>

                                            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Input</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                      </div>

                                            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Input</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                      </div>
                      @endforeach
                    
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Lưu</button>
                          <button type="submit" class="btn btn-success">Quay về</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
                      <br />

                   
                </div>
              </div>
            </div>
          </div>
        </div>

    <!-- End Content -->

@endsection