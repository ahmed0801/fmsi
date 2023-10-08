<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FMSI</title>
</head>
<body>
    <h3>Bonjour, Votre Facture FMSI Numéro : {{$mailData['num']}} est prête a télécharger </h3>
    <p>Nom Client : {{ $mailData['clientfac'] }}</p>
    <p>Num Client : {{ $mailData['nameclient'] }}</p>
    <p>Num Facture : {{ $mailData['num'] }}</p>
    <p>Montant : {{ $mailData['montantfact'] }} €</p>
    <a href="{{ asset('storage/factures/' . $mailData['num'] . '.pdf') }}" target="_blank">Télécharger la facture</a>


</body>
</html>