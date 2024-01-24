<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ImagesController extends Controller
{
     // Mostra tutti i record della tabella Images -Salvo
     public function index(){
        $var = Images::get();


        return response()->json([
            'status'=>200,
            'images'=>$var
        ]);

        
    }

    // Mostra un determinato record dellla tabella Images -Salvo
    public function show($id){
        $var = Images::find($id);

        return response()->json([
            'status'=>200,
            'images'=>$var
        ]);

    }
    
    // Elimina un determinato record della tabella Images -Salvo
    public function destroy ($id){

        $var = Images::find( $id );
        $var->delete();
        
        return response()->json([
            'status'=>200,
            'images'=>$var
        ]);
    }

    // Aggiorna un determinato record della tabella Images -Salvo
    public function update(Request $request): Response
    {
        $var = Images::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }

    // Aggiunge un record alla tabella Images -Salvo
    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $validatedData = $request->validate([
            'game_id' => 'required|max:255',
            'image_path' => 'required|max:255',
        ]);
    
        $var = new Images();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}

