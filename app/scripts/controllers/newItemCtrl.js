(function() {
    'use strict';

    angular.module('catalog')
        .controller('newItemCtrl', ['categories', function(categories) {
            categories.getCategories.call(this)
                .then(function(response) {
                    return response.data;
                })
                .then(function(data) {
                    this.categories = data.categories;
                    console.log(this.categories);
                }.bind(this));
        }]);
})();