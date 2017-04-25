(function() {
    'use strict';

    angular.module('catalog')
        .controller('itemCtrl', ['$stateParams', 'categories', function($stateParams, categories) {
            // Populate model with correct item for view
            categories.getCategoryItems.call(this, $stateParams.category)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.items = data.Items;
                    this.item = this.items.filter(function(item) {
                        return item.itemName.toLowerCase() === $stateParams.item;
                    })[0];
                }.bind(this));
        }]);
})();