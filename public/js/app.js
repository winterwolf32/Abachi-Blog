(function(){

    'use strict';

    angular.
        module('blog', [
            'ngResource',
            'ui.router'
        ])
        .config(function($httpProvider, $stateProvider, $locationProvider, $urlRouterProvider) {

            $urlRouterProvider.otherwise("/");

            $stateProvider.state('home', {
                url: "/",
                templateUrl: "html/home.html",
                controller: "HomeController"
            })
            $stateProvider.state('post', {
                url: "/post/:slug",
                templateUrl: "html/post.html",
                controller: "PostController"
            })
            $stateProvider.state('tag', {
                url: "/tag/:tag",
                templateUrl: "html/tag.html",
                controller: "TagController"
            });

            $httpProvider.interceptors.push(function ($q) {
                return {
                    'responseError': function (rejection) {
                        window.location = '/';
                    }
                };
            });

    })

})();