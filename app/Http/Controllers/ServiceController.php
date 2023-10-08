<?php

// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{


    public function insertservice(Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
            // 'tva' => 'required|numeric',
            'montant_ht' => 'required|numeric',
        ]);

        Service::create($data);

        return redirect("/service")->with('success', 'Service ajouté avec succès !');
    }



    public function edit($id)
    {
        $service= Service::find($id);

        return view('editservice', compact('service'));
    }


    public function update(Request $request, $id)
    {
        // Récupérer la tâche à mettre à jour en fonction de l'ID fourni
        $service = Service::find($id);
    
        // Valider les données du formulaire
        $request->validate([
            'designation' => 'required|string',
            // 'tva' => 'required',
            'montant_ht' => 'required',
        ]);
    
        // Mettre à jour les attributs de la tâche avec les nouvelles valeurs du formulaire
        $service->designation = $request->input('designation');
        // $service->tva = $request->input('tva');
        $service->montant_ht = $request->input('montant_ht');

    
        // Sauvegarder les changements dans la base de données
        $service->save();
    
        // Rediriger l'utilisateur vers la page appropriée avec un message de succès
        return redirect("/service")->with('success', 'Service mise à jour avec succès.');
    }



// supprimer
    public function destroy($id)
    {
        // Recherchez le service à supprimer dans la base de données
        $service = Service::findOrFail($id);

        // Supprimez le service
        $service->delete();

        // Redirigez vers la liste des services après la suppression réussie
        return redirect("/service")->with('success', 'Service supprimé avec succès.');
    }

}
