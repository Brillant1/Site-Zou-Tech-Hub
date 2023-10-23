<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        Abonnement::create($data);
        return response()->json([
            'message' => 'Abonnement effectué avec succès',
            'status' => 200
        ]);
    }
}
