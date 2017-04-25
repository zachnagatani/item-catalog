(function() {
    'use strict';

    angular.module('catalog')
        .controller('newItemCtrl', ['$stateParams', '$state', '$timeout', 'categories', 'items', function($stateParams, $state, $timeout, categories, items) {
            // Set categoryName for model to pass into save function in view
            this.categoryName = $stateParams.category;

            /**
             * Uses the items service to post to the database
             */
            this.saveItem = function(event, itemName, description, categoryName) {
                event.preventDefault();

                items.save(itemName, description, categoryName)
                    .then(function(response) {
                        this.message = {
                            text: 'Item added!'
                        };

                        $timeout(function() {
                            $state.go('item', {category: $stateParams.category, item: itemName});
                        }, 2000);
                    }.bind(this));
            };
        }]);
})();