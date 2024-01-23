<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billet;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class BilletController extends Controller
{

    public function dashboard(){

        $nombre = Billet::where('user_id', auth()->user()->id)->get()->count();
        $billets = Billet::where('user_id', auth()->user()->id)->get()->take(4);
        $somme = Billet::where('user_id', auth()->user()->id)->sum('tarif');

        return view('billets.dashboard',compact('nombre','somme','billets'));
    }
    public function create()
    {
        return view('billets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'classe' => 'required',
            'tarif' => 'required|numeric',
            'depart' => 'required',
            'arrive' => 'required',
            'heure_depart' => 'required|date',
        ]);
    
    
        $billet = new Billet([
            'classe' => $request->input('classe'),
            'tarif' => $request->input('tarif'),
            'depart' => $request->input('depart'),
            'arrive' => $request->input('arrive'),
            'heure_depart' => $request->input('heure_depart'),
            'user_id' => auth()->user()->id
        ]);
        // dd($billet);
    
        $billet->save();
    
        return redirect()->route('billets.index')->with('success', 'Billet créé avec succès.');
    }
    


    public function show($id)
    {
        $billet = Billet::findOrFail($id);
        $billetData = "Départ: {$billet->depart}\nArrivée: {$billet->arrive}\nClasse: {$billet->classe}\nTarif: {$billet->tarif}\nHeure de Départ: {$billet->heure_depart}";
        $qrCode = QrCode::size(250)->generate($billetData);
        return view('billets.show', compact('billet', 'qrCode'));
    }

    public function index()
    {
        $billets = Billet::where('user_id', auth()->user()->id)->get();
        return view('billets.index', compact('billets'));
    }
    public function cancel($id)
    {
        $billet = Billet::where('id', $id)->where('user_id', auth()->user()->id)->first();

        if ($billet) {
            $billet->delete();
            return redirect()->route('billets.index')->with('success', 'Billet annulé avec succès.');
        }

        return redirect()->route('billets.index')->with('error', 'Impossible d\'annuler le billet.');
    }


    public function destroy(string $id)
    {
        $billet = Billet::findOrFail($id);
        $billet->delete();
        return redirect()->route('billets.index')
            ->with('success', 'billet annuler avec supprimé avec succès.');
    }

}
