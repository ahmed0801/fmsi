<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AvoirController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ExportpdfController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TacheController;
use App\Mail\MonEmail;
use App\Models\Avoir;
use App\Models\Client;
use App\Models\Devis;
use App\Models\Facture;
use App\Models\Service;
use App\Models\Tache;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {







    Route::get('/facture', function () {
        $factures = DB::table('factures')
        ->join('clients', 'factures.clientfac', '=', 'clients.numclient')
        ->select('factures.*', 'clients.nameclient')
        ->latest()->get();
        return view('facture',compact('factures'));
    })->name('facture');
    
    Route::get('/créerfacture', function () {
        $clients = Client::all();
        $services = Service::all();
        return view('créerfacture',compact('clients','services'));
    });
    
    Route::get('/devis', function () {
        $devis = DB::table('devis')
        ->join('clients', 'devis.clientdevis', '=', 'clients.numclient')
        ->select('devis.*', 'clients.nameclient')
        ->latest()->get();
        return view('devis',compact('devis'));
    })->name('devis');
    
    
    Route::get('/créerdevis', function () {
        $clients = Client::latest()->get();
        $services = Service::all();
        return view('créerdevis',compact('clients','services'));
    });
    
    Route::get('/client', function () {
        $clients = Client::all();
        return view('client',compact('clients'));
    });
    
    Route::get('/créerclient', function () {
        return view('créerclient');
    });
    
    
    
    Route::get('/service', function () {
        $services = Service::all();
        return view('service',compact('services'));
    });
    
    Route::get('/créerservice', function () {
        return view('créerservice');
    });
    
    Route::get('/back', function () {
        return redirect('/dashboard');
    });
    
    
    Route::get('/user', function () {
        $users = User::all();
        return view('user',compact('users'));
    });
    Route::get('/créeruser', function () {
        return view('/créeruser');
    });
    
    Route::get('/tache', function () {
        // $taches = Tache::all();
        $taches = DB::table('taches')
        ->join('clients', 'taches.numclient', '=', 'clients.numclient')
        ->join('users', 'taches.userid', '=', 'users.id')
        ->select('taches.*', 'clients.nameclient', 'users.name as username')
        ->latest()->get();
        return view('tache',compact('taches'));
    });
    Route::get('/créertache', function () {
        $users = User::all();
        $clients = Client::all();
        return view('/créertache',compact('users','clients'));
    });


    Route::get('/créerintervention', function () {
        $clients = Client::all();
        return view('/créerintervention',compact('clients'));
    });
    
    
    
    Route::get('/avoir', function () {
        // $taches = Tache::all();
        $avoirs = DB::table('avoirs')
        ->join('clients', 'avoirs.numclient', '=', 'clients.numclient')
        ->select('avoirs.*', 'clients.nameclient')
        ->latest()->get();
        return view('avoir',compact('avoirs'));
    })->name('avoir');


    Route::get('/intervention', function () {
        // $taches = Tache::all();
        $interventions = DB::table('interventions')
        ->join('clients', 'interventions.numclient', '=', 'clients.numclient')
        ->select('interventions.*', 'clients.nameclient')
        ->latest()->get();
        return view('intervention',compact('interventions'));
    })->name('intervention');


    Route::get('/mesrapports', function () {
        // $taches = Tache::all();
        $interventions = DB::table('interventions')
        ->join('clients', 'interventions.numclient', '=', 'clients.numclient')
        ->select('interventions.*', 'clients.nameclient')
        ->where('userid',Auth::user()->id)
        ->latest()->get();
        return view('mesrapports',compact('interventions'));
    })->name('mesrapports');

    
    Route::get('/créeravoir', function () {
        $clients = Client::all();
        return view('/créeravoir',compact('clients'));
    });


    Route::get('/créerdocument', function () {
        $clients = Client::all();
        return view('/créerdocument',compact('clients'));
    });
    Route::get('/document', function () {
        // $taches = Tache::all();
        $documents = DB::table('documents')
        ->join('clients', 'documents.numclient', '=', 'clients.numclient')
        ->select('documents.*', 'clients.nameclient')
        ->latest()->get();
        return view('document',compact('documents'));
    })->name('document');

    
    Route::post('/facture/insert', [FactureController::class, 'insertFacture'])->name('facture.insert');
    Route::post('/devis/insert', [DevisController::class, 'insertdevis'])->name('devis.insert');
    Route::post('/client/insert', [ClientController::class, 'insertclient'])->name('client.insert');
    Route::post('/service/insert', [ServiceController::class, 'insertservice'])->name('service.insert');
    Route::post('/avoir/insert', [AvoirController::class, 'insertavoir'])->name('avoir.insert');
    Route::post('/intervention/insert', [InterventionController::class, 'insertintervention'])->name('intervention.insert');
    Route::post('/document/insert', [DocumentController::class, 'insertdocument'])->name('document.insert');


    // add user
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    
    Route::post('/tache/insert', [TacheController::class, 'inserttache'])->name('tache.insert');
    
    Route::get('/edittache/{id}', [TacheController::class, 'edit'])->name('edittache');
    Route::post('/updatetache/{id}', [TacheController::class, 'update'])->name('tache.update');
    
    Route::get('/editclient/{id}', [ClientController::class, 'edit'])->name('editclient');
    Route::post('/updateclient/{id}', [ClientController::class, 'update'])->name('client.update');
    
    Route::get('/editservice/{id}', [ServiceController::class, 'edit'])->name('editservice');
    Route::post('/updateservice/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
    
    Route::get('/modifintervention/{id}', [InterventionController::class, 'edit'])->name('modifintervention');
    Route::post('/updateintervention/{id}', [InterventionController::class, 'update'])->name('intervention.update');

// supprimr images intervention
    Route::delete('/delete-image/{id}', [InterventionController::class, 'deleteImage'])->name('intervention.deleteImage');

    Route::post('/insertClientfromDevisFacture', [ClientController::class, 'insertClientfromDevisFacture'])->name('insertClientfromDevisFacture');

    
    
    
    // pdf
    Route::get('/editfacture/{id}', [ExportpdfController::class, 'pdffacture'])->name('editfacture');
    Route::get('/editavoir/{id}', [ExportpdfController::class, 'pdfavoir'])->name('editavoir');
    Route::get('/editdevis/{id}', [ExportpdfController::class, 'pdfdevis'])->name('editdevis');
    Route::get('/editintervention/{id}', [ExportpdfController::class, 'pdfintervention'])->name('editintervention');
    Route::get('/editdocument/{id}', [ExportpdfController::class, 'pdfdocument'])->name('editdocument');

    
    // essai pdf 
    // Route::get('/pdffacture',[ExportpdfController::class, 'pdffacture']);
    
    
    Route::post('/updateetat/{id}', [TacheController::class, 'updateetat'])->name('tache.updateetat');


    // send mail 
Route::get('/send/{num}', [MailController::class, 'sendEmail'])->name('sendfact');
Route::get('/senddevis/{num}', [MailController::class, 'sendEmaildevis'])->name('senddevis');
Route::get('/sendintervention/{num}', [MailController::class, 'sendEmailintervention'])->name('sendintervention');
Route::get('/senddocument/{num}', [MailController::class, 'sendEmaildocument'])->name('senddocument');
Route::get('/sendavoir/{num}', [MailController::class, 'sendEmailavoir'])->name('sendavoir');


    Route::get('/mestachesterminé', function () {
        $mestachesterminé = DB::table('taches')
        ->join('clients', 'taches.numclient', '=', 'clients.numclient')
        ->join('users', 'taches.userid', '=', 'users.id')
        ->select('taches.*', 'clients.nameclient','clients.tel1','clients.tel2','clients.adresse')
        ->where('taches.userid','=',Auth::user()->id)
        ->where('taches.etat','terminée')
        ->latest()->get();

        return view('/tacheterminé',compact('mestachesterminé'));
    });



    Route::get('/dashboard', function () {
        $nbfacture = Facture::count();
        $nbdevis = Devis::count();
        $nbavoir = Avoir::count();
        $nbtacheouverte = Tache::where('etat','=','ouverte')->count();

        $today = Carbon::today();
        $nbfacturetoday = Facture::whereDate('datefac', $today)->count();
        $nbdevistoday = Devis::whereDate('datedevis', $today)->count();
        $nbavoirtoday = Avoir::whereDate('date', $today)->count();
        $nbtachetoday = Tache::whereDate('datetache', $today)->count();

        // $mestaches = Tache::where('userid', Auth::user()->id)->latest()->get();
        $mestaches = DB::table('taches')
        ->join('clients', 'taches.numclient', '=', 'clients.numclient')
        ->join('users', 'taches.userid', '=', 'users.id')
        ->select('taches.*', 'clients.nameclient','clients.tel1','clients.tel2','clients.adresse')
        ->where('taches.userid','=',Auth::user()->id)
        ->where('taches.etat','!=','terminée')
        ->latest()->get();


        return view('dashboard',compact('nbfacture','nbdevis','nbavoir','nbtacheouverte','nbfacturetoday','nbdevistoday','nbavoirtoday','nbtachetoday','mestaches'));
    })->name('dashboard');
});
