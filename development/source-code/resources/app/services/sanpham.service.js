(function() {
    'use strict';

    angular
        .module('minxApp')
        .factory('SanPhamService', SanPhamService);

    SanPhamService.$inject = ['$http'];

    function SanPhamService($http) {
        var service = {
            getSanPham: getSanPham
        };

        return service;

        function getSanPham() {
            return $http.get('api/danh-muc')
                .then(function(data) {
                    return data.response;
                })
                .catch(function(error) {
                    return error;
                });
        }
    }
})();