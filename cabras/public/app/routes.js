(function(){
    'use strict';
    var app = angular.module('app');
    
    app.config(function($routeProvider) {
        $routeProvider
        .when("/", {
            template : "<logger-component></logger-component>",
        })
        .when("/singup", {
            templateUrl : "<inicio-component></inicio-component>"
        })
        .when("/green", {
            templateUrl : "green.htm"
        })
        .otherwise( {
            redirectTo:'/'
        });
    });
})();