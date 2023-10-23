<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Expertise;
use App\Models\Formation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $actualites = Actualite::orderBy('created_at', 'DESC')->get()->take(3);
        $expertises = Expertise::orderBy('created_at', 'ASC')->get()->take(3)->toArray();
        $expertises = array_chunk($expertises, 3);
        $formations = Formation::orderBy('created_at', 'DESC')->get()->take(3);
        return response()->json([
            'actualites' => $actualites,
            'expertises' => $expertises,
            'formations' => $formations
        ]);
    }
}
