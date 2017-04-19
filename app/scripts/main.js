(function() {
    'use strict';

    angular.module('catalog', ['ui.router'])
        .config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
            $stateProvider
                .state('categories', {
                    url: '/categories',
                    templateUrl: 'templates/categories.html',
                    controller: 'categoriesCtrl as vm'
                })
                .state('category', {
                    url: '/categories/:category',
                    templateUrl: 'templates/category.html',
                    controller: 'categoryCtrl as vm'
                })
                .state('item', {
                    url: '/categories/:category/:item',
                    templateUrl: 'templates/item.html',
                    controller: 'itemCtrl as vm'
                })
                .state('editItem', {
                    url: '/categories/:category/:item/edit',
                    templateUrl: 'templates/edit.html',
                    controller: 'editItemCtrl as vm'
                })
                .state('deleteItem', {
                    url: '/categories/:category/:item/delete',
                    templateUrl: 'templates/delete.html',
                    controller: 'deleteItemCtrl as vm'
                })
                .state('newItem', {
                    url: '/categories/:category/item/new',
                    templateUrl: 'templates/new.html',
                    controller: 'newItemCtrl as vm'
                });

            $urlRouterProvider.otherwise('/categories');
        }])
        .controller('mainCtrl', [function() {
            this.name = 'Zach';
        }]);
})();