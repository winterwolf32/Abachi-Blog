(function(){

    'use strict'

    angular.module("blog")
        .filter("sanitize", ['$sce', function($sce) {
            return function(htmlCode){
                return $sce.trustAsHtml(htmlCode);
            }
        }]);

})();