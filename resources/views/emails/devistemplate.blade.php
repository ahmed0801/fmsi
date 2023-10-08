<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FMSI</title>
</head>
<body>
    <h3>Bonjour, Votre Devis FMSI Numéro : {{$mailData['num']}} est prêt a télécharger </h3>
    <p>Nom Client : {{ $mailData['clientfac'] }}</p>
    <p>Num Client : {{ $mailData['nameclient'] }}</p>
    <p>Num Devis : {{ $mailData['num'] }}</p>
    <p>Montant : {{ $mailData['montantfact'] }} €</p>
    <a href="{{ asset('storage/devis/' . $mailData['num'] . '.pdf') }}" target="_blank">Télécharger le Devis</a>


</body>
</html>