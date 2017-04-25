(function() {
    'use strict';

    angular.module('catalog')
        .controller('newItemCtrl', ['categories', 'items', function(categories, items) {
            /**
             * Gets all categories for the select input
             */
            categories.getAll.call(this)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.categories = data.Categories;
                    console.log(this.categories);
                }.bind(this));

            /**
             * Uses the items service to post to the database
             */
            this.saveItem = function(event, itemName, description, categoryName) {
                event.preventDefault();

                items.save(itemName, description, categoryName)
                    .then(function(response) {
                        console.log(response);
                    });
            };
        }]);
})();