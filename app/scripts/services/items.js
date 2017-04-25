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

            this.getAll = function() {
                return $http.get('/api/items');
            };

            this.update = function(itemName, description, itemID) {
                return $http.patch('/api/items/update/' + itemID, {
                    itemName: itemName,
                    description: description
                });
            };

            this.delete = function(itemID) {
                return $http.delete('/api/items/delete/' + itemID);
            };
        }]);
})();