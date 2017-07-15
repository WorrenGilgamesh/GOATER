(function(){
    'use strict';

    var app = angular.module('app');
    app.component('headerComponent',{
        templateUrl: 'app/components/header.html',
        controller: headerCtrl
    });
    function headerCtrl($scope){
        $scope.toggle = function() {
            var x = document.getElementById("header-toggle");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else { 
                x.className = x.className.replace(" w3-show", "");
            }
        }
    };
    
})();