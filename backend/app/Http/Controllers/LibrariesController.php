<?php

namespace App\Http\Controllers;

use App\Models\Libraries;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LibrariesController extends Controller
{
     // Mostra tutti i record della tabella Libraries -Salvo
     public function index(Request $request){
        $is_owned = $request->input("is_owned");
        $is_wishlisted = $request->input("is_wishlisted");
        $library = Libraries::query();

        if($is_owned) $library->where('is_owned', '1');

        if($is_wishlisted) $library->where('is_wishlisted', '1');


        return response()->json([
            'status'=>200,
            'libraries'=>$library->get()
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
            'user_id' => 'required|integer',
            'game_id' => 'required|integer',
            //'is_wishlisted' => 'required|boolean',
            'is_wishlisted' => [
                'required',
                'boolean',
                function ($attribute, $value, $fail) use ($request) {
                    // Custom validation rule
                    if (($value == 1 && $request->input('is_owned') == 1) ||
                        ($value == 0 && $request->input('is_owned') == 0)) {
                        $fail("If $attribute is 1, is_owned must be 0 and vice versa.");
                    }
                },
            ],
            'is_owned' => 'required|boolean',
        ]);

        $var = new Libraries();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
