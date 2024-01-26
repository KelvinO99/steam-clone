<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\GamesTags;
use App\Models\Reviews;
use App\Models\Tags;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class GamesController extends Controller
{
    public function index(Request $request)
    {
        $games_tags = GamesTags::query();
        $discount = $request->input("discount");
        $feature = $request->input("featured");
        $games = Games::query(); // Start building the query
        $tags = Tags::query();

        if (isset($discount)) {
            $games->where('is_discounted', true);
        }
        if (isset($feature)) {
             //$tags->where('name', 'Top Seller');
             $games = Tags::where('name', '=', 'Top Seller')->with(['GamesTags.Games' => function ($query)
            {
                $query->select('id', 'name', 'base_price', 'discounted_price');
            },'GamesTags.Games.Images']);
        }

    $games = $games->get()/*->pluck('')*/; // Execute the query and get the results
        //$tags = $tags->get();

        return response()->json([
            'status' => 200,
            'games' => $games,
            //'games_tags' => $games_tags
        ]);
    }

    // Mostra un determinato record dellla tabella Games -Kelvin
    public function show($id){
        $game = Games::find($id); //prendi il gioco (id)
        $reviews = Reviews::where('game_id', $id)->pluck('is_recommended'); //prendi la colonna is_recommended del singolo gioco
        $DIM_A = count($reviews); //conta quante review sono state fatte
        $positive = 0; // inizializza variabile che verrà usata subito
        for($i = 0; $i < $DIM_A-1; $i++){ 
            if($reviews[$i] == 1)         //ciclo for che conta quante review sono positive
            {                             //per fare un rapporto
                $positive++;
            }
        }
        $ratio=($positive/$DIM_A)*100; //il rapporto
        switch($ratio) {               //switch case in base alle valutazioni
            case $ratio>=0&&$ratio<=14:
                $string= 'Extremetely Negative Reviews';
                    break;
            case $ratio>=15&&$ratio<=44:
                $string= 'Negative Reviews';
                    break;
            case $ratio>=45&&$ratio<=54:
                $string= 'Mixed Reviews';
                    break;
            case $ratio>=55&&$ratio<= 84:
                $string= 'Positive Reviews';
                    break;
            case $ratio>=85&&$ratio<=100:
                $string= 'Extremetely Positive Reviews';
            default:
                $string= 'Errore riferisci a chris'; //riferisci a chris
            }

        return response()->json([
        'status' => 200,
        'game' => $game,
        'reviews' => $reviews->toArray(),
        'ratio' => $ratio,
        'string' => $string
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
                "unreal {$request->id}",
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
            'is_dlc' => 'boolean',
            'date'=> 'required|date',
            'parent_id',
            'base_price' => 'required|numeric',
            'discounted_price'=> 'nullable|numeric',
            'discounted_percentage'=> 'nullable|integer|min:0|max:100',
            'short_description'=> 'required|max:255',
            'long_description'=> 'required|max:255',
            'pegi'
        ]);
    
        $var = new Games();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
