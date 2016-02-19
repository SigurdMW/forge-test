<!DOCTYPE html>
<html>
<head lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test-project</title>

    <link rel="stylesheet" href="ptportal-web/styles/reset.css"/>
    <!-- css small screens  -->

    <link href="ptportal-web/styles/main.css" rel="stylesheet"/>
    <!-- main CSS file -->

    <link rel="stylesheet" href="ptportal-web/node_modules/bootstrap/dist/css/bootstrap.css">
    
    </head>
    
    <body ng-app="gltApp">

        <div class="container">
            <div ui-view></div>
        </div>        

    </body>

<script src="ptportal-web/node_modules/angular/angular.js"></script>
<script src="ptportal-web/node_modules/angular-ui-router/release/angular-ui-router.js"></script>
<script src="ptportal-web/node_modules/satellizer/satellizer.js"></script>

<script src="ptportal-web/app.js"></script>

<script src="ptportal-web/main/main-controller.js"></script>
<script src="ptportal-web/authenticate/auth-controller.js"></script>
<script src="ptportal-web/services/authentication/authentication-service.js"></script>

</body>
</html>