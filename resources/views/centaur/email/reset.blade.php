<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Ponovno zatraži lozinku</h2>

		<p>Za promjenu lozinke pritisnite, <a href="{{ route('auth.password.reset.form', urlencode($code)) }}">OVDJE.</a></p>
		<p>Ili posjetite ovu stranicu: <br /> {!! route('auth.password.reset.form', urlencode($code)) !!} </p>
		<p>Thank you!</p>
	</body>
</html>
