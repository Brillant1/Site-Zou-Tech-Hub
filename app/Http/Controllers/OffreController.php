<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offres = Offre::where('is_publish', true)->orderBy('created_at', 'DESC')->get();
        if(sizeof($offres)>0){
            return response()->json([
                'data' => $offres,
                'status' => 201
            ]);
        }else{
            return response()->json([
                'message' => 'Aucune offre n\'est disponible pour le moment',
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
        if($request->hasFile('photo')){
            $filename = Storage::disk('public')->put('offres',$request->photo);
        }
        $data = [
            'photo' => $filename,
            'description' => $request->description,
            'titre' => $request->titre,
            'debut_inscription' => $request->debut_inscription,
            'fin_inscription' => $request->fin_inscription,
            'debut_formation' => $request->debut_formation,
            'can_submit' => $request->can_submit,
            'is_publish' => $request->is_publish
        ];

        Offre::create($data);
        return response()->json([
            'message' => "Offre créée avec succès",
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Offre $offre)
    {
        return response()->json([
            'data' => $offre
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $offre = Offre::findOrFail($request->offreId);
        $filename = " ";
        if($request->hasFile('photo')){
            Storage::disk('public')->delete($offre->photo);
            $filename = Storage::disk('public')->put('offres' ,$request->photo);
        }else{
            $filename = $offre->photo;
        }

        $offre->update([
            'photo' => $filename,
            'description' => $request->description,
            'titre' => $request->titre,
            'debut_inscription' => $request->debut_inscription,
            'fin_inscription' => $request->fin_inscription,
            'debut_formation' => $request->debut_formation,
            'can_submit' => $request->can_submit,
            'is_publish' => $request->is_publish
        ]);


        return response()->json([
            'message' => "Offre mise à jour avec succès !",
            'status' => 200,
            'data' => $offre
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();
        return response()->json([
            'message' => 'Offre supprimée avec succès',
            'status' => 200
        ]);
    }
}
