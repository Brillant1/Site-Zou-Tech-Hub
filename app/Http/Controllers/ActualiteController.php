<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actualites = Actualite::orderBy('created_at', 'DESC')->get();
        if(sizeof($actualites)>0){
            return response()->json([
                'data' => $actualites,
                'status' => 201
            ]);
        }else{
            return response()->json([
                'message' => 'Aucune actualité n\'est disponible pour le moment',
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
            $filename = Storage::disk('public')->put('actualites',$request->photo);
        }
        $data = [
            'photo' => $filename,
            'domaine' => $request->domaine,
            'detail' => $request->detail,
            'date' => $request->date,
            'titre' => $request->titre
        ];

        Actualite::create($data);
        return response()->json([
            'message' => "Actualité crée avec succès",
            'status' => 200
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Actualite $actualite)
    {
        return response()->json([
            'message' => 'Actualité trouvée',
            'data' => $actualite
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $actualite = Actualite::findOrFail($request->actualiteId);
        $filename = " ";
        if($request->hasFile('photo')){
            Storage::disk('public')->delete($actualite->photo);
            $filename = Storage::disk('public')->put('actualite' ,$request->photo);
        }else{
            $filename = $actualite->photo;
        }

        $actualite->update([
            'photo' => $filename,
            'titre' => $request->titre,
            'domaine' => $request->domaine,
            'date' => $request->date,
            'detail' => $request->detail
        ]);


        return response()->json([
            'message' => "Actualité mise à jour avec succès !",
            'status' => 200,
            'data' => $actualite
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actualite $actualite)
    {


            //$actualite = Actualite::where('id', $id)->get();
            $actualite->delete();
            return response()->json([
                'message' => 'Actualité supprimé avec succès',
                'status' => 200
            ]);



    }
}
