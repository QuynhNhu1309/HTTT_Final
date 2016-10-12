(function() {
    'use strict';

    angular
        .module('minxApp')
        .controller('SanPhamController', SanPhamController);

    SanPhamController.$inject = ['$scope', 'SanPhamService'];

    function SanPhamController($scope, SanPhamService) {
        var vm = this;
        // Bindable variable
        vm.name = 1;
        vm.price = 100;
        vm.dssanpham = [];
        vm.myHtml = "<h1>Hello World</h1>";
        vm.froalaOptions = {
            toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', '|', 'color', 'emoticons', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
            height: 300
        };

        // Bindable function
        vm.showSanPhamList = showSanPhamList;

        function showSanPhamList() {
            SanPhamService.getSanPham()
                .then(function(response) {
                    vm.dssanpham = response;
                });
        }
    }
})();