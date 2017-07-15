(function(){
    'use strict';

    var app = angular.module('app');

    app.component('inicioComponent',{
        templateUrl: 'app/components/inicio.html',
        controller: inicioCtrl
    });


    function inicioCtrl($scope,$http){

    }
})();