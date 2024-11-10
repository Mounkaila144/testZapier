<!-- resources/views/oauth/authorize.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Autorisation OAuth</title>
</head>
<body>
<h1>Autoriser Zapier</h1>
<p>{{ Auth::user()->name }}, votre application demande l'accès à votre compte.</p>

<form method="POST" action="/oauth/authorize">
    @csrf
    <button type="submit" name="approve" value="1">Autoriser</button>
    <button type="submit" name="deny" value="0">Refuser</button>
</form>
</body>
</html>
