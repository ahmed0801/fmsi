<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TacheController extends Controller
{
    public function inserttache(Request $request)
    {
        $data = $request->validate([
            'userid' => 'required|integer',
            'userid2' => 'integer',
            'userid3' => 'integer',
            'numclient' => 'required|string',
            'designation' => 'required|string',
            'commentaire' => 'nullable|string',
            'datetache' => 'required|date',
            'etat' => 'nullable|string',
            'priorité' => 'nullable|string',
        ]);

        Tache::create($data);

        return redirect("/tache")->with('success', 'tache ajouté avec succès !');
    }

    public function edit($id)
    {
        $tache = DB::table('taches')
        ->join('clients', 'taches.numclient', '=', 'clients.numclient')
        ->join('users', 'taches.userid', '=', 'users.id')
        ->select('taches.*', 'clients.nameclient', 'users.name as username')
        ->where('taches.id', $id)
        ->first();
        
        $users = User::all();
        $clients = Client::all();

        return view('edittache', compact('tache','users','clients'));
    }

    public function update(Request $request, $id)
    {
        // Récupérer la tâche à mettre à jour en fonction de l'ID fourni
        $tache = Tache::find($id);
    
        // Valider les données du formulaire
        $request->validate([
            'designation' => 'required|string',
            'userid' => 'required|integer',
            'userid2' => 'integer',
            'userid3' => 'integer',
            'commentaire' => 'nullable|string|max:255',
            'numclient' => 'required',
            'datetache' => 'required',
            'priorité' => 'required|string',
            'etat' => 'required|string',
        ]);
    
        // Mettre à jour les attributs de la tâche avec les nouvelles valeurs du formulaire
        $tache->designation = $request->input('designation');
        $tache->userid = $request->input('userid');
        $tache->userid2 = $request->input('userid2');
        $tache->userid3 = $request->input('userid3');
        $tache->commentaire = $request->input('commentaire');
        $tache->numclient = $request->input('numclient');
        $tache->datetache = $request->input('datetache');
        $tache->priorité = $request->input('priorité');
        $tache->etat = $request->input('etat');
    
        // Sauvegarder les changements dans la base de données
        $tache->save();
    
        // Rediriger l'utilisateur vers la page appropriée avec un message de succès
        return redirect("/tache")->with('success', 'Tâche mise à jour avec succès.');
    }


    public function updateEtat($id)
{
    $tache = Tache::find($id);
    // Mettez ici votre logique pour marquer la tâche comme "Terminée"
    if($tache->etat == "ouverte"){  
    $tache->etat = "en cours";
    $tache->save();
                      }
    elseif ( $tache->etat == "en cours" ) {      
        $tache->etat = 'terminée';
                $tache->save(); }

    return redirect()->back()->with('success', 'Tâche mise à jour avec succès.');
}
    
    
}
