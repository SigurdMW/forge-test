(function() {

    'use strict';

    angular
        .module('gltApp', ['ui.router', 'satellizer'])
        .config(function($stateProvider, $urlRouterProvider, $authProvider) {

            // Satellizer configuration that specifies which API
            // route the JWT should be retrieved from
            $authProvider.loginUrl = '/api/v1/authenticate';

            // Redirect to the auth state if any other states
            // are requested other than users
            $urlRouterProvider.otherwise('/auth');
            
            $stateProvider
                .state('auth', {
                    url: '/auth',
                    templateUrl: 'ptportal-web/authenticate/authView.html',
                    controller: 'AuthController as auth'
                })
                .state('main', {
                    url: '/main',
                    templateUrl: 'ptportal-web/main/main.html',
                    controller: 'MainCtrl as main',
                    authenticate: true
                });
        }).run(function ($rootScope, $state, AuthService) {
            $rootScope.$on("$stateChangeStart", function(event, toState, toParams, fromState, fromParams){
            if (toState.authenticate && !AuthService.isAuthenticated()){
            // User isn’t authenticated
                $state.transitionTo("auth");
                event.preventDefault(); 
            }
         });
    });
})();