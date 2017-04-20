(function() {
    'use strict';

    angular.module('catalog')
        .controller('categoriesCtrl', ['categories', function(categories) {
            categories.getCategories.call(this)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.categories = data.categories;
                    this.items = data.items;
                }.bind(this));
        }]);
})();