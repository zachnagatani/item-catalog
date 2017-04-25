(function() {
    'use strict';

    angular.module('catalog')
        .controller('deleteItemCtrl', ['$stateParams', '$state', 'categories', 'items', function($stateParams, $state, categories, items) {
            // Find proper item and populate model so view can access the itemID
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

            this.deleteItem = function(itemID) {
                items.delete(itemID)
                    .then(function(response) {
                        console.log(response);
                    });
            };
        }]);
})();