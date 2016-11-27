(function() {
    'use strict';

    angular
        .module('minxApp')
        .controller('ThongTinDonHangCtrl', ThongTinDonHangCtrl);

    ThongTinDonHangCtrl.$inject = ['$scope', '$http', '$window']

    function ThongTinDonHangCtrl($scope, $http, $window) {
        $scope.maKhachHang;
        $scope.maSanPham;
        $scope.panelKhachHangShow = false;
        $scope.panelNguoiNhanShow = false;
        $scope.panelSanPhamShow = false;
        $scope.khachHangInfo;
        $scope.sanPhamInfo = [];
        var flagDiaChiKhac = false;

        //Function
        $scope.togglePanelKhachHang = togglePanelKhachHang;
        $scope.submitKhachHangInfo = submitKhachHangInfo;
        $scope.displayDate = displayDate;
        $scope.submitDonHang = submitDonHang;
        $scope.submitSanPham = submitSanPham;
        $scope.removeSanPham = removeSanPham;
        $scope.getTotal = getTotal;


        //Cấu hình cho UIDatePicker
        $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
        $scope.format = $scope.formats[0];
        $scope.ngay_giao = new Date();
        $scope.popup1 = {
            opened: false
        };
        $scope.open_time = function() {
            $scope.popup1.opened = true;
        };
        $scope.dateOptions = {
            dateDisabled: disabled,
            formatYear: 'yy',
            maxDate: new Date(2020, 5, 22),
            minDate: new Date(),
            startingDay: 1
        };
        $scope.altInputFormats = ['M!/d!/yyyy'];

        function disabled(data) {
            var date = data.date,
                mode = data.mode;
            return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
        }
        //


        function togglePanelKhachHang() {
            $http
                .get('/admin/donhang/khachhang/' + $scope.maKhachHang)
                .then(function successCallBack(response) {
                    if (response.data != "") {
                        $scope.panelKhachHangShow = true;
                        $scope.khachHangInfo = response.data[0];
                    } else {
                        $scope.panelKhachHangShow = false;
                        alert('Không tìm thấy mã khách hàng');
                    }
                }, function errorCallback(error) {
                    console.log(error);
                });
        }

        function submitKhachHangInfo() {
            $scope.panelNguoiNhanShow = true;
            flagDiaChiKhac = true;
        }

        function submitSanPham() {
            var duplicateFlag = false;
            $scope.sanPhamInfo.forEach(function(sanPham) {
                if (sanPham.MaSP == $scope.maSanPham) {
                    alert('Sản phẩm bạn chọn bị trùng');
                    duplicateFlag = true;
                    return;
                }
            });
            if (duplicateFlag) {
                return;
            }
            $http
                .get('/admin/donhang/sanpham/' + $scope.maSanPham)
                .then(function successCallBack(response) {
                    if (response.data != "") {
                        $scope.panelSanPhamShow = true;
                        var sanPham = response.data[0];
                        sanPham.GiaBan = parseInt(sanPham.GiaBan);
                        sanPham.GiaBanHienTai = parseInt(sanPham.GiaBanHienTai);
                        sanPham.soLuong = 1;
                        $scope.sanPhamInfo.push(sanPham);
                    } else {
                        $scope.panelSanPhamShow = true;
                        alert('Không tìm thấy mã sản phẩm');
                    }
                }, function errorCallback(error) {
                    console.log(error);
                });
        }

        function submitDonHang() {
            if ($scope.sanPhamInfo.length == 0) {
                alert('Bạn thêm đơn hàng không thành công');
                resetData();
                return;
            }
            if (flagDiaChiKhac == false) {
                var today = new Date();
                var thongTinKhachHang = Object.assign({}, $scope.khachHangInfo, {
                    ngayGiao: Date.parse(today)
                });
                var requestdata = {
                    thongTinKhachHang: thongTinKhachHang,
                    thongTinSanPham: $scope.sanPhamInfo,
                    tongTien: getTotal()
                };
                console.log(requestdata);
            }
            if (flagDiaChiKhac == true) {
                var requestdata = {
                    thongTinKhachHang: {
                        id: $scope.khachHangInfo.id,
                        HoTen: $scope.ho_ten,
                        DienThoai: $scope.so_dien_thoai,
                        DiaChi: $scope.dia_chi,
                        ngayGiao: Date.parse($scope.ngay_giao)
                    },
                    thongTinSanPham: $scope.sanPhamInfo,
                    tongTien: getTotal()
                };
                console.log(requestdata);
            }
            $http
                .post('/admin/donhang/them/', requestdata)
                .then(function successCallBack(response) {
                    console.log(response);
                    if (response.data) {
                        $window.location.href = '/admin/donhang/danhsach';
                    } else {
                        alert('Bạn thêm đơn hàng không thành công');
                        resetData();
                    }
                }, function errorCallback(error) {
                    console.log(error);
                });
        }

        function resetData() {
            $scope.panelKhachHangShow = false;
            $scope.panelNguoiNhanShow = false;
            $scope.panelSanPhamShow = false;
        }

        //Hàm convert dd-mm-yyyy
        function displayDate(date) {
            if (date) {
                var convertedDate = new Date(date);
                var month = convertedDate.getMonth() + 1;
                var date = convertedDate.getDate();
                if (month < 10) {
                    month = '0' + month;
                }
                if (date < 10) {
                    date = '0' + date;
                }
                return date + "-" + month + "-" + convertedDate.getFullYear();
            }
        }

        //Hàm xóa sản phẩm được chọn
        function removeSanPham(maSanPham) {
            $scope.sanPhamInfo.forEach(function(item, index) {
                if (item.MaSP == maSanPham) {
                    $scope.sanPhamInfo.splice(index, 1);
                    return;
                }
            });
        }

        function getTotal() {
            var grandTotal = 0;
            $scope.sanPhamInfo.forEach(function(sanpham) {
                grandTotal += sanpham.GiaBanHienTai * sanpham.soLuong;
            });
            return grandTotal;
        }
    }
})();