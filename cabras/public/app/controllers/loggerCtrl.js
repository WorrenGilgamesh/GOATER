(function(){
    'use strict';

    var app = angular.module('app');

    app.component('loggerComponent',{
        templateUrl: 'app/components/logger.html',
        controller: inicioCtrl
    });


    function inicioCtrl($scope,$http){

    }
})();