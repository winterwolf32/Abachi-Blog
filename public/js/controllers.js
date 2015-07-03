(function(){

    'use strict';

    angular
        .module('blog')
        .controller('HomeController', function($scope, Post){
            $scope.posts = {};

            Post.query(function(data) {
                $scope.posts = data;
            });
        })
        .controller('PostController', function($scope, Post, $stateParams){
            $scope.post = {};

            Post.get({slug: $stateParams.slug}, function(data) {
                $scope.post = data;
            });
        })
        .controller('TagController', function($scope, Post, $stateParams){
            $scope.posts = {};
            $scope.tag = '';

            Post.findByTag({tag: $stateParams.tag}, function(data) {
                $scope.tag = $stateParams.tag;
                $scope.posts = data;
            });
        });

})();