(function() {
    'use strict';

    angular.module('catalog')
        .service('categories', ['$http', function($http) {
            this.getCategories = function() {
                return $http.get('../../mocks.json');
            }
        }]);
})();