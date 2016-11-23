$this ->validate($request, [
                            'txt_hoten' => 'required|max:50|min:10',
                            'txt_ten_dang_nhap' => 'required|max:20|min:5|unique:taikhoan,Username',
                            'txt_sdt' => 'required|numeric|unique:taikhoan,DienThoai',
                            'txt_diachi' => 'required',
                            'txt_luong' => 'required|numeric|min:200000|max:10000000',
                            'txt_email' => 'required|unique:taikhoan,Email',
                            'txt_mat_khau' =>'required|min:3|max:30',
                            'txt_mat_khau_again'=>'required|same:txt_mat_khau'


                            ],
                            ['txt_hoten.required'=>'Vui lòng nhập họ tên',
                            'txt_hoten.max'=>'Họ tên chứa ít nhất 10 kí tự, nhiều nhất 50 kí tự',
                            'txt_hoten.min'=>'Họ tên chứa ít nhất 10 kí tự, nhiều nhất 50 kí tự',

                             'txt_ten_dang_nhap.required'=>'Vui lòng nhập tên đăng nhập',
                             'txt_ten_dang_nhap.unique'=>'Tên đăng nhập này đã tồn tại',
                             'txt_ten_dang_nhap.max'=>'Tên đăng nhập chứa ít nhất 5 kí tự, nhiều nhất 20 kí tự',
                             'txt_ten_dang_nhap.min'=>'Tên đăng nhập chứa ít nhất 5 kí tự, nhiều nhất 20 kí tự',

                             'txt_diachi.required' => 'Vui lòng nhập địa chỉ',

                             'txt_sdt.required' => 'Vui lòng nhập số điện thoại',
                             'txt_sdt.unique'=>'Số điện thoại này đã tồn tại',
                             //'txt_sdt.max'=>'Số điện thoại chứa ít nhất 10 số, nhiều nhất 11 số',
                             //'txt_sdt.min'=>'Số điện thoại chứa ít nhất 10 số, nhiều nhất 11 1',
                             'txt_sdt.numeric' => 'Không phải số điện thoại',


                             'txt_luong.required' => 'Vui lòng nhập lương',
                             'txt_luong.max'=>'Lương > 2 000 000 VNĐ và < 10 000 000 VNĐ',
                             'txt_luong.min'=>'Lương > 2 000 000 VNĐ và < 10 000 000 VNĐ',
                             'txt_luong.numeric' => 'Không phải định dạng số',

                             'txt_email.required' => 'Vui lòng nhập email',
                             'txt_email.unique' => 'Email này đã tồn tại',

                             'txt_mat_khau.required' => 'Vui lòng nhập mật khẩu',
                             'txt_mat_khau.min' => 'Mật khẩu chứa ít nhất 3 kí tự, tối đa 30 kí tự',
                             'txt_mat_khau.max' => 'Mật khẩu chứa ít nhất 3 kí tự, tối đa 30 kí tự',

                             'txt_mat_khau_again.required' => 'Vui lòng nhập lại mật khẩu',
                             'txt_mat_khau_again.same' => 'Mật khẩu nhập lại chưa khớp'

                            
                            ]);
        $nv= new TaiKhoan;
        //$MaTaiKhoan = DB::select("EXEC Them_Lay_Ma_Tai_Khoan");//Tạo mã tài khoản
        //$nv->MaTaiKhoan = $MaTaiKhoan;
        $nv->HoTen = $request ->txt_hoten;
        $nv->Username = $request ->txt_ten_dang_nhap;
        $nv->Email = $request ->txt_email;
        $nv->GioiTinh = $request ->gender;
        $nv->DienThoai = $request ->txt_sdt;
        $nv->DiaChi = $request ->txt_diachi;
        $nv->Luong = $request ->txt_luong;
        $nv->idGroup = $request->cb_chucvu;
        $nv->Pass = bcrypt($request->txt_mat_khau);
        $nv->idTinhTrang = 4;
        $nv->NgayDangKy = date("Y-m-d H:i:s");
        $nv->NgayCapNhat = date("Y-m-d H:i:s");

        if(Input::file('upload_img'))
        {
        $name_img = Input::file('upload_img')->getClientOriginalName();
        Input::file('upload_img')->move("assets/img/", $name_img);
     
        $nv->HinhDaiDien = $name_img;
        }
        $nv ->save();
        //return redirect('get_sua_nhanvien', $id)->with('thongbao', 'Sửa thành công');
        return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Thêm thành công');
    $this ->validate($request, [
                            'txt_hoten' => 'required|max:50|min:10',
                            'txt_ten_dang_nhap' => 'required|max:20|min:5|unique:taikhoan,Username',
                            'txt_sdt' => 'required|numeric|unique:taikhoan,DienThoai',
                            'txt_diachi' => 'required',
                            'txt_luong' => 'required|numeric|min:200000|max:10000000',
                            'txt_email' => 'required|unique:taikhoan,Email',
                            'txt_mat_khau' =>'required|min:3|max:30',
                            'txt_mat_khau_again'=>'required|same:txt_mat_khau'


                            ],
                            ['txt_hoten.required'=>'Vui lòng nhập họ tên',
                            'txt_hoten.max'=>'Họ tên chứa ít nhất 10 kí tự, nhiều nhất 50 kí tự',
                            'txt_hoten.min'=>'Họ tên chứa ít nhất 10 kí tự, nhiều nhất 50 kí tự',

                             'txt_ten_dang_nhap.required'=>'Vui lòng nhập tên đăng nhập',
                             'txt_ten_dang_nhap.unique'=>'Tên đăng nhập này đã tồn tại',
                             'txt_ten_dang_nhap.max'=>'Tên đăng nhập chứa ít nhất 5 kí tự, nhiều nhất 20 kí tự',
                             'txt_ten_dang_nhap.min'=>'Tên đăng nhập chứa ít nhất 5 kí tự, nhiều nhất 20 kí tự',

                             'txt_diachi.required' => 'Vui lòng nhập địa chỉ',

                             'txt_sdt.required' => 'Vui lòng nhập số điện thoại',
                             'txt_sdt.unique'=>'Số điện thoại này đã tồn tại',
                             //'txt_sdt.max'=>'Số điện thoại chứa ít nhất 10 số, nhiều nhất 11 số',
                             //'txt_sdt.min'=>'Số điện thoại chứa ít nhất 10 số, nhiều nhất 11 1',
                             'txt_sdt.numeric' => 'Không phải số điện thoại',


                             'txt_luong.required' => 'Vui lòng nhập lương',
                             'txt_luong.max'=>'Lương > 2 000 000 VNĐ và < 10 000 000 VNĐ',
                             'txt_luong.min'=>'Lương > 2 000 000 VNĐ và < 10 000 000 VNĐ',
                             'txt_luong.numeric' => 'Không phải định dạng số',

                             'txt_email.required' => 'Vui lòng nhập email',
                             'txt_email.unique' => 'Email này đã tồn tại',

                             'txt_mat_khau.required' => 'Vui lòng nhập mật khẩu',
                             'txt_mat_khau.min' => 'Mật khẩu chứa ít nhất 3 kí tự, tối đa 30 kí tự',
                             'txt_mat_khau.max' => 'Mật khẩu chứa ít nhất 3 kí tự, tối đa 30 kí tự',

                             'txt_mat_khau_again.required' => 'Vui lòng nhập lại mật khẩu',
                             'txt_mat_khau_again.same' => 'Mật khẩu nhập lại chưa khớp'

                            
                            ]);
        $nv= new TaiKhoan;
        //$MaTaiKhoan = DB::select("EXEC Them_Lay_Ma_Tai_Khoan");//Tạo mã tài khoản
        //$nv->MaTaiKhoan = $MaTaiKhoan;
        $nv->HoTen = $request ->txt_hoten;
        $nv->Username = $request ->txt_ten_dang_nhap;
        $nv->Email = $request ->txt_email;
        $nv->GioiTinh = $request ->gender;
        $nv->DienThoai = $request ->txt_sdt;
        $nv->DiaChi = $request ->txt_diachi;
        $nv->Luong = $request ->txt_luong;
        $nv->idGroup = $request->cb_chucvu;
        $nv->Pass = bcrypt($request->txt_mat_khau);
        $nv->idTinhTrang = 4;
        $nv->NgayDangKy = date("Y-m-d H:i:s");
        $nv->NgayCapNhat = date("Y-m-d H:i:s");

        if(Input::file('upload_img'))
        {
        $name_img = Input::file('upload_img')->getClientOriginalName();
        Input::file('upload_img')->move("assets/img/", $name_img);
     
        $nv->HinhDaiDien = $name_img;
        }
        $nv ->save();
        //return redirect('get_sua_nhanvien', $id)->with('thongbao', 'Sửa thành công');
        return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Thêm thành công');
    