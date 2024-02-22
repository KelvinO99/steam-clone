<?php

namespace App\Http\Controllers;

use App\Models\Developers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class DevelopersController extends Controller
{
     // Mostra tutti i record della tabella Developers -Salvo
     public function index(){
        $var = Developers::get();


        return response()->json([
            'status'=>200,
            'developers'=>$var
        ]);


    }

    // Mostra un determinato record dellla tabella Developers -Salvo
    public function show($id){
        $var = Developers::find($id);

        return response()->json([
            'status'=>200,
            'developers'=>$var
        ]);

    }

    // Elimina un determinato record della tabella Developers -Salvo
    public function destroy ($id){

        $var = Developers::find( $id );
        $var->delete();

        return response()->json([
            'status'=>200,
            'developers'=>$var
        ]);
    }

    // Aggiorna un determinato record della tabella Developers -Salvo
    public function update(Request $request): Response
    {
        $var = Developers::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }

    // Aggiunge un record alla tabella Developers -Salvo
    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $validatedData = $request->validate([
            'user_id' => 'required',
            'is_publisher' => 'required|boolean',
            'description' => 'required|string|max:2048',
        ]);

        $var = new Developers();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}

