<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribes1 = Subscribe::with('offre')
        ->where('traited', 0)
        ->get();

        $subscribes2 = Subscribe::with('offre')
        ->where('traited', 1)
        ->get();

        if(sizeof($subscribes1)>0 || sizeof($subscribes2)>0){
            return response()->json([
                'data1' => $subscribes1,
                'data2' => $subscribes2,
                'status' => 201
            ]);
        }else{
            return response()->json([
                'message' => 'Aucun abonnement n\'est disponible pour le moment',
                'status' => 404
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = "";
        if($request->hasFile('cv')){
            $filename = Storage::disk('public')->put('cv',$request->cv);
        }
        $data = [
            'cv' => $filename,
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'numero' => $request->numero,
            'profession' => $request->profession,
            'offre_id' => $request->offreId
        ];

        Subscribe::create($data);

        return response()->json([
            'message' => "Candidature soumise avec succès",
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscribe $subscribe)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $subscribe = Subscribe::where('id', $request->subscribeId)->first();
        $subscribe->traited?$subscribe->update(['traited' => false]):$subscribe->update(['traited' => true]);

        return response()->json([
            'message' => 'Candidature mise à jour avec succès',
            'status' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();

        return response()->json([
            'message' => 'Abonnement supprimé avec succès',
            'status' => 200
        ]);
    }
}
