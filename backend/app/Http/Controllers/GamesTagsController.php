<?php

namespace App\Http\Controllers;

use App\Models\GamesTags;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;


class GamesTagsController extends Controller
{
    
     // Mostra tutti i record della tabella GamesTags -Salvo
     public function index(){

        try{
            $var = GamesTags::get();


            return response()->json([
                'status'=>200,
                'games_tags'=>$var
            ]);

        }catch(\Exception $e){
            return $e;
        }
    }

    // Mostra un determinato record dellla tabella GamesTags -Salvo
    public function show($id){

        try{
            $var = GamesTags::find($id);

            return response()->json([
                'status'=>200,
                'games_tags'=>$var
            ]);

        }catch(\Exception $e){
            return $e;
        }


    }

    // Elimina un determinato record della tabella GamesTags -Salvo
    public function destroy ($id){

        try{
            $var = GamesTags::find( $id );
            $var->delete();

            return response()->json([
                'status'=>200,
                'games_tags'=>$var
            ]);

        }catch(\Exception $e){
            return $e;
        }

    }

    // Aggiorna un determinato record della tabella GamesTags -Salvo
    public function update(Request $request): Response
    {

        try{
            $var = GamesTags::findOrFail($request->id);

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

    // Aggiunge un record alla tabella GamesTags -Salvo
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
                'tag_id' => 'required|integer',
            ]);

            $var = new GamesTags();
            $var->fill($validatedData);

            $var->save();

            return response()->json($var, 201);

        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }



    }
}
