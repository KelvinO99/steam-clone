<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Models\Role;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ReviewsController extends Controller
{
     // Mostra tutti i record della tabella Reviews -Salvo
     public function index(){
        $var = Reviews::get();


        return response()->json([
            'status'=>200,
            'reviews'=>$var
        ]);

        
    }

    // Mostra un determinato record dellla tabella Reviews -Salvo
    public function show($id){
        $var = Reviews::find($id);

        return response()->json([
            'status'=>200,
            'reviews'=>$var
        ]);

    }
    
    // Elimina un determinato record della tabella Reviews -Salvo
    public function destroy ($id){

        $var = Reviews::find( $id );
        $var->delete();
        
        return response()->json([
            'status'=>200,
            'reviews'=>$var
        ]);
    }

    // Aggiorna un determinato record della tabella Reviews -Salvo
    public function update(Request $request): Response
    {
        $var = Reviews::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }

    // Aggiunge un record alla tabella Reviews -Salvo
    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }
        
        if($var->hasRole('developer/publisher')){
            return response()->json(['message'=> 'Non hai il permesso necessario'],401);
        }

        // Controlla se l'utente ha già pubblicato una recensione per questo gioco -Salvo
        $existingReview = Reviews::where('user_id', $var->id)->where('game_id', $request->game_id)->first();

        if ($existingReview){
            return response()->json(['message' => 'Hai già pubblicato una recensione per questo gioco.'], 403);
        }

        $validatedData = $request->validate([
            'user_id' => 'required|max:255',
            'game_id' => 'required|max:255',
            'data_of_review' => 'required|max:255',
            //'is_recommended' => 'required',
            'description' => 'required|max:255',
            'hours_played' => 'required|max:255',
        ]);
    
        $var = new Reviews();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
