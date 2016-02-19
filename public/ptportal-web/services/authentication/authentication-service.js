'use strict';

angular.module('gltApp').factory('AuthService', ['$cookies', '$q', function($cookies, $q) {

    
    var authenticated = false;
    
    var authenticationSuccessfull = function(){
        authenticated = true;
    }

    var isAuthenticated = function(){ 
        return authenticated;
    }

  
}]);
