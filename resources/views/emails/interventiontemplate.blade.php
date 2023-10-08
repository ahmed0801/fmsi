<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FMSI</title>
</head>
<body>
    <h3>Bonjour, Votre Rapport D'intervention FMSI Numéro : {{$mailData['num']}} est prêt a télécharger </h3>
    <p>Nom Client : {{ $mailData['clientfac'] }}</p>
    <p>Num Client : {{ $mailData['nameclient'] }}</p>
    <p>Num Rapport : {{ $mailData['num'] }}</p>
    <p>Titre : {{ $mailData['titre'] }}</p>
    <p>Détails : {{ $mailData['détail'] }}</p>
    <a href="{{ asset('storage/rapport-intervention/' . $mailData['num'] . '.pdf') }}" target="_blank">Télécharger le Rapport</a>


</body>
</html>