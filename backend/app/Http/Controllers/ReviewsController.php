<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Models\Games;
use App\Models\Role;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ReviewsController extends Controller
{
     public function index(Request $request){

        $skip = $request->input("skip");
        $take = $request->input("take");
        $users_reviews = Reviews::with(['User' => function ($q) {
            $q->select('id', 'username');
        }])->get();

        $users_reviews = $users_reviews->skip($skip)->take($take);

        return response()->json([
            'status' => 200,
            'users_reviews' => $users_reviews

        ]);

    }

    //la funzione sottostante è stata sovrascritta e in ciò ha il
    //ruolo speciale di index + in base al gioco + utente associato
    public function show($id, Request $request){

        $skip = $request->input("skip");
        $take = $request->input("take");
        $users_reviews = Reviews::where('game_id', $id)->with(['User' => function ($q) {
            $q->select('id', 'username');
        }])->get();

        $users_reviews = $users_reviews->skip($skip)->take($take);

        return response()->json([
            'status' => 200,
            'users_reviews' => $users_reviews

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
        $user = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$user) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        if($user->hasRole('developer/publisher')){
            return response()->json(['message'=> 'Non hai il permesso necessario'],401);
        }

        // Controlla se l'utente ha già pubblicato una recensione per questo gioco -Salvo
        $existingReview = Reviews::where('user_id', $user->id)->where('game_id', $request->game_id)->first();

        if ($existingReview){
            return response()->json(['message' => 'Hai già pubblicato una recensione per questo gioco.'], 403);
        }

        $validatedData = $request->validate([
            'game_id' => 'required',
            'date_of_review' => 'required',
            'is_recommended' => 'required|boolean',
            'description' => 'required|string|max:2048',
            'hours_played' => 'required|float',
        ]);

        $review = new Reviews();
        $review->user_id = $user->id;
        $review->fill($validatedData);

        $review->save();

        return response()->json($review, 201);

    }
}
