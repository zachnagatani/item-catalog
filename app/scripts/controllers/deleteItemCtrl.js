(function() {
    'use strict';

    angular.module('catalog')
        .controller('deleteItemCtrl', ['$stateParams', 'categories', 'items', function($stateParams, categories, items) {
            categories.getCategoryItems.call(this, $stateParams.category)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.items = data.Items;
                    this.item = this.items.filter(function(item) {
                        return item.itemName === $stateParams.item;
                    })[0];
                    console.log(this.item);
                }.bind(this));

            this.deleteItem = function(itemID) {
                items.delete(itemID)
                    .then(function(response) {
                        console.log(response);
                    });
            };
        }]);
})();