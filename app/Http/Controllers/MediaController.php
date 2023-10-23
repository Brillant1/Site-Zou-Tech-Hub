<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


            $filename = Storage::disk('public')->put('medias_images', $request->photo);

            $media = [
                'type' => $request->type_media,
                'url' => $filename
            ];
            Media::create($media);

           return response()->json([
            'message' => "Media enregistré avec succès",
            'statut' => true
           ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Media::findOrFail($id)->delete();
        return response()->json([
            'message' => "Media supprimé avec succès",
            'statut' => true
           ]);
    }
}
