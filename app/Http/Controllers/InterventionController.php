<?php

namespace App\Http\Controllers;

use App\Models\Interimage;
use App\Models\Intervention;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class InterventionController extends Controller
{

    public function insertintervention(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required',
            'numclient' => 'required',
            'date' => 'required',
            'détail' => 'required',
        ]);
    
        // Génération automatique du numéro de facture (numfac)
        $now=Carbon::now();
        $lastFacture = Intervention::orderBy('id', 'desc')->first();
        $numinter = $lastFacture ? 'I-2023000' . ($lastFacture->id + 1) : 'I-2023000';
        
        // Ajout du numéro de facture généré automatiquement aux données validées
        $validatedData['numinter'] = $numinter;

        if (Auth::user()->role == "admin")
        {
            $validatedData['etat'] = "validé"; 
        }

  
        $validatedData['userid'] = Auth::user()->id; 
       $intervention = Intervention::create($validatedData);


        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->hashName();
                // $path = $image->store('interimages'); // Store the image in the storage/app/interimages directory
              $path =  $image->storeAs('public/intervention', $imageName);

                // Create a new record in the interimages table
                Interimage::create([
                    'interid' => $intervention->id,
                    'photo' => $imageName, // Store the path of the image in the 'photo' column
                ]);
            }
        }



        $data = DB::table('interventions')
        ->join('clients', 'interventions.numclient', '=', 'clients.numclient')
        ->select('interventions.*', 'clients.nameclient','clients.mail')
        ->where('interventions.numinter', $numinter)
        ->first();
           
        $images = Interimage::where('interid', $intervention->id)->get();


        $pdf = PDF::loadView('pdf.intervention', compact('data','now','images')); // Assurez-vous d'avoir une vue adaptée
            // Enregistrer le PDF dans le dossier public
    $pdfPath = 'rapport-intervention/' . $numinter . '.pdf'; // Choisissez le chemin et le nom du fichier comme vous le souhaitez
    Storage::disk('public')->put($pdfPath, $pdf->output());

    

    if ( Auth::user()->role == "employee") {
        return redirect("/mesrapports")->with('success', 'Intervention créée avec succès');
    }
    else {  

        return redirect("/intervention")->with('success', 'Intervention créée avec succès');} // J'ai corrigé le message ici
    }


    public function edit($id)
    {
        // $intervention= Intervention::find($id);

        $intervention = DB::table('interventions')
        ->join('clients', 'interventions.numclient', '=', 'clients.numclient')
        ->select('interventions.*', 'clients.nameclient')
        ->where('interventions.id', $id)
        ->first();
        $images = Interimage::where('interid',$intervention->id)->get();

        return view('modifintervention', compact('intervention','images'));
    }



    public function update(Request $request, $id)
    {
        // Récupérer la tâche à mettre à jour en fonction de l'ID fourni
        $intervention = Intervention::find($id);
    
        // Valider les données du formulaire
        $request->validate([
            'titre' => 'required|string',
            'détail' => 'required',
            'date' => 'required',
        ]);
    
        // Mettre à jour les attributs de la tâche avec les nouvelles valeurs du formulaire
        $intervention->titre = $request->input('titre');
        $intervention->détail = $request->input('détail');
        $intervention->date = $request->input('date');
        if ( Auth::user()->role == "employee") 
        {

            $intervention->etat = "en attente";

        }
        else { 
            $intervention->etat = "validé";

        }


    
        // Sauvegarder les changements dans la base de données
        $intervention->save();


                // Handle image uploads
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $imageName = $image->hashName();
                        // $path = $image->store('interimages'); // Store the image in the storage/app/interimages directory
                      $path =  $image->storeAs('public/intervention', $imageName);
        
                        // Create a new record in the interimages table
                        Interimage::create([
                            'interid' => $intervention->id,
                            'photo' => $imageName, // Store the path of the image in the 'photo' column
                        ]);
                    }
                }
    

        // Rediriger l'utilisateur vers la page appropriée avec un message de succès
        if ( Auth::user()->role == "employee") {
            return redirect("/mesrapports")->with('success', 'intervention mise à jour avec succès.');
        }
        else {  
        return redirect("/intervention")->with('success', 'intervention mise à jour avec succès.');}
    }






    public function deleteImage($id)
    {
        $image = Interimage::findOrFail($id); // Trouver l'image par ID
        
        // Supprimer le fichier associé sur le système de fichiers (en utilisant le stockage que vous avez configuré)
        Storage::delete('intervention/' . $image->photo);
        
        // Supprimer l'enregistrement de la base de données
        $image->delete();

        return response()->json(['message' => 'Image supprimée avec succès']);
    }

}
