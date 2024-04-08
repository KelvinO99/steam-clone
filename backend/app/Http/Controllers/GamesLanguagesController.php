<?php

namespace App\Http\Controllers;

use App\Models\GamesLanguages;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class GamesLanguagesController extends Controller
{

     public function index(){
        $var = GamesLanguages::get();


        return response()->json([
            'status'=>200,
            'games_languages'=>$var
        ]);


    }


    public function show($id){

        $gameLanguages = [];

        for ($i = 0; $i <= 5; $i++) {
            $gameLanguage = GamesLanguages::where('language_id', $i)
                ->where('game_id', $id)
                ->with('language')
                ->first();

            if ($gameLanguage) {
                $gameLanguages[] = $gameLanguage;
            }
        }


        return response()->json([
            'status'=>200,
            'games_languages'=>$gameLanguages
        ]);

    }


    public function destroy ($id){

        $var = GamesLanguages::find( $id );
        $var->delete();

        return response()->json([
            'status'=>200,
            'games_languages'=>$var
        ]);
    }


    public function update(Request $request): Response
    {
        $var = GamesLanguages::findOrFail($request->id);

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
            'game_id' => 'required|max:255',
            'language_id' => 'required|max:255',
            'interface' => 'required|max:255',
            'full_audio' => 'required|max:255',
            'subtitles' => 'required|max:255',
        ]);

        $var = new GamesLanguages();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
