<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class FactureController extends Controller
{
    public function insertFacture(Request $request)
{
    $validatedData = $request->validate([
        'datefac' => 'required|date',
        'clientfac' => 'required',
        'montantfact' => 'required|numeric',
        // 'reste' => 'required|numeric',
    ]);

    // Génération automatique du numéro de facture (numfac)
    $lastFacture = Facture::orderBy('id', 'desc')->first();
    $numfac = $lastFacture ? 'F-2023000' . ($lastFacture->id + 1) : 'F-2023000';
    
    // Ajout du numéro de facture généré automatiquement aux données validées
    $validatedData['numfac'] = $numfac;
    $test = json_decode ($validatedData['clientfac']);
   
    $validatedData['clientfac'] = $test->numclient;

    $facture = Facture::create($validatedData);

    // Récupérer la liste des IDs des services sélectionnés depuis le champ caché
    $serviceIds = explode(',', $request->input('service-ids')); // Correction ici

    // Insérer les enregistrements dans la table "factproduct"
    foreach ($serviceIds as $serviceId) {
        DB::table('factproduct')->insert([
            'factid' => $facture->id,
            'serviceid' => $serviceId,
        ]);
    }

    $now=Carbon::now();

    $facture = DB::table('factures')
    ->join('clients', 'factures.clientfac', '=', 'clients.numclient')
    ->select('factures.*', 'clients.nameclient','clients.type')
    ->where('factures.id', $facture->id)
    ->first();
    $data = DB::table('factproduct')
    ->join('services', 'factproduct.serviceid', '=', 'services.id')
    ->select('factproduct.*', 'services.*')
    ->where('factproduct.factid', $facture->id)->get();
    // Générer le PDF à partir d'une vue blade
    $pdf = PDF::loadView('pdf.facture', compact('facture','now','data')); // Assurez-vous d'avoir une vue adaptée

    // Enregistrer le PDF dans le dossier public
    $pdfPath = 'factures/' . $numfac . '.pdf'; // Choisissez le chemin et le nom du fichier comme vous le souhaitez
    Storage::disk('public')->put($pdfPath, $pdf->output());

    
    return redirect("/facture")->with('success', 'Facture créée avec succès'); // J'ai corrigé le message ici
}

}