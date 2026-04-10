<!DOCTYPE html>
<html>
<head>
    <title>Nuovo Messaggio di Contatto</title>
</head>
<body>
    <h2>Hai ricevuto un nuovo messaggio di contatto</h2>
    <p><strong>Nome:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Messaggio:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
