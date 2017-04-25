(function() {
    'use strict';

    angular.module('catalog')
        .service('categories', ['$http', function($http) {
            this.getAll = function() {
                return $http.get('/api/categories');
            }
        }]);
})();