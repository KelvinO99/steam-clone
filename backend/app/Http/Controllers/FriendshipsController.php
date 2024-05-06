<?php

namespace App\Http\Controllers;

use App\Models\Friendships;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class FriendshipsController extends Controller
{

     public function index(){
        $var = Friendships::get();


        return response()->json([
            'status'=>200,
            'friendships'=>$var
        ]);


    }


    public function show($id){
        $var = Friendships::find($id);

        return response()->json([
            'status'=>200,
            'friendships'=>$var
        ]);

    }


    public function destroy ($id){

        $var = Friendships::find( $id );
        $var->delete();

        return response()->json([
            'status'=>200,
            'friendships'=>$var
        ]);
    }


    public function update(Request $request): Response
    {
        $var = Friendships::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }


    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $validatedData = $request->validate([
            'user_id_1' => 'required|max:255',
            'user_id_2' => 'required|max:255',
            'is_pending' => 'required|max:255',
        ]);

        $var = new Friendships();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
