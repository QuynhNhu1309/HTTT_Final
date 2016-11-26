(function() {
    'use strict';

    angular
        .module('minxApp')
        .controller('ThongTinDonHangCtrl', ThongTinDonHangCtrl);

    ThongTinDonHangCtrl.$inject = ['$scope', '$http']

    function ThongTinDonHangCtrl($scope, $http) {
        $scope.maKhachHang;
        $scope.maSanPham;
        $scope.panelKhachHangShow = false;
        $scope.panelNguoiNhanShow = false;
        $scope.panelSanPhamShow = false;
        $scope.khachHangInfo;
        $scope.sanPhamInfo = [];
        var flagDiaChiKhac = true;

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
            if (flagDiaChiKhac == false) {
                var requestdata = {
                    thongTinKhachHang: $scope.khachHangInfo
                };
                console.log(requestdata);
            }
            if (flagDiaChiKhac == true) {
                var requestdata = {
                    thongTinKhachHang: {
                        maKhachHang: $scope.khachHangInfo.MaKhachHang,
                        hoTen: $scope.ho_ten,
                        soDienThoai: $scope.so_dien_thoai,
                        diaChi: $scope.dia_chi,
                        ngayGiao: Date.parse($scope.ngay_giao)
                    }
                };
                console.log(requestdata);
            }
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