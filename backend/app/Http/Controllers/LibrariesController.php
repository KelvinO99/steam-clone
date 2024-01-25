<?php

namespace App\Http\Controllers;

use App\Models\Libraries;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LibrariesController extends Controller
{
     // Mostra tutti i record della tabella Libraries -Salvo
     public function index(){
        $var = Libraries::get();


        return response()->json([
            'status'=>200,
            'libraries'=>$var
        ]);

        
    }

    // Mostra un determinato record dellla tabella Libraries -Salvo
    public function show($id){
        $var = Libraries::find($id);

        return response()->json([
            'status'=>200,
            'libraries'=>$var
        ]);

    }
    
    // Elimina un determinato record della tabella Libraries -Salvo
    public function destroy ($id){

        $var = Libraries::find( $id );
        $var->delete();
        
        return response()->json([
            'status'=>200,
            'libraries'=>$var
        ]);
    }

    // Aggiorna un determinato record della tabella Libraries -Salvo
    public function update(Request $request): Response
    {
        $var = Libraries::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }

    // Aggiunge un record alla tabella Libraries -Salvo
    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $validatedData = $request->validate([
            'user_id' => 'required|max:255',
            'game_id' => 'required|max:255',
            'is_wishlisted' => 'required',
        ]);
    
        $var = new Libraries();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
