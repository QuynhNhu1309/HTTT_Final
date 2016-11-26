(function() {
    'use strict';

    angular.module('minxApp', []);

    appConfig.$inject = ['$interpolateProvider'];

    function appConfig($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    };
})();