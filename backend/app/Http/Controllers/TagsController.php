<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class TagsController extends Controller
{
     // Mostra tutti i record della tabella Tags -Salvo
     public function index(){
        $var = Tags::get();


        return response()->json([
            'status'=>200,
            'tags'=>$var
        ]);

        
    }

    // Mostra un determinato record dellla tabella Tags -Salvo
    public function show($id){
        $var = Tags::find($id);

        return response()->json([
            'status'=>200,
            'tags'=>$var
        ]);

    }
    
    // Elimina un determinato record della tabella Tags -Salvo
    public function destroy ($id){

        $var = Tags::find( $id );
        $var->delete();
        
        return response()->json([
            'status'=>200,
            'tags'=>$var
        ]);
    }

    // Aggiorna un determinato record della tabella Tags -Salvo
    public function update(Request $request): Response
    {
        $var = Tags::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }

    // Aggiunge un record alla tabella Tags -Salvo
    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'is_genre' => 'required',
        ]);
    
        $var = new Tags();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
