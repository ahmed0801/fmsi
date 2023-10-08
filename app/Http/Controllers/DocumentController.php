<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class DocumentController extends Controller
{
    public function insertdocument(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required',
            'gestionnaire' => 'string',
            'numclient' => 'string',
            'date' => 'required',
            'détail' => 'required',
        ]);
    
        // Génération automatique du numéro de facture (numfac)
        $now=Carbon::now();
        $lastFacture = Document::orderBy('id', 'desc')->first();
        $numinter = $lastFacture ? 'D-2023000' . ($lastFacture->id + 1) : 'D-2023000';
        
        // Ajout du numéro de facture généré automatiquement aux données validées
        $validatedData['numdoc'] = $numinter;


  
       $document = Document::create($validatedData);





        $data = DB::table('documents')
        ->join('clients', 'documents.numclient', '=', 'clients.numclient')
        ->select('documents.*', 'clients.nameclient','clients.mail')
        ->where('documents.numdoc', $numinter)
        ->first();
           


        $pdf = PDF::loadView('pdf.document', compact('data','now')); // Assurez-vous d'avoir une vue adaptée
            // Enregistrer le PDF dans le dossier public
    $pdfPath = 'Document/' . $numinter . '.pdf'; // Choisissez le chemin et le nom du fichier comme vous le souhaitez
    Storage::disk('public')->put($pdfPath, $pdf->output());

    



        return redirect("/document")->with('success', 'Document créée avec succès'); // J'ai corrigé le message ici
    }



}
