(function() {
    'use strict';

    angular.module('catalog')
        .controller('categoryCtrl', ['$stateParams', '$state', 'categories', function($stateParams, $state, categories) {
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

                    // Check if the category passed into the URL exists within list of categories from db
                    var exists = this.categories.some(function(category) {
                        return category.categoryName.toLowerCase() === $stateParams.category.toLowerCase();
                    });

                    // If category is not valid, return to categories state
                    if (!exists) {
                        $state.go('categories');
                    }
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