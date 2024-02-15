<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Http\Controllers;

use App\Models\Developers;
use App\Models\Games;
use App\Models\GamesTags;
use App\Models\Reviews;
use App\Models\Tags;
use App\Http\Controllers\ImagesController;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class GamesController extends Controller
{
    public function index(Request $request)
    {
        $discount = $request->input("discount");
        $featured = $request->input("featured");
        $special_offer = $request->input("special_offer");

        $skip = $request->input("skip", 0); //skip
                                            //and   (function)
        $take = $request->input("take", 1); //take

        $game = Games::query(); // Start building the query
        

//ISSET CODE
        if ($discount) {
            $game->where('is_discounted', true);
        }

        if ($featured) {
              $game->select('games.id', 'games.name', 'games.base_price', 'games.discounted_price')
                                    ->join('games_tags', 'games.id', '=', 'games_tags.game_id')
                                    ->join('tags', 'games_tags.tag_id', '=', 'tags.id')
                                    ->where('tags.name', 'Top Seller')
                                    ->with('images');
        }

        if ($special_offer) {
           $game->where('discounted_percentage','>', '60');
        }
//ISSET CODE

        $game->skip($skip)->take($take)->get();//skip and take (function)

        return response()->json([
            'status' => 200,
            'games' => $game->get(),
        ]);
    }

    // Mostra un determinato record dellla tabella Games -Kelvin
    public function show($id){


//DEVELOPERS FUNCTION
        $game = Games::where('id', $id)->with(['DevelopersGames.Developers' => function ($q){
            $q->select('id','user_id', 'is_publisher')->with(['User' => function ($q2){
                $q2->select('id', 'username');
        }]);
    }])->first(); 



    // $devPublish = $game->DevelopersGames->pluck('Developers.is_publisher');
    // $devName = $game->DevelopersGames->pluck('Developers.User.username');
    // for ($i = 0; $i < count($devPublish); $i++) {
    // $dev['isPublisher'] = $devPublish;}
    //  $dev['username'] = $devName;


    //return $game;
//DEVELOPERS FUNCTION    


//TAGS FUNCTION
        $tag = Games::where('id', $id)->with(['GamesTags.Tags' => function ($q) {
            $q->select('id', 'name', 'is_genre');
        }])->first()->GamesTags->pluck('Tags');
//TAGS FUNCTION


//REVIEWS FUNCTION 
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
            case $ratio>=0&&$ratio<=19:
                $string= 'Overwhelmingly Negative Reviews';
                    break;
            case $ratio>=20&&$ratio<=39:
                $string= 'Mostly Negative Reviews';
                    break;
            case $ratio>=40&&$ratio<=69:
                $string= 'Mixed Reviews';
                    break;                                  //tutto questo non è simmetrico!!
            case $ratio>=70&&$ratio<=79:
                $string= 'Mostly Positive Reviews';
                    break;
            case $ratio>=80&&$ratio<=94:
                $string= 'Very Positive Reviews';
                    break;
            case $ratio>=95&&$ratio<=100:
                $string= 'Overwhelmingly Positive Reviews'; 
            default:
                $string= 'Error'; //riferisci a chris
            }

        //$skip = $users_reviews->input("skip", 0); //skip
                                                  //and   (function)
        //$take = $users_reviews->input("take", 1); //take

        //PER IL FUTURO CHE LEGGO STO CODICE SENZA CAPIRE:
        //c'è bisogno di users_reviews perché è una roba apparte che ha il compito
        //di filtrare tutto per lo scopo di visualizzare utenti e review che fanno
        //invece review solo per contare se è recommended. è tutto ok!!
//REVIEWS FUNCTION        



//DEPRECATED DEVELOPERS FUNCTION  
    //     $developer = Developers::select('developers.*', 'users.username as user_name')
    // ->join('developers_games', 'developers.id', '=', 'developers_games.developer_id')
    // ->join('games', 'games.id', '=', 'developers_games.game_id')
    // ->join('users', 'users.id', '=', 'developers.user_id') // Join with the users table
    // ->where('developers_games.game_id', '=', $id)
    // ->get();

    // $dev = Developers::with('DevelopersGames.Games')->with('User')->get();
//DEPRECATED DEVELOPERS FUNCTION


        return response()->json([
        'status' => 200,
        'game' => $game, //game+dev info output
        'tags' => $tag,
        'ratio' => $ratio,
        'evaluation' => $string,
        //'reviews' => $reviews->toArray(),
        // 'developer' => $dev,
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
    public function update(Request $request)
    {
        $user = auth()->User();

        if (!$user) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        if(!$user->hasRole('developer/publisher')){
            return response()->json(['message' => 'Non autorizzato, non sei un dev'], 401);
        }

        $name = $request->input('name');
        $is_dlc = $request->input('is_dlc');
        $date = $request->input('date');
        $parent_id = $request->input('parent_id');
        $base_price = $request->input('base_price');
        $discounted_price = $request->input('discounted_price');
        $discounted_percentage = $request->input('discounted_percentage');
        $short_description = $request->input('short_description');
        $long_description = $request->input('long_description');
        $pegi_id = $request->input('pegi_id');

        $game = Games::findOrFail($request->id);

        if ($game->update($request->all()) === false) {
            return response(
                "unreal {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        if($name) $game->update(['name' => $name]);
        if($is_dlc) {
            $game->update(['is_dlc'=> $is_dlc]);
            if($is_dlc) {
                $game->update(['parent_id'=> $parent_id]);
            }
        }
        if($date) $game->update(['date'=> $date]);
        if($base_price) $game->update(['base_price'=> $base_price]);
        if($discounted_price) $game->update(['discounted_price'=> $discounted_price]);
        if($discounted_percentage) $game->update(['discounted_percentage'=> $discounted_percentage]);
        if($short_description) $game->update(['short_description'=> $short_description]);
        if($long_description) $game->update(['long_description'=> $long_description]);
        if($pegi_id) $game->update(['pegi_id'=> $pegi_id]);
        
        return response()->json($game, 201);
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
            'is_dlc' => 'boolean|required',
            'date'=> 'required|date',
            'parent_id'=> 'required',
            'base_price' => 'required|numeric',
            'discounted_price'=> 'nullable|numeric',
            'discounted_percentage'=> 'nullable|integer|min:0|max:100',
            'short_description'=> 'required|max:255',
            'long_description'=> 'required|max:255',
            'pegi_id' => 'required',
        ]);
        

        $var = new Games();
        $var->fill($validatedData);
        
        $var->save();

        return response()->json($var, 201);

    }
}
