(function() {
    'use strict';

    angular.module('catalog')
        .controller('categoryCtrl', ['$stateParams', 'categories', function($stateParams, categories) {
            // Set $stateParams on model for access in view
            this.stateParams = $stateParams;

             // Grabs category and item data for access in view
             // Using `bind(this)` sets `this` key word as the controller object
            categories.getAll.call(this)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.categories = data.Categories;
                }.bind(this));

            categories.getCategoryItems.call(this, this.stateParams.category)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.items = data.Items;
                }.bind(this));
        }]);
})();