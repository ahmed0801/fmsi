
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
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Avoir Numéro : {{$data->numavoir}}</title>
</head>
<body>
<img src="assets/images/fm1.jpg" width="210" height="80">
<div style="text-align:center"><b>Avoir Vente</b></div>
<div style="text-align:right">N° Client : {{$data->numclient}}</div>
<div style="text-align:right">Nom Client : {{$data->nameclient}}</div>
<div style="text-align:right">Date De Facturation : {{$data->date}}</div>
<div style="text-align:right">Exporté le {{$now}}</div>
<hr>
<h3 style="text-align:center">N° : {{$data->numavoir}}</h3>
<hr>
<div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0"  width="100%">
                            <thead>
                            <tr class="text-white">
    <th scope="col" height="40">Désignation</th>


    </tr>
  </thead>
  <tbody>
                <tr>
                    <td height="40">{{$data->designation}}</td>
                </tr>
        </tbody>
</table>
<hr>
<br><br>
<div style="text-align:left; border: 1px solid black; padding: 5px;"><b>Montant :</b> {{$data->montant}} € </div>

<hr>
</div>


  <!-- Footer -->
  <div class="footer"><hr>
        <!-- Contenu du footer -->
        <p>FMSI PLOMBERIE | 01 74 64 35 83 - 06 12 33 21 81 | depannage@fmsi-plomberie.fr | 70 Bd orano 75018 Paris</p>
        <hr></div>

</body>
</html>