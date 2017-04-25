(function() {
    'use strict';

    angular.module('catalog')
        .directive('flashy', [function() {
            return {
                scope: {
                    message: '=info'
                },
                template: '<div class="alert alert-success" role="alert">{{message.text}}</div>'
            };
        }]);
})();