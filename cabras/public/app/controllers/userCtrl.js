(function(){
    'use strict';

    var app = angular.module('app');


    app.component('userComponent',{
        templateUrl: 'app/components/user.html',
        controller: userCtrl
    });

    function userCtrl($scope,$http){
            $http({
            method : "GET",
            url : "../public/Usuario"
        }).then(function mySuccess(response) {
            $scope.users = response.data.usuario;
        }, function myError(response) {
            $scope.myWelcome = response.statusText;
        });
    }
    
})();