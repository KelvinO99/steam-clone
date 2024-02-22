<?php

namespace App\Http\Controllers;

use App\Models\Achievements;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;

class AchievementsController extends Controller
{
     // Mostra tutti i record della tabella Achievements -Salvo
     public function index(){

        try{
            $var = Achievements::get();
            
            return response()->json([
                'status'=>200,
                'achievements'=>$var
            ]);

        }catch(\Exception $e){
            return $e;
        }

    }

    // Mostra un determinato record dellla tabella Achievements -Salvo
    public function show($id){
        
        try{
            $var = Achievements::find($id);

            return response()->json([
                'status'=>200,
                'achievements'=>$var
            ]);

        }catch(\Exception $e){
            return $e;
        }



    }

    // Elimina un determinato record della tabella Achievements -Salvo
    public function destroy ($id){

        try{
            $var = Achievements::find( $id );
            $var->delete();
    
            return response()->json([
                'status'=>200,
                'achievements'=>$var
            ]);

        }catch(\Exception $e){
            return $e;
        }
    }

    // Aggiorna un determinato record della tabella Achievements -Salvo
    public function update(Request $request): Response
    {

        try{
            $var = Achievements::findOrFail($request->id);

            if ($var->update($request->all()) === false) {
                return response(
                    "not real {$request->id}",
                    Response::HTTP_BAD_REQUEST
                );
            }
    
            return response($var);

        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }
    }

    // Aggiunge un record alla tabella Achievements -Salvo
    public function store(Request $request) {
        
        try{
            // Ottieni l'utente autenticato tramite JWT
            $var = JWTAuth::parseToken()->authenticate();

            // Se non c'è un utente autenticato, restituisci un errore
            if (!$var) {
                return response()->json(['message' => 'Non autorizzato'], 401);
            }

            $validatedData = $request->validate([
                'game_id' => 'required|integer',
                'name' => 'required|string|between:1,100',
                'image'=> 'required|string',
            ]);

            $var = new Achievements();
            $var->fill($validatedData);

            $var->save();

            return response()->json($var, 201);
            
        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }
        

    }
}
