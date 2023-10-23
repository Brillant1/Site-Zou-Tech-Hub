<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(){

        $messages = Contact::all();
        if(sizeof($messages)>0){
            return response()->json([
                'data' => $messages,
                'status' => 201
            ]);
        }else{
            return response()->json([
                'message' => 'Aucun message n\'est disponible pour le moment',
                'status' => 404
            ]);
        }
    }

    public function store(Request $request){

        $data = $request->all();
        Contact::create($data);
        return response()->json([
            'message' => 'Message envoyé avec succès',
            'status' => 200
        ]);
    }

    public function destroy(Contact $contact){
        $contact->delete();
        return response()->json([
            'message' => 'Message supprimé avec succès',
            'status' => 200
        ]);
    }

    public function show(Contact $contact){
        return response()->json([
            'data' => $contact
        ]);
    }
}
