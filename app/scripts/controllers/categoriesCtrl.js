(function() {
    'use strict';

    angular.module('catalog')
        .controller('categoriesCtrl', ['categories', function(categories) {
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
                    this.items = data.items;
                }.bind(this));
        }]);
})();