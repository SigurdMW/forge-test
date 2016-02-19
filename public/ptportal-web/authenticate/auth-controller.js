(function() {

    'use strict';

    angular
        .module('gltApp')
        .controller('AuthController', AuthController);


    function AuthController($auth, $state, $rootScope, AuthService) {

        var vm = this;
            
        vm.login = function() {

            var credentials = {
                email: vm.email,
                password: vm.password
            }
            
            // Use Satellizer's $auth service to login
            $auth.login(credentials).then(function(data) {
                $rootScope.cred = data;

                // Fortell applikasjonen vår at autentiseringen var vellykket
                console.log("Vellykket autentisering: " + AuthService.authenticationSuccessfull());
                console.log("Token: " + data);

                // If login is successful, redirect to the users state
                $state.go('main', {});
            });
        }

    }

})();