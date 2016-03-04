<!DOCTYPE html>
<html lang="en">
<head>
	<title>Confirm email</title>
</head>
<body>
	<h1>Confirm email</h1>
	<p>
		<a href="{{ url("register/confirm/{$user->token}") }}">Confirm email</a>
	</p>
<body>
</html>
