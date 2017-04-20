(function() {
    'use strict';

    angular.module('catalog')
        .controller('editItemCtrl', ['$stateParams', 'categories', function($stateParams, categories) {
            categories.getCategories.call(this)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.categories = data.categories;
                    this.item = data.items.filter(function(item) {
                        return item.itemName === $stateParams.item
                            && item.categoryName === $stateParams.category;
                    })[0];
                }.bind(this));
        }]);
})();