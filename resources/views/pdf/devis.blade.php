
<!DOCTYPE html>
<html lang="en">
    
<head>
    <style>.center {
  margin-left: auto;
  margin-right: auto;
}
table, th, td {
  margin-left: auto;
  margin-right: auto;
  border: 1px solid black;
}
th {
  background-color: #96D4D4;
}

 /* Style du footer */
 .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            /* background-color: #f2f2f2; */
            background-color: #96D4D4;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Devis Numéro : {{$devis->numdevis}}</title>
</head>
<body>
<img src="assets/images/fm1.jpg" width="210" height="80">
<div style="text-align:center"><b>Devis Client</b></div>
<div style="text-align:right">N° Client : {{$devis->clientdevis}}</div>
<div style="text-align:right">Nom Client : {{$devis->nameclient}}</div>
<div style="text-align:right">Date De Facturation : {{$devis->datedevis}}</div>
<div style="text-align:right">Exporté le {{$now}}</div>
<hr>
<h3 style="text-align:center">N° : {{$devis->numdevis}}</h3>
<hr>
<div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0"  width="100%">
                            <thead>
                            <tr class="text-white">
    <th scope="col" height="40">Service</th>
    <th scope="col" height="40">Montant HT</th>
    <th scope="col" height="40">TVA</th>



    </tr>
  </thead>
  <tbody>
            @foreach($data as $item)
                <tr>
                    <td height="40">{{$item->designation}}</td>
                    <td height="40">{{$item->montant_ht}}€</td>
                    @if ($devis->type == "particulier")
                    <td height="40">10%</td>
                    @elseif ( $devis->type == "entreprise" )
                    <td height="40">20%</td>
                    @elseif( $devis->type == "sous-traitant" )
                    <td height="40">0%</td>
                    @endif

                </tr>
            @endforeach
        </tbody>
</table>
<hr>
<br><br>
<div style="text-align:left; border: 1px solid black; padding: 5px;"><b>Montant Total TTC :</b> {{$devis->montantdevis}} € </div>

<hr>
</div>


  <!-- Footer -->
  <div class="footer"><hr>
        <!-- Contenu du footer -->
        <p>FMSI PLOMBERIE | 01 74 64 35 83 - 06 12 33 21 81 | depannage@fmsi-plomberie.fr | 70 Bd orano 75018 Paris</p>
        <hr></div>

</body>
</html>