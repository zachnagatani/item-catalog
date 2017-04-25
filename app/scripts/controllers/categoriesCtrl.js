(function() {
    'use strict';

    angular.module('catalog')
        .controller('categoriesCtrl', ['categories', 'items', function(categories, items) {
             // Grab categories and items for access in view
             // Using `bind(this)` sets `this` key word as the controller object
            categories.getAll.call(this)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.categories = data.Categories;
                }.bind(this));

            items.getAll.call(this)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.items = data.Items;
                }.bind(this));
        }]);
})();