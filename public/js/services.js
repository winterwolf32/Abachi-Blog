(function() {

    'use strict';

    angular
        .module('blog')
        .factory('Post', function($resource){
            return $resource("/api/posts/:slug", {}, {
                findByTag: {
                    url:'/api/tag/:tag',
                    method:'get',
                    isArray: true
                }
            });
        });

})();