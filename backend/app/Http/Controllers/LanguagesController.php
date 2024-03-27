<?php

namespace App\Http\Controllers;

use App\Models\Languages;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LanguagesController extends Controller
{

     public function index(){
        $var = Languages::get();


        return response()->json([
            'status'=>200,
            'PLACEHOLDERTABLE'=>$var
        ]);


    }


    public function show($id){
        $var = Languages::find($id);

        return response()->json([
            'status'=>200,
            'PLACEHOLDERTABLE'=>$var
        ]);

    }


    public function destroy ($id){

        $var = Languages::find( $id );
        $var->delete();

        return response()->json([
            'status'=>200,
            'PLACEHOLDERTABLE'=>$var
        ]);
    }


    public function update(Request $request): Response
    {
        $var = Languages::findOrFail($request->id);

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
            'PLACEHOLDERCOLUMN' => 'required|max:255',
            'PLACEHOLDERCOLUMN' => 'required|max:255',
        ]);

        $var = new Languages();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
