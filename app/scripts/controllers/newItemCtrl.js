(function() {
    'use strict';

    angular.module('catalog')
        .controller('newItemCtrl', ['$stateParams', 'categories', 'items', function($stateParams, categories, items) {
            // Set categoryName for model to pass into save function in view
            this.categoryName = $stateParams.category;
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