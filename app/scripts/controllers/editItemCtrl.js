(function() {
    'use strict';

    angular.module('catalog')
        .controller('editItemCtrl', ['$stateParams', 'categories', 'items', function($stateParams, categories, items) {
            //Populates input fields with proper data according to category and item in URL
            categories.getCategoryItems.call(this, $stateParams.category)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.items = data.Items;
                    this.item = this.items.filter(function(item) {
                        return item.itemName === $stateParams.item;
                    })[0];
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