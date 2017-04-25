(function() {
    'use strict';

    angular.module('catalog')
        .service('items', ['$http', function($http) {
            this.save = function(itemName, description, categoryName) {
                return $http.post('/api/items/create', {
                    itemName: itemName,
                    description: description,
                    categoryName: categoryName
                });
            };
        }]);
})();