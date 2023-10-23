<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){

        $userData =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($userData->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Email ou mot de passe incorrect',
                'errors' => $userData->errors()
            ], 403);
        }
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json([
                'status' => false,
                'message' => 'Email ou mot de passe incorrect',
            ], 403);
        }

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(['message' => 'Email ou mot de passe incorrect.'], 401);
        }

        if(PersonalAccessToken::where('tokenable_id', $user->id)->exists()){
            PersonalAccessToken::where('tokenable_id', $user->id)->delete();
        }

        $token = $user->createToken("authToken", [
            'user' => $user,
            'expires_at' => Carbon::now()->addHours(1),
        ])->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur connecté avec succès',
            'token' => $token,
            'user' => $user
        ], 200);
    }

    // Déconnexion de l'utilisateur

    public function logout(Request $request)
    {
        
        try {
            // Vérifier si l'utilisateur est authentifié
            if ($request->user()){

                // Supprimer le jeton d'accès de l'utilisateur
                $request->user()->currentAccessToken()->delete();

                return response()->json([
                    'status' => true,
                    'success' => 'Utilisateur déconnecté'
                ], 200);
            } else {
                // Utilisateur non authentifié
                return response()->json([
                    'status' => false,
                    'message' => 'Utilisateur déconnecté'
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


}
