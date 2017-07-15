(function(){
    'use strict';

    var app = angular.module('app');
    app.controller('userCtrl',function($scope,$http){
        $http({
        method : "GET",
        url : "../public/Usuario"
    }).then(function mySuccess(response) {
        console.log(response.data);
    }, function myError(response) {
        $scope.myWelcome = response.statusText;
    });
    });
})();