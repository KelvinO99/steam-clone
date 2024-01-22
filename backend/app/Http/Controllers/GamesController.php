<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\GamesTags;
use App\Models\Tags;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class GamesController extends Controller
{
     // Mostra tutti i record della tabella Games -Kelvin
     public function index(){
        $var = Games::get();


        return response()->json([
            'status'=>200,
            'games'=>$var
        ]);

        
    }

    // Mostra un determinato record dellla tabella Games -Kelvin
    public function show($id){
        $var = Games::find($id);

        return response()->json([
            'status'=>200,
            'games'=>$var
        ]);

    }
    
    // Elimina un determinato record della tabella Games -Kelvin
    public function destroy ($id){

        $var = Games::find( $id );
        $var->delete();
        
        return response()->json([
            'status'=>200,
            'games'=>$var
        ]);
    }

    // Aggiorna un determinato record della tabella Games -Kelvin
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

    // Aggiunge un record alla tabella Games -Kelvin
    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = auth()->User();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'developer_id',
            'is_dlc',
            'parent_id',
            'name',
           'base_price',
           'discounted_price',
            'discounted_percentage',
            'short_description',
            'long_description',
            'pegi'
        ]);
    
        $var = new Games();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }

    public function featured(Request $request){
        //Featured query
        $games = Tags::where('name', '=', 'Top Seller')
        ->with(['GamesTags.Games' => function ($query) {
            $query->select('id', 'name', 'base_price', 'discounted_price');
        }, 'GamesTags.Games.Images'])
        ->get();
    
        

        return response()->json([
            'status'=>200,
            'games'=>$games
        ]);
    }
}
