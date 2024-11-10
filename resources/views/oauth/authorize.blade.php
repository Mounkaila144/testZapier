<!DOCTYPE html>
<html>
<head>
    <title>Autorisation OAuth</title>
</head>
<body>
<h1>Autoriser l'application Zapier</h1>
<p>Votre application demande l'accès à votre compte.</p>

<form method="POST" action="/oauth/authorize">
    @csrf
    <button type="submit" name="approve" value="1">Autoriser</button>
    <button type="submit" name="deny" value="0">Refuser</button>
</form>
</body>
</html>
