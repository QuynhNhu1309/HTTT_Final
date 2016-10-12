angular.module('minxApp', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
angular.module('minxApp').controller('SanPhamController', SanPhamController);
SanPhamController.$inject = ['$scope'];
function SanPhamController($scope) {
    var vm = this;
    vm.name = 1;
    vm.click = function click() {
        vm.name++;
    };
    vm.price = 100;
}