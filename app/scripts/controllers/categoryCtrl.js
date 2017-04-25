(function() {
    'use strict';

    angular.module('catalog')
        .controller('categoryCtrl', ['$stateParams', 'categories', function($stateParams, categories) {
             // Grabs category and item data for access in view
             // Using `bind(this)` sets `this` key word as the controller object
            categories.getCategoryItems.call(this, $stateParams.category)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.items = data.Items;
                }.bind(this));
        }]);
})();