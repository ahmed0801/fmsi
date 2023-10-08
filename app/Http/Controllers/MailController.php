<?php

namespace App\Http\Controllers;

use App\Mail\Mailavoir;
use App\Mail\Maildevis;
use App\Mail\Maildocument;
use App\Mail\Mailintervention;
use App\Mail\MonEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail($num)
    {
        // Récupérer les données du formulaire
        // $name = 'test';
        // $email = 'test@gmail.com';
        // $phone = 'test';
        // $message = 'test';
        $num = $num;

        $facture = DB::table('factures')
        ->join('clients', 'factures.clientfac', '=', 'clients.numclient')
        ->select('factures.*', 'clients.nameclient','clients.mail')
        ->where('factures.numfac', $num)
        ->first();

        // Envoyer l'e-mail
        $mailData = [
            'nameclient' => $facture->nameclient,
            'clientfac' => $facture->clientfac,
            'email' => $facture->mail,
            'montantfact' => $facture->montantfact,
            'num' => $num,
        ];
    
        Mail::to($facture->mail)
            ->send(new MonEmail($mailData));
    
        return redirect()->route('facture')->with('success', "facture envoyée correctement au client, à l'adresse suivante : $facture->mail ");
    }


    public function sendEmaildevis($num)
    {
        // Récupérer les données du formulaire
        // $name = 'test';
        // $email = 'test@gmail.com';
        // $phone = 'test';
        // $message = 'test';
        $num = $num;

        $devis = DB::table('devis')
        ->join('clients', 'devis.clientdevis', '=', 'clients.numclient')
        ->select('devis.*', 'clients.nameclient','clients.mail')
        ->where('devis.numdevis', $num)
        ->first();

        // Envoyer l'e-mail
        $mailData = [
            'nameclient' => $devis->nameclient,
            'clientfac' => $devis->clientdevis,
            'email' => $devis->mail,
            'montantfact' => $devis->montantdevis,
            'num' => $num,
        ];
    
        Mail::to($devis->mail)
            ->send(new Maildevis($mailData));
    
        return redirect()->route('devis')->with('success', "Devis envoyée correctement au client, à l'adresse suivante : $devis->mail");
    }

    public function sendEmailintervention($num)
    {
        // Récupérer les données du formulaire
        // $name = 'test';
        // $email = 'test@gmail.com';
        // $phone = 'test';
        // $message = 'test';
        $num = $num;

        $intervention = DB::table('interventions')
        ->join('clients', 'interventions.numclient', '=', 'clients.numclient')
        ->select('interventions.*', 'clients.nameclient','clients.mail')
        ->where('interventions.numinter', $num)
        ->first();

        // Envoyer l'e-mail
        $mailData = [
            'nameclient' => $intervention->nameclient,
            'clientfac' => $intervention->numclient,
            'email' => $intervention->mail,
            'titre' => $intervention->titre,
            'détail' => $intervention->détail,
            'num' => $num,
        ];
    
        Mail::to($intervention->mail)
            ->send(new Mailintervention($mailData));
    
        return redirect()->route('intervention')->with('success', "Rapport envoyée correctement au client, à l'adresse suivante : $intervention->mail");
    }

    public function sendEmaildocument($num)
    {
        // Récupérer les données du formulaire
        // $name = 'test';
        // $email = 'test@gmail.com';
        // $phone = 'test';
        // $message = 'test';
        $num = $num;

        $document = DB::table('documents')
        ->join('clients', 'documents.numclient', '=', 'clients.numclient')
        ->select('documents.*', 'clients.nameclient','clients.mail')
        ->where('documents.numdoc', $num)
        ->first();

        // Envoyer l'e-mail
        $mailData = [
            'nameclient' => $document->nameclient,
            'clientfac' => $document->numclient,
            'email' => $document->mail,
            'titre' => $document->titre,
            'détail' => $document->détail,
            'num' => $num,
        ];
    
        Mail::to($document->mail)
            ->send(new Maildocument($mailData));
    
        return redirect()->route('document')->with('success', "Document envoyée correctement au client, à l'adresse suivante : $document->mail");
    }


    public function sendEmailavoir($num)
    {
        // Récupérer les données du formulaire
        // $name = 'test';
        // $email = 'test@gmail.com';
        // $phone = 'test';
        // $message = 'test';
        $num = $num;

        $avoir = DB::table('avoirs')
        ->join('clients', 'avoirs.numclient', '=', 'clients.numclient')
        ->select('avoirs.*', 'clients.nameclient','clients.mail')
        ->where('avoirs.numavoir', $num)
        ->first();

        // Envoyer l'e-mail
        $mailData = [
            'nameclient' => $avoir->nameclient,
            'numclient' => $avoir->numclient,
            'email' => $avoir->mail,
            'montant' => $avoir->montant,
            'date' => $avoir->date,
            'designation' => $avoir->designation,
            'num' => $num,
        ];
    
        Mail::to($avoir->mail)
            ->send(new Mailavoir($mailData));
    
        return redirect()->route('avoir')->with('success', "Avoir envoyée correctement au client, à l'adresse suivante : $avoir->mail");
    }
    
    
}
