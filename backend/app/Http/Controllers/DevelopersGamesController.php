<?php

namespace App\Http\Controllers;

use App\Models\DevelopersGames;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class DevelopersGamesController extends Controller
{
     // Mostra tutti i record della tabella DevelopersGames -Salvo
     public function index(){

        try{
            $var = DevelopersGames::get();


            return response()->json([
                'status'=>200,
                'developers_games'=>$var
            ]);
            
        }catch(\Exception $e){
            return $e;
        }
    }

    // Mostra un determinato record dellla tabella DevelopersGames -Salvo
    public function show($id){

        try{
            $var = DevelopersGames::find($id);

            return response()->json([
                'status'=>200,
                'developers_games'=>$var
            ]);

        }catch(\Exception $e){
            return $e;
        }

    }

    // Elimina un determinato record della tabella DevelopersGames -Salvo
    public function destroy ($id){

        try{
            $var = DevelopersGames::find( $id );
            $var->delete();
    
            return response()->json([
                'status'=>200,
                'developers_games'=>$var
            ]);

        }catch(\Exception $e){
            return $e;
        }
    }

    // Aggiorna un determinato record della tabella DevelopersGames -Salvo
    public function update(Request $request): Response
    {
        try{
            $var = DevelopersGames::findOrFail($request->id);

            if ($var->update($request->all()) === false) {
                return response(
                    "not real {$request->id}",
                    Response::HTTP_BAD_REQUEST
                );
            }
    
            return response($var);

        }catch(\Exception $e){
            return $e;
        }
    }

    // Aggiunge un record alla tabella DevelopersGames -Salvo
    public function store(Request $request) {

        try{
            // Ottieni l'utente autenticato tramite JWT
            $var = JWTAuth::parseToken()->authenticate();

            // Se non c'è un utente autenticato, restituisci un errore
            if (!$var) {
                return response()->json(['message' => 'Non autorizzato'], 401);
            }

            $validatedData = $request->validate([
                'developer_id' => 'required|integer',
                'game_id' => 'required|integer',
            ]);

            $var = new DevelopersGames();
            $var->fill($validatedData);

            $var->save();

            return response()->json($var, 201);
            
        }catch(\Exception $e){
            return $e;
        }

    }
}

