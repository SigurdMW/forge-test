(function() {

    'use strict';

    angular
        .module('gltApp')
        .controller('MainCtrl', UserController);  

    function UserController($http, $rootScope) {

    	console.log("UserController / MainCtrl aktiveres!!");
    	console.log(this);

        var vm = this;
        
        vm.users;
        vm.error;

        vm.getUsers = function() {
        	console.log("getUser blir kalt");

            // This request will hit the index method in the AuthenticateController
            // on the Laravel side and will return the list of users
            $http.get('http://188.166.148.21/api/v1/users/'+ $rootScope.cred).success(function(users) {
                vm.users = users;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }
    
})();