(function() {
    'use strict';

    angular.module('catalog')
        .controller('categoryCtrl', ['$stateParams', 'categories', function($stateParams, categories) {
            /**
             * Grabs category and item data for access in view
             * Using `bind(this)` sets `this` key word as the controller object
             */
            categories.getCategories.call(this)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.categories = data.categories;
                    this.category = this.categories.filter(function(category) {
                        return category.categoryName === $stateParams.category;
                    })[0];
                    this.items = this.category.items;
                }.bind(this));
        }]);
})();