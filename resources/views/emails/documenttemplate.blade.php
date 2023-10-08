<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FMSI</title>
</head>
<body>
    <h3>Bonjour, Votre Document FMSI Numéro : {{$mailData['num']}} est prêt a télécharger </h3>
    <p>Nom Client : {{ $mailData['clientfac'] }}</p>
    <p>Num Client : {{ $mailData['nameclient'] }}</p>
    <p>Num Document : {{ $mailData['num'] }}</p>
    <p>Titre : {{ $mailData['titre'] }}</p>
    <p>Détails : {{ $mailData['détail'] }}</p>
    <a href="{{ asset('storage/document/' . $mailData['num'] . '.pdf') }}" target="_blank">Télécharger le Document</a>


</body>
</html>