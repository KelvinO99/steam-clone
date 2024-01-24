<?php

namespace App\Http\Controllers;

use App\Models\UsersAchievements;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsersAchievementController extends Controller
{
     // Mostra tutti i record della tabella UsersAchievements -Salvo
     public function index(){
        $var = UsersAchievements::get();


        return response()->json([
            'status'=>200,
            'users_achievements'=>$var
        ]);

        
    }

    // Mostra un determinato record dellla tabella UsersAchievements -Salvo
    public function show($id){
        $var = UsersAchievements::find($id);

        return response()->json([
            'status'=>200,
            'users_achievements'=>$var
        ]);

    }
    
    // Elimina un determinato record della tabella UsersAchievements -Salvo
    public function destroy ($id){

        $var = UsersAchievements::find( $id );
        $var->delete();
        
        return response()->json([
            'status'=>200,
            'users_achievements'=>$var
        ]);
    }

    // Aggiorna un determinato record della tabella UsersAchievements -Salvo
    public function update(Request $request): Response
    {
        $var = UsersAchievements::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }

    // Aggiunge un record alla tabella UsersAchievements -Salvo
    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = auth()->user();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $validatedData = $request->validate([
            'user_id' => 'required|max:255',
            'achievement_id' => 'required|max:255',
            'is_achieved' => 'required',
            'date' => 'required',
        ]);
    
        $var = new UsersAchievements();
        $var->fill($validatedData);
        $var->save();

        return response()->json($var, 201);

    }
}
