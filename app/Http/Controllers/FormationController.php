<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::where('is_publish', true)->orderBy('created_at', 'DESC')->get();
        if(sizeof($formations)>0){
            return response()->json([
                'data' => $formations,
                'status' => 201
            ]);
        }else{
            return response()->json([
                'message' => 'Aucune formation n\'est disponible pour le moment',
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
            $filename = Storage::disk('public')->put('formations',$request->photo);
        }
        $data = [
            'photo' => $filename,
            'description' => $request->description,
            'titre' => $request->titre,

            'can_submit' => $request->can_submit,
            'is_publish' => $request->is_publish
        ];

        Formation::create($data);
        return response()->json([
            'message' => "Formation crée avec succès",
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        return response()->json([
            'message' => 'Formation trouvée',
            'data' => $formation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $formation = Formation::findOrFail($request->formationId);
        $filename = " ";
        if($request->hasFile('photo')){
            Storage::disk('public')->delete($formation->photo);
            $filename = Storage::disk('public')->put('formations' ,$request->photo);
        }else{
            $filename = $formation->photo;
        }

        $formation->update([
            'photo' => $filename,
            'description' => $request->description,
            'titre' => $request->titre,

            'can_submit' => $request->can_submit,
            'is_publish' => $request->is_publish
        ]);


        return response()->json([
            'message' => "Formation mise à jour avec succès !",
            'status' => 200,
            'data' => $formation
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();
        return response()->json([
            'message' => 'Expertise supprimée avec succès',
            'status' => 200
        ]);
    }
}
