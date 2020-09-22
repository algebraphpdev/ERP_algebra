<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Dobrodošli</h2>

		<p><b>Korisnički račun:</b> {{ $email }}</p>
		<p>Za aktivaciju Vašeg računa pritisnite, <a href="{{ route('auth.activation.attempt', urlencode($code)) }}">OVDJE.</a></p>
		<p>Ili posjetite ovu stranicu: <br /> {!! route('auth.activation.attempt', urlencode($code)) !!} </p>
		<p>Hvala Vam!</p>
	</body>
</html>
