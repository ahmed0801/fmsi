
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
  border: 1px black;
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
    
    <title>Rapport D'intervention Numéro : {{$data->numinter}}</title>
</head>
<body>

<div>
  <img src="assets/images/fm1.jpg" width="210" height="80" style="float: left;">
  <div style="float: right; text-align: right;">
    <p style="margin: 0; line-height: 1;"></p>
    <p style="margin: 0; line-height: 1;">FMSI PLOMBERIE</p>
    <p style="margin: 0; line-height: 1;">70 Bd orano 75018</p>
    <p style="margin: 0; line-height: 1;">01 74 64 35 83</p>
    <p style="margin: 0; line-height: 1;">depannage@fmsi-plomberie.fr</p>
  </div>
</div>
<hr>



<br><br><br>
<div style="text-align:left">N° Client : {{$data->numclient}}</div>
<div style="text-align:left">Nom Client : {{$data->nameclient}}</div>
<div style="text-align:left">Date D'intervention : {{$data->date}}</div>
<div style="text-align:left">Exporté le {{$now}}</div>
<br><br><br>
<div style="text-align:center"><b>Rapport D'intervention</b></div>

<h3 style="text-align:center">N° : {{$data->numinter}}</h3>
<!-- <hr> -->
<div class="table-responsive">
    <br>
                        <table class="table text-start align-middle table-bordered table-hover mb-0"  width="100%">
                            <thead>
                            <tr class="text-white">
    <th scope="col" height="40">{{$data->titre}}</th>


    </tr>
  </thead>
  <tbody>
                <tr>
                    <td height="40"><br><br><br>{{$data->détail}}<br><br><br></td>
                </tr>
        </tbody>
</table>
<!-- <hr> -->
<br><br>
<!-- <div style="text-align:left; border: 1px solid black; padding: 5px;"><b>Montant :</b> test</div> -->

<!-- <hr> -->
</div>

<div style="text-align:center"><b>Images D'intervention</b>
<br><br>
@foreach($images as $image)

<img width="300" height="300" src="storage/intervention/{{$image->photo}}" alt="image">

@endforeach
</div>

  <!-- Footer -->
  <div class="footer"><hr>
        <!-- Contenu du footer -->
        <p>FMSI PLOMBERIE | 01 74 64 35 83 - 06 12 33 21 81 | depannage@fmsi-plomberie.fr | 70 Bd orano 75018 Paris</p>
        <hr></div>

</body>
</html>