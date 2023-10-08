<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Insert a new client.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertClient(Request $request)
    {
        $validatedData = $request->validate([
            'nameclient' => 'required',
            'tel1' => 'required|string',
            'tel2' => 'nullable|string',
            'mail' => 'required|email',
            'adresse' => 'required|string',
            'type' => 'required|string',
            'codeporte' => 'string',
        ]);

        // Génération automatique du numéro de client (numclient)
        $lastClient = Client::orderBy('id', 'desc')->first();
        $lastClientNumber = $lastClient ? (int)substr($lastClient->numclient, 3) : 0;
        $nextClientNumber = $lastClientNumber + 1;
        $numclient = 'CL-' . str_pad($nextClientNumber, 6, '0', STR_PAD_LEFT);

        // Ajout du numéro de client généré automatiquement aux données validées
        $validatedData['numclient'] = $numclient;

        Client::create($validatedData);

        return redirect("/client")->with('success','Client ajouté avec succès');
    }






    public function insertClientfromDevisFacture(Request $request)
    {
        $validatedData = $request->validate([
            'nameclient' => 'required',
            'tel1' => 'required|string',
            'tel2' => 'nullable|string',
            'mail' => 'required|email',
            'adresse' => 'required|string',
            'type' => 'required|string',
            'codeporte' => 'string',
        ]);

        // Génération automatique du numéro de client (numclient)
        $lastClient = Client::orderBy('id', 'desc')->first();
        $lastClientNumber = $lastClient ? (int)substr($lastClient->numclient, 3) : 0;
        $nextClientNumber = $lastClientNumber + 1;
        $numclient = 'CL-' . str_pad($nextClientNumber, 6, '0', STR_PAD_LEFT);

        // Ajout du numéro de client généré automatiquement aux données validées
        $validatedData['numclient'] = $numclient;

        Client::create($validatedData);

        return redirect()->back()->with('success','Client ajouté avec succès');
    }





    public function edit($id)
    {
        $client= Client::find($id);

        return view('editclient', compact('client'));
    }


    public function update(Request $request, $id)
    {
        // Récupérer la tâche à mettre à jour en fonction de l'ID fourni
        $client = Client::find($id);
    
        // Valider les données du formulaire
        $request->validate([
            'nameclient' => 'required|string',
            'tel1' => 'string',
            'tel2' => 'string',
            'mail' => 'required|email',
            'adresse' => 'required',
            'type' => 'required|string',
        ]);
    
        // Mettre à jour les attributs de la tâche avec les nouvelles valeurs du formulaire
        $client->nameclient = $request->input('nameclient');
        $client->tel1 = $request->input('tel1');
        $client->tel2 = $request->input('tel2');
        $client->mail = $request->input('mail');
        $client->adresse = $request->input('adresse');
        $client->type = $request->input('type');
    
        // Sauvegarder les changements dans la base de données
        $client->save();
    
        // Rediriger l'utilisateur vers la page appropriée avec un message de succès
        return redirect("/client")->with('success', 'Client mise à jour avec succès.');
    }
    
}
