<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class PLACEHOLDERCONTROLLER extends Controller
{
     // Mostra tutti i record della tabella Games -Salvo
     public function index(){
        $var = Games::get();


        return response()->json([
            'status'=>200,
            'games'=>$var
        ]);

        
    }

    // Mostra un determinato record dellla tabella Games -Salvo
    public function show($id){
        $var = Games::find($id);

        return response()->json([
            'status'=>200,
            'games'=>$var
        ]);

    }
    
    // Elimina un determinato record della tabella Games -Salvo
    public function destroy ($id){

        $var = Games::find( $id );
        $var->delete();
        
        return response()->json([
            'status'=>200,
            'games'=>$var
        ]);
    }

    // Aggiorna un determinato record della tabella Games -Salvo
    public function update(Request $request): Response
    {
        $var = Games::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }

    // Aggiunge un record alla tabella Games -Salvo
    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            '' => 'required|max:255',
        ]);
    
        $var = new Games();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
