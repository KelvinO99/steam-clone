<?php

namespace App\Http\Controllers;

use App\Models\Achievements;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AchievementsController extends Controller
{
     // Mostra tutti i record della tabella Achievements -Salvo
     public function index(){
        $var = Achievements::get();


        return response()->json([
            'status'=>200,
            'achievements'=>$var
        ]);

        
    }

    // Mostra un determinato record dellla tabella Achievements -Salvo
    public function show($id){
        $var = Achievements::find($id);

        return response()->json([
            'status'=>200,
            'achievements'=>$var
        ]);

    }
    
    // Elimina un determinato record della tabella Achievements -Salvo
    public function destroy ($id){

        $var = Achievements::find( $id );
        $var->delete();
        
        return response()->json([
            'status'=>200,
            'achievements'=>$var
        ]);
    }

    // Aggiorna un determinato record della tabella Achievements -Salvo
    public function update(Request $request): Response
    {
        $var = Achievements::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }

    // Aggiunge un record alla tabella Achievements -Salvo
    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $validatedData = $request->validate([
            'game_id' => 'required|max:255',
            'name' => 'required|max:255',
            'image'=> 'required',
        ]);
    
        $var = new Achievements();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
