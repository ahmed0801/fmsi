<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Interimage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class ExportpdfController extends Controller
{
    public function pdffacture($id)
    {

        // $facture= Facture::find($id);

        $facture = DB::table('factures')
        ->join('clients', 'factures.clientfac', '=', 'clients.numclient')
        ->select('factures.*', 'clients.nameclient','clients.type')
        ->where('factures.id', $id)
        ->first();
        

        $data = DB::table('factproduct')
        ->join('services', 'factproduct.serviceid', '=', 'services.id')
        ->select('factproduct.*', 'services.*')
        ->where('factproduct.factid', $facture->id)->get();
    
 


        $now=Carbon::now();
        // $data = DB::table('facture')->where('numclient', Auth::user()->numclient)
        // ->where('numclient', Auth::user()->numclient)
        // ->get();

        // $tmontant = DB::table('facture')->where('numclient', Auth::user()->numclient)
        // ->where('numclient', Auth::user()->numclient)
        // ->sum('montant');
        // $treste = DB::table('facture')->where('numclient', Auth::user()->numclient)
        // ->where('numclient', Auth::user()->numclient)
        // ->sum('reste');
        // $data = "hello";

        $pdf = PDF::loadView('pdf.facture', ['data'=>$data],compact('facture','now'));

        return $pdf->stream($facture->numfac .'.pdf');
        // return $pdf->download($facture->numfac . '.pdf');

    }


    public function pdfavoir($id)
    {

        // $facture= Facture::find($id);

        $avoir = DB::table('avoirs')
        ->join('clients', 'avoirs.numclient', '=', 'clients.numclient')
        ->select('avoirs.*', 'clients.nameclient',)
        ->where('avoirs.id', $id)
        ->first();
    
        $now=Carbon::now();
        $pdf = PDF::loadView('pdf.avoir', ['data'=>$avoir],compact('now'));

        return $pdf->stream($avoir->numavoir .'.pdf');
        // return $pdf->download($facture->numfac . '.pdf');

    }


        public function pdfdevis($id)
    {

        // $facture= Facture::find($id);

        $devis = DB::table('devis')
        ->join('clients', 'devis.clientdevis', '=', 'clients.numclient')
        ->select('devis.*', 'clients.nameclient','clients.type')
        ->where('devis.id', $id)
        ->first();
        

        $data = DB::table('devisproduct')
        ->join('services', 'devisproduct.serviceid', '=', 'services.id')
        ->select('devisproduct.*', 'services.*')
        ->where('devisproduct.devisid', $devis->id)->get();
    
 
        $now=Carbon::now();

        $pdf = PDF::loadView('pdf.devis', ['data'=>$data],compact('devis','now'));

        return $pdf->stream($devis->numdevis .'.pdf');
        // return $pdf->download($facture->numfac . '.pdf');

    }
    
    public function pdfintervention($id)
    {

        // $facture= Facture::find($id);

        $intervention = DB::table('interventions')
        ->join('clients', 'interventions.numclient', '=', 'clients.numclient')
        ->select('interventions.*', 'clients.nameclient')
        ->where('interventions.id', $id)
        ->first();
    
        $now=Carbon::now();
        $images = Interimage::where('interid', $intervention->id)->get();
        $pdf = PDF::loadView('pdf.intervention', ['data'=>$intervention],compact('now','images'));

        return $pdf->stream($intervention->numinter .'.pdf');
        // return $pdf->download($facture->numfac . '.pdf');

    }


    public function pdfdocument($id)
    {

        // $facture= Facture::find($id);

        $document = DB::table('documents')
        ->join('clients', 'documents.numclient', '=', 'clients.numclient')
        ->select('documents.*', 'clients.nameclient')
        ->where('documents.id', $id)
        ->first();
    
        $now=Carbon::now();
        $pdf = PDF::loadView('pdf.document', ['data'=>$document],compact('now'));

        return $pdf->stream($document->numdoc .'.pdf');
        // return $pdf->download($facture->numfac . '.pdf');

    }

}
