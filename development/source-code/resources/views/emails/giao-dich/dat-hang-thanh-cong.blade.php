<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
</head>
<body>
<div style='width:100%;'>Chúc mừng quý khách đã đặt hàng thành công</div>
<div style='background:#eff0f4;border:1px solid #e2e2e2;margin-top:10px;width:100%'>
	<table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='100%'>
		<tbody>
			<tr style='padding:10px'>
				<td colspan='2' style='border-top:1px solid #eff0f4'>
					<table style='padding:7px 0'>
						<tbody>
							<tr>
								<td style='padding:2px 8px 0px 15px'>Mã số đơn hàng:</td>
								<td style='padding:2px 8px 0px 15px'><strong>{{ $giaoDich->id }}</strong></td> 
							</tr> 
							<tr>
								<td style='padding:2px 8px 0px 15px'>Thời gian đặt hàng:</td> 
								<td style='padding:2px 8px 0px 15px'><strong>{{ $giaoDich->thoi_gian_giao_dich }}</strong></td> </tr> 
							<tr>
								<td style='padding:2px 8px 0px 15px'>Phương thức vận chuyển:</td> 
								<td style='padding:2px 8px 0px 15px'><strong><span class='il'>Chút chít</span> vận chuyển</strong></td> </tr> 
							<tr>
								<td style='padding:2px 8px 0px 15px'>Phương thức thanh toán:</td> <td style='padding:2px 8px 0px 15px'><strong>{{ $giaoDich->giao_dich_cod }}</strong></td> 
							</tr> 
							<tr>
								<td style='padding:2px 8px 0px 15px'>Tên người nhận:</td> <td style='padding:2px 8px 0px 15px'><strong>{{ $giaoDich->ten_nguoi_nhan }}</strong></td> 
							</tr> 
							<tr>
								<td style='padding:2px 8px 0px 15px'>Số điện thoại người nhận:</td> <td style='padding:2px 8px 0px 15px'><strong>{{ $giaoDich->so_dien_thoai_giao_hang }}</strong></td> 
							</tr> 
							<tr>
								<td style='padding:2px 8px 0px 15px'>Địa chỉ người nhận:</td> <td style='padding:2px 8px 0px 15px'><strong>{{ $giaoDich->dia_chi_giao_hang }}</strong></td> 
							</tr> 
							<tr>
								<td style='padding:2px 8px 0px 15px'>Lưu ý về đơn hàng:</td> <td style='padding:2px 8px 0px 15px'><strong></strong></td> 
							</tr> 
						</tbody>
					</table> 
				</td> 
			</tr> 
		</tbody>
	</table> 
</div>
<div style='width:100%;height:30px;color:#F30;text-align:center'><p style='font-size:26px;font-weight:bold'>Chi Tiết Hóa Đơn</p> </div>
<table width='100%' border='1' style='border-collapse:collapse; font-size:15px; text-align:center;'>
	<tr style='background:red; font-size:18px; font-weight:bold; color:white;'>
		<td class='title' width='10%' height='50px' >STT</td>
		<td class='title' width='35%'>Tên Sản Phẩm</td>
		<td class='title' width='20%'>Số Lượng(cái)</td>
		<td class='title' width='25%'>Thành Tiền(vnđ)</td>
	</tr><tr>
    	    <td height='30px'>1</td>
    	    <td>Ba lô Deuter Challenger Blue</td>
    	    <td>2</td>
    	    <td>1.500.000</td>
  	    </tr><tr>
    	    <td height='30px'>2</td>
    	    <td>Ba lô  MCKinley Lynx 25 Blue</td>
    	    <td>5</td>
    	    <td>4.750.000</td>
  	    </tr><tr>
    	    <td height='30px'>3</td>
    	    <td>Đèn đeo trán Led Lenser NEO</td>
    	    <td>4</td>
    	    <td>3.080.000</td>
  	    </tr><tr>
    	    <td height='30px'>4</td>
    	    <td>Noname Boy</td>
    	    <td>1</td>
    	    <td>170.000</td>
  	    </tr></table><div style='width:100%;height:40px;margin-top:10px;'><div style='float:right; font-size:20px; font-weight:bold; color:#099;'><p>Tổng Tiền: <span  style='margin:auto 5px;color:#F30'>9.500.000 </span> VNĐ</p> </div> </div>
      </body></html>