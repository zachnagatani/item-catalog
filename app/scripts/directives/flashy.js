(function() {
    'use strict';

    /**
     * flashy is a directive that returns a simple flash message.
     * A message must be specified on the scope of the controller
     * and passed into the directive via the info attribute
     */
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