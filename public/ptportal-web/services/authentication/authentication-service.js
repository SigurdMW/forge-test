'use strict';

angular.module('gltApp').factory('AuthService', [function() {

    
    var authenticated = false;
    
    var authenticationSuccessfull = function(){
        authenticated = true;
    }

    var isAuthenticated = function(){ 
        return authenticated;
    }

  
}]);
