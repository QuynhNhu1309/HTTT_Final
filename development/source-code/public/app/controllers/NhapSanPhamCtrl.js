(function () {
    'use strict';

    angular
        .module('minxApp')
        .controller('NhapSanPhamCtrl', NhapSanPhamCtrl);

    NhapSanPhamCtrl.$inject = ['$scope', '$http', '$window']

    function NhapSanPhamCtrl($scope, $http, $window) {
        $scope.maSanPham;
        $scope.panelSanPhamShow = false;
        $scope.sanPhamInfo = [];
        var flagDiaChiKhac = false;
        $scope.dsChiTietDonHang = [];

        //Function

        $scope.submitDonHang = submitDonHang;
        $scope.submitSanPham = submitSanPham;
        $scope.removeSanPham = removeSanPham;
        $scope.getTotal = getTotal;
        $scope.removeChiTietDonHang = removeChiTietDonHang;
        $scope.getTotalChiTiet = getTotalChiTiet;
        //layDanhSachDonHang();


        function submitSanPham() {
            var duplicateFlag = false;
            console.log($scope.maSanPham);
            $scope.sanPhamInfo.forEach(function (sanPham) {
                if (sanPham.MaSP.toLowerCase() == $scope.maSanPham.toLowerCase()) {
                    alert('Sản phẩm bạn chọn bị trùng');
                    duplicateFlag = true;
                    return;
                }
            });
            if (duplicateFlag) {
                return;
            }
            $http
                .get('/admin/phieunhap/sanpham/' + $scope.maSanPham)
                .then(function successCallBack(response) {
                    if (response.data != "") {
                        $scope.panelSanPhamShow = true;
                        var sanPham = response.data[0];
                        sanPham.GiaBan = parseInt(sanPham.GiaBan);
                        sanPham.GiaBanHienTai = parseInt(sanPham.GiaBanHienTai);
                        sanPham.soLuong = 1;
                        $scope.sanPhamInfo.push(sanPham);

                        console.log(sanPham);
                    } else {
                        $scope.panelSanPhamShow = false;
                        alert('Không tìm thấy mã sản phẩm');
                    }
                }, function errorCallback(error) {
                    console.log(error);
                });
        }

        function submitDonHang(isValid) {
            // Nếu người dùng không nhập sản phẩm nào mà bấm nút Hoàn tất thì báo lỗi và stop function
            if ($scope.sanPhamInfo.length == 0) {
                alert('Bạn thêm đơn hàng không thành công');
                return;
            }

            // Tạo dữ liệu để gửi lên server
            var requestdata = {
                thongTinSanPham: $scope.sanPhamInfo,
                tongTien: getTotal()
            };

            $http
                .post('/admin/phieunhap/them/', requestdata)
                .then(function successCallBack(response) {
                    // console.log(response);
                    if (response.data) {
                        $window.location.href = '/admin/phieunhap/them';
                    }
                    // } else {
                    //     alert('Bạn thêm sản phẩm không thành công');
                    //     resetData();
                    // }
                }, function errorCallback(error) {
                    console.log(error);
                });
        }

        function resetData() {
            $scope.panelSanPhamShow = false;
        }


        //Hàm xóa sản phẩm được chọn
        function removeSanPham(maSanPham) {
            $scope.sanPhamInfo.forEach(function (item, index) {
                if (item.MaSP == maSanPham) {
                    $scope.sanPhamInfo.splice(index, 1);
                    return;
                }
            });
        }

        //Hàm xóa chi tiết đơn hàng được chọn
        function removeChiTietDonHang(idChiTietDonHang) {
            $http
                .get('xoachitiet/' + idChiTietDonHang)
                .then(function successCallback(response) {
                    if (response.data == true) {
                        $scope.dsChiTietDonHang.forEach(function (item, index) {
                            if (item.id == idChiTietDonHang) {
                                $scope.dsChiTietDonHang.splice(index, 1);
                                return;
                            }
                        });
                    }

                }, function errorCallback(error) {
                    console.log(error);
                });
        }


        // function layDanhSachDonHang() {
        //     $http
        //         .get('laydanhsachchitiet/')
        //         .then(function successCallback(response) {
        //             if (response.data != "") {
        //                 $scope.dsChiTietDonHang = response.data;
        //                 console.log($scope.dsChiTietDonHang)
        //             }
        //         }, function errorCallback(error) {
        //             console.log(error);
        //         });
        // }

        function getTotal() {
            var grandTotal = 0;
            $scope.sanPhamInfo.forEach(function (sanpham) {
                grandTotal += sanpham.GiaBanHienTai * sanpham.soLuong;
            });
            return grandTotal;
        }

        function getTotalChiTiet() {
            var grandTotal = 0;
            $scope.dsChiTietDonHang.forEach(function (chitiet) {
                grandTotal += chitiet.Gia * chitiet.SoLuong;
            });
            return grandTotal;
        }
    }
})();