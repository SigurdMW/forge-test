'use strict';

angular.module('gltApp').factory('AuthService', [function() {

    
    var authenticated = false;
    
    return {
        authenticationSuccessfull: function(){
            authenticated = true;

            return authenticated;
        },
        isAuthenticated: function(){ 
            return authenticated;
        }
    }

  
}]);