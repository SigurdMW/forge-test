'use strict';

angular.module('gltApp').factory('AuthService', [function() {

    
    var authenticated = false;
    
    return {
        var authenticationSuccessfull = function(){
            authenticated = true;

            return authenticated;
        }

        var isAuthenticated = function(){ 
            return authenticated;
        }
    }

  
}]);