(function() {
    'use strict';

    angular.module('catalog')
        .controller('editItemCtrl', ['$stateParams', '$state', 'categories', 'items', function($stateParams, $state, categories, items) {
            // Populate model so input fields have proper data according to category and item in URL
            categories.getCategoryItems.call(this, $stateParams.category)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.items = data.Items;
                    this.item = this.items.filter(function(item) {
                        return item.itemName.toLowerCase() === $stateParams.item.toLowerCase();
                    })[0];

                    if (!this.item) {
                        $state.go('category', {category: $stateParams.category});
                    }
                }.bind(this));

            this.updateItem = function(event, itemName, description, itemID) {
                event.preventDefault();

                items.update(itemName, description, itemID)
                    .then(function(response) {
                        console.log(response);
                    });
            };
        }]);
})();