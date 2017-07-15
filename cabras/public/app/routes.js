(function(){
    'use strict';
    var app = angular.module('app');
    
    app.config(function($routeProvider) {
        $routeProvider
        .when("/", {
            template : "<logger-component></logger-component>",
        })
        .when("/signup", {
            template : "<inicio-component></inicio-component>"
        })
        .when("/likes", {
            template : "<likes-component></likes-component>"
        })
        .otherwise( {
            redirectTo:'/'
        });
    });
})();