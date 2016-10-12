(function() {
    'use strict';

    angular
        .module('minxApp')
        .directive('scroll2topBtn', scroll2topBtnDirective);

    scroll2topBtnDirective.$inject = ['$window'];

    function scroll2topBtnDirective($window) {
        // Usage:
        //
        // Creates:
        //
        var directive = {
            bindToController: true,
            controller: scroll2topBtnController,
            controllerAs: 'vm',
            link: link,
            restrict: 'E',
            scope: {},
            templateUrl: '/app/templates/scroll2top-btn.template.html'
        };
        return directive;
        // return {
        //     templateUrl: '/app/templates/scroll2top-btn.template.html'
        // };

        function link(scope, element, attrs) {
            var offset = 300,
                offset_opacity = 1200;
            angular.element($window).bind("scroll", function() {
                (angular.element($window).scrollTop() > offset) ? element.children().addClass('is-visible'): element.children().removeClass('is-visible fade-out');
                if (angular.element($window).scrollTop() > offset_opacity) {
                    element.children().addClass('fade-out');
                }
            });
        }

    }

    // scroll2topBtnController.$inject = ['$scope'];

    function scroll2topBtnController() {
        var vm = this,
            scroll_top_duration = 300;

        vm.click = click;

        function click() {
            $('.scroll-to-top-btn').on('click', function(event) {
                event.preventDefault();
                $('body,html').animate({
                    scrollTop: 0,
                }, scroll_top_duration);
            });
        }
    }

})();