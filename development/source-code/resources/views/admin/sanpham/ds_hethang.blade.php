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
                    <table id="datatable_SPhethang" class="table table-striped table-bordered" name="datatable_SPhethang">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Mã SP</th>
                          <th>Loại SP</th>
                          <th>Tên SP</th>
                          <th>Số lượng</th>
                          <th>Giá bán</th>
                          <th><center><a href="{!! route('getSpThem') !!}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Thêm </a></center></th>
                        
                         
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
                          <td>{!! $stt !!}</td>
                          <td>{!!  $item->MaSP !!}</td>
                           <td>{!!  $item_lsp->TenLoai !!}</td>
                           <td>{!!  $item->TenSP !!}</td>
                           <td>{!!  $item->SoLuongTonKho !!}</td>
                           <td>{!!  (float)$item->GiaBan !!}</td>    
                          <td>
                          <center>
                    
                            <button class="btn" id ="{{ $item->id }}" onclick="BaoHetHang({{$item->id}}, '{{$item->MaSP}}')">Báo hết hàng</button>
                          </center>
                          </td>
                          
                        </tr>
                        
                          <?php } ?>
                          @endforeach 
                       @endforeach 
                    </table>


                     <table id="table_baocao" class="table table-striped table-bordered">
                       <thead>
                       </thead>
                       <tbody>
                       </tbody>
                        </table>

                        <p id="demo"></p>
                    

                        
                       <div class="pagination">{!! $sp->appends(Request::except('page'))->render() !!}</div>
                      
                     

                  </div>
                </div>

                

              </div>

               

            </div>

            <!-- Table dynamics -->

           
</div>

    <!-- End Content -->
<script>
var rows = "";
var rows_body = "";
var rows_foot ="";
var content ="";
var delete_rows ="";
var disable_button = "";
var str ="";
var array =[];

function BaoHetHang2 (id, MaSP) {
 
    //delete_rows = '<scrip>document.getElementById("datatable_SPhethang").deleteRow(1)</scrip>';
    str ="";
   
    content ="";
        rows = '<table id="table_baocao" class="table table-striped table-bordered"><tr><td>id</td><td>Mã</td></tr>';
        //$( rows ).appendTo( "#table_baocao thead" );
    rows_body = localStorage.getItem("rows_body_local");
     rows_body += "<tr><td>" + id + "</td><td>" + MaSP + "</td></tr>";

     rows_foot ="</table>";
     
     content = rows + rows_body + rows_foot;
    //  if (typeof(id) !== "undefined")
    //  {
    //   array.push(id);
    //  }

     if (localStorage.getItem('array1') === null) {
        array = [];
        array.push(id);
    } else {
         // Parse the serialized data back into an array of objects
         array = JSON.parse(localStorage.getItem('array1'));
     }
     // Push the new data (whether it be an object or anything else) onto the array
     array.push(id);
     
     
     

     for(i = 1; i < array.length; i++)
  {
    document.getElementById(""+ array[i] + "").disabled = true;
    ds = "document.getElementById("+ array[i] + ").disabled = true";
    console.log("id = "+array[i]);
  }
 
     
    // $( rows ).appendTo( "#table_baocao tbody" );

     if (typeof(Storage) !== "undefined") {
    // Store
    localStorage.setItem("rows_body_local", rows_body);
    localStorage.setItem("lastname", content);
    localStorage.setItem('array1', JSON.stringify(array));
    // localStorage.setItem("array1", JSON.stringify(array));
    //localStorage.setItem("id", id);
    
    //localStorage.setItem("disable_button", disable_button);
    // Retrieve
    document.getElementById("demo").innerHTML = localStorage.getItem("lastname");
} else {
    document.getElementById("demo").innerHTML = "Sorry, your browser does not support Web Storage...";
}

	
}

// document.getElementById("demo").innerHTML = localStorage.getItem("lastname");
// var rs = localStorage.getItem("lastname");
// //id = localStorage.getItem("id");
// // if(typeof(id) !== "undefined")
// // {
//    var retrievedData = localStorage.getItem("array1");
//      var array_convert = JSON.parse(retrievedData);
     
//      if( array_convert !== "undefined")
//      {
//        console.log(array_convert.length);
//    for(i = 1; i <= array_convert.length; i++)
//    {
//     document.getElementById(""+ array_convert[i] + "").disabled = true;
//     if(array_convert.length > 1)
//     {
//     document.getElementById(""+ array_convert[2] + "").disabled = true;
//     ds = 'document.getElementById("'+ array_convert[2] + '").disabled = true';
//     console.log(ds);
//     }
//      ds = 'document.getElementById("'+ array_convert[i] + '").disabled = true';
//      console.log(array_convert[i]);
//      console.log(ds);
//    }
 //    }
//}
// drs = "document.getElementById("+ id + ")";
// console.log(drs);
// console.log(id);

// localStorage.removeItem("lastname");
// localStorage.removeItem("disable_button");

function BaoHetHang4 (id, MaSP) {
  if(localStorage.getItem("lastname") != null)
  {
    localStorage.removeItem("lastname");
  }

   if(localStorage.getItem("id") != null )
  {
    localStorage.removeItem("id");
  }
   if(localStorage.getItem("rows_body_local") != null )
  {
    localStorage.removeItem("rows_body_local");
  }

   if(localStorage.getItem("array1") != null )
  {
    localStorage.removeItem("array1");
  }
}



function BaoHetHang (id, MaSP) {

    content ="";
    console.log("var_id = "+id);
    rows = '<table id="table_baocao" class="table table-striped table-bordered"><tr><td>id</td><td>Mã</td></tr>'; 
    rows_body = localStorage.getItem("rows_body_local");
    console.log(rows_body);
    rows_body += "<tr><td>" + id + "</td><td>" + MaSP + "</td></tr>";
    rows_foot ="</table>";
    content = rows + rows_body + rows_foot;
     console.log(content);
  
     if (localStorage.getItem('array1') === null) {
        array = [];
    } else {
         // Parse the serialized data back into an array of objects
         array = JSON.parse(localStorage.getItem('array1'));
     }
     // Push the new data (whether it be an object or anything else) onto the array
     array.push(id);
     
     console.log("arr = " +array[0]);

     for(i = 0; i < array.length; i++)
      {
         ds = "document.getElementById("+ array[i] + ").disabled = true";
        console.log("id_loop = "+array[i]);
        
              //document.getElementById(""+ array[i] + "").disabled = true;
          
       
      }
      //array = JSON.parse(localStorage.getItem('array1'));

     

     if (typeof(Storage) !== "undefined") 
     {
      // Store
      localStorage.setItem("rows_body_local", rows_body);
      localStorage.setItem("lastname", content);
      localStorage.setItem('array1', JSON.stringify(array));
      document.getElementById("demo").innerHTML = localStorage.getItem("lastname");

      for(i = 0; i < array.length; i++)
      {
         ds = 'document.getElementById("'+ array[i] + '").disabled = true';
         console.log(ds);
        console.log("id = "+array[i]);
        
              document.getElementById("'"+ array[i] + "'").disabled = true;
          
       
      }
    } 
    else 
    {
      document.getElementById("demo").innerHTML = "Sorry, your browser does not support Web Storage...";
    }

	
}

document.getElementById("demo").innerHTML = localStorage.getItem("lastname");
//id = localStorage.getItem("id");
// if(typeof(id) !== "undefined")
// {
   var retrievedData = localStorage.getItem("array1");
     var array_convert = JSON.parse(retrievedData);
     
     if( array_convert !== "undefined")
     {
       console.log("length = "+array_convert.length);
      
   for(i = 0; i < array_convert.length; i++)
   {
      console.log("abcd");
      if(array_convert.length > 1)
    {
      document.getElementById(""+ array_convert[i] + "").disabled = true;
    }
      ds = 'document.getElementById("'+ array_convert[i] + '").disabled = true';
      console.log(array_convert[i]);
      console.log(ds);
   }
    
}
 
  

</script>
@endsection