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
                .state('main', {
                    url: '/main',
                    templateUrl: 'main/main.html',
                    controller: 'MainCtrl as main'
                });
        });
})();