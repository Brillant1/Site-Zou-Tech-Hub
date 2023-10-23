<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expertises = Expertise::orderBy('created_at', 'DESC')->get();
        if(sizeof($expertises)>0){
            return response()->json([
                'message' => 'liste des expertises',
                'data' => $expertises,
                'status' => 201
            ]);
        }else{
            return response()->json([
                'message' => 'Aucune expertise n\'est disponible pour le moment',
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
            $filename = Storage::disk('public')->put('expertises',$request->photo);
        }
        $data = [
            'photo' => $filename,
            'detail' => $request->detail,
            'titre' => $request->titre
        ];

        Expertise::create($data);
        return response()->json([
            'message' => "Actualité crée avec succès",
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expertise $expertise)
    {
        return response()->json([
            'message' => 'Expertise trouvée',
            'data' => $expertise
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $expertise = Expertise::findOrFail($request->expertiseId);
        $filename = " ";
        if($request->hasFile('photo')){
            Storage::disk('public')->delete($expertise->photo);
            $filename = Storage::disk('public')->put('expertise' ,$request->photo);
        }else{
            $filename = $expertise->photo;
        }

        $expertise->update([
            'photo' => $filename,
            'titre' => $request->titre,
            'detail' => $request->detail
        ]);


        return response()->json([
            'message' => "Expertise mise à jour avec succès !",
            'status' => 200,
            'data' => $expertise
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expertise $expertise)
    {
        $expertise->delete();
        return response()->json([
            'message' => 'Expertise supprimée avec succès',
            'status' => 200
        ]);
    }
}
