<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class DevisController extends Controller
{
    

    public function insertdevis(Request $request)
    {
        $validatedData = $request->validate([
            'datefac' => 'required|date',
            'clientfac' => 'required',
            'montantfact' => 'required|numeric',
        ]);
        $now=Carbon::now();
        // Génération automatique du numéro de facture (numfac)
        $lastFacture = Devis::orderBy('id', 'desc')->first();
        $numfac = $lastFacture ? 'D-2023000' . ($lastFacture->id + 1) : 'D-2023000';
        
        // Ajout du numéro de facture généré automatiquement aux données validées
        $validatedData['numfac'] = $numfac;
        $test = json_decode ($validatedData['clientfac']);
    
        // $facture = Devis::create($validatedData);
       $facture = DB::table('devis')->insertGetId([
        'numdevis' => $validatedData['numfac'],
        'datedevis' => $validatedData['datefac'],
        'clientdevis' => $test->numclient,
        'montantdevis' => $validatedData['montantfact'],
        'created_at' => $now,
        'updated_at' => $now,

    ]);
    
        // Récupérer la liste des IDs des services sélectionnés depuis le champ caché
        $serviceIds = explode(',', $request->input('service-ids')); // Correction ici
    
        // Insérer les enregistrements dans la table "factproduct"
        foreach ($serviceIds as $serviceId) {
            DB::table('devisproduct')->insert([
                'devisid' => $facture,
                'serviceid' => $serviceId,
            ]);
        }


   
        $devis = DB::table('devis')
        ->join('clients', 'devis.clientdevis', '=', 'clients.numclient')
        ->select('devis.*', 'clients.nameclient','clients.type')
        ->where('devis.id', $facture)
        ->first();

   
    $data = DB::table('devisproduct')
    ->join('services', 'devisproduct.serviceid', '=', 'services.id')
    ->select('devisproduct.*', 'services.*')
    ->where('devisproduct.devisid', $facture)->get();
    // Générer le PDF à partir d'une vue blade
    $pdf = PDF::loadView('pdf.devis', compact('devis','now','data')); // Assurez-vous d'avoir une vue adaptée

    // Enregistrer le PDF dans le dossier public
    $pdfPath = 'devis/' . $numfac . '.pdf'; // Choisissez le chemin et le nom du fichier comme vous le souhaitez
    Storage::disk('public')->put($pdfPath, $pdf->output());




        return redirect("/devis")->with('success', 'Devis crée avec succès'); // J'ai corrigé le message ici
    }
    
}
