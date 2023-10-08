<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FMSI</title>
</head>
<body>
    <h3>Bonjour, Votre Avoir FMSI Numéro : {{$mailData['num']}} est prêt a télécharger </h3>
    <p>Nom Client : {{ $mailData['numclient'] }}</p>
    <p>Num Client : {{ $mailData['nameclient'] }}</p>
    <p>Num Avoir : {{ $mailData['num'] }}</p>
    <p>Désignation : {{ $mailData['designation'] }}</p>
    <p>Montant : {{ $mailData['montant'] }} €</p>
    <a href="{{ asset('storage/avoir/' . $mailData['num'] . '.pdf') }}" target="_blank">Télécharger L'avoir</a>


</body>
</html>