(function(){
    'use strict';

    var app = angular.module('app');

    app.component('likesComponent',{
        templateUrl: 'app/components/likes.html',
        controller: likesCtrl
    });


    function likesCtrl($scope,$http){
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