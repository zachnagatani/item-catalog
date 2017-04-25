(function() {
    'use strict';

    angular.module('catalog')
        .service('categories', ['$http', function($http) {
            this.getAll = function() {
                return $http.get('/api/categories');
            };

            this.getCategoryItems = function(categoryName) {
                return $http.get('/api/categories/' + categoryName);
            };
        }]);
})();