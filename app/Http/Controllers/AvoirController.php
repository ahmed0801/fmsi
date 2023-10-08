<?php

namespace App\Http\Controllers;

use App\Models\Avoir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class AvoirController extends Controller
{
    public function insertavoir(Request $request)
    {
        $validatedData = $request->validate([
            'designation' => 'required',
            'numclient' => 'required',
            'date' => 'required',
            'montant' => 'required|numeric',
        ]);
    
        // Génération automatique du numéro de facture (numfac)
        $lastFacture = Avoir::orderBy('id', 'desc')->first();
        $numavoir = $lastFacture ? 'A-2023000' . ($lastFacture->id + 1) : 'A-2023000';
        
        // Ajout du numéro de facture généré automatiquement aux données validées
        $validatedData['numavoir'] = $numavoir;
    
        Avoir::create($validatedData);




        $now=Carbon::now();

        $data = DB::table('avoirs')
        ->join('clients', 'avoirs.numclient', '=', 'clients.numclient')
        ->select('avoirs.*', 'clients.nameclient','clients.mail')
        ->where('avoirs.numavoir', $numavoir)
        ->first();
           


        $pdf = PDF::loadView('pdf.avoir', compact('data','now')); // Assurez-vous d'avoir une vue adaptée
            // Enregistrer le PDF dans le dossier public
    $pdfPath = 'avoir/' . $numavoir . '.pdf'; // Choisissez le chemin et le nom du fichier comme vous le souhaitez
    Storage::disk('public')->put($pdfPath, $pdf->output());

    

    
        return redirect("/avoir")->with('success', 'Avoir créée avec succès'); // J'ai corrigé le message ici
    }
}
