(function(){
    'use strict';
    var app = angular.module('app');
    
    app.config(function($routeProvider) {
        $routeProvider
        .when("/", {
            template : "<user-component></user-component>",
        })
        .when("/red", {
            templateUrl : "red.htm"
        })
        .when("/green", {
            templateUrl : "green.htm"
        })
        .otherwise( {
            redirectTo:'/'
        });
    });
})();