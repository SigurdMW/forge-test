(function() {

    'use strict';

    angular
        .module('gltApp')
        .controller('MainCtrl', UserController);  

    function UserController($http, $scope ,$rootScope) {

    	console.log("UserController / MainCtrl aktiveres!!");

       

        $scope.getUsers = function() {
        	console.log("getUser blir kalt");

            // This request will hit the index method in the AuthenticateController
            // on the Laravel side and will return the list of users
            $http.get('http://188.166.148.21/api/v1/users/'+ $rootScope.cred).success(function(users) {
                $scope.users = users;
            }).error(function(error) {
                $scope.error = error;
            });
        }
    }
    
})();