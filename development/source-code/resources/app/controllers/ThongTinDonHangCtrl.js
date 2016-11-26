(function() {
    'use strict';

    angular
        .module('minxApp')
        .controller('ThongTinDonHangCtrl', ThongTinDonHangCtrl);

    ThongTinDonHangCtrl.$inject = ['$scope', '$http']

    function ThongTinDonHangCtrl($scope, $http) {
        $scope.maKhachHang;
        $scope.panelKhachHangShow = false;
        $scope.panelNguoiNhanShow = false;
        $scope.khachHangInfo;

        $scope.togglePanelKhachHang = togglePanelKhachHang;
        $scope.submitKhachHangInfo = submitKhachHangInfo;
        $scope.displayDate = displayDate;

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
                });
        }

        function submitKhachHangInfo() {
            $scope.panelNguoiNhanShow = true;
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

    }
})();