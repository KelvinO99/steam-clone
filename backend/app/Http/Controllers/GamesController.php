<?php
//NON ELIMINARE
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Http\Controllers;

use App\Models\Developers;
use App\Models\DevelopersGames;
use App\Models\Games;
use App\Models\Libraries;
use App\Models\Tags;
use App\Models\User;
use App\Models\Images;
use App\Models\Reviews;
use App\Http\Controllers\ImagesController;
use App\Models\SystemRequirements;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GamesController extends Controller
{
    public function index(Request $request)
    {

        try {
            $discount = $request->input("discount"); // GIOCHI CON SCONTO
            $featured = $request->input("featured"); // GIOCHI TOP SELLER
            $tag = $request->input("tag, []");  //FILTRA IN BASE AL TAG RICHIESTO
            $special_offer = $request->input("special_offer"); // GIOCHI CON SCONTO SUPERIORE AL 50%
            $most_reviewed = $request->input("most_reviewed"); // CALCOLO TRA NUMERO RECENSIONI E DATA DI USCITA
            $best_seller = $request->input("best_seller"); // CALCOLO SUL NUMERO DI COPIE ACQUISTATE
            $upcoming = $request->input("upcoming"); // CALCOLO SUL NUMERO DI COPIE ACQUISTATE
            $new_release = $request->input("new_release"); // ORDINE GIOCHI RILASCIATI PRIMA
            $skip = $request->input("skip");
            $take = $request->input("take");
            $today = Carbon::now();

            $game = Games::with('GamesTags.Tags')

                ->with('images');

            $total = $game->count();



            if (!empty($tag)) {
                foreach ($tag as $t) {
                    $game->whereHas('GamesTags.Tags', function ($q) use ($t) {
                        $q->where('name', $t);
                        Log::info($t);
                    });
                }
            }

    //ISSET CODE
            if ($discount) {
                $game->where('is_discounted', 1);
            }

            if ($most_reviewed) {
                $game->whereHas('Reviews')
                    ->withCount('Reviews')
                    ->orderBy('Reviews_count', 'desc')
                    ->orderBy('date', 'desc');
            }

            if ($best_seller) {
                $game->whereHas('Libraries')
                    ->withCount('Libraries')
                    ->orderBy('Libraries_count', 'desc');
            }

            if ($featured) {
                $game->select('games.id', 'games.name', 'games.base_price', 'games.discounted_price')
                    ->join('games_tags', 'games.id', '=', 'games_tags.game_id')
                    ->join('tags', 'games_tags.tag_id', '=', 'tags.id')
                    ->where('tags.name', 'Top Seller');
            }

            if ($special_offer) {
                $game->where('discounted_percentage', '>', '50');
            }

            if ($upcoming) {
                $game->where('date', '>', $today);
            }
            if ($new_release) {
                $game->whereDate('date', '>=', now()->subMonths(3));
                $game->orderBy('date', 'desc');
            }


            if($tag){
                foreach ($tag as $t) {
                    $game->whereHas('GamesTags.Tags', function ($q) use($t){
                        $q->where('name', $t);
                    });
                }
            }

    //ISSET CODE
    //REVIEW CODE

            for($i=1;$i<=$total;$i++)
            {
                $no_reviews = Reviews::where('game_id', $i)->pluck('is_recommended'); //prendi la colonna is_recommended del singolo gioco

                $cond = count($no_reviews); //conta quante review sono state fatte
                if($cond == 0)
                {
                    $positive = 0;
                    $negative = 0;
                    $ratio = 0;
                    $string = 'Error';
                    $reviews = 'No Reviews';

                }
                else
                {

                    $positive = 0;
                                        // inizializza variabile che verrà usata subito
                    $negative = 0;
                    for($i = 0; $i < $cond-1; $i++){
                        if($no_reviews[$i] == 1)         //ciclo for che conta quante review sono positive
                        {                             //per fare un rapporto
                            $positive++;
                        }
                        else
                        {
                            $negative++;
                        }
                    }
                    $ratio=floor(($positive/$cond)*100); //il rapporto
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
                            $string= 'Error'; //riferisci a chri
                        }

                    $reviews = Reviews::where('game_id', $i)
                                        ->with(['User'=>  function ($q){
                                            $q->select('id', 'username');
                                        }])
                                        ->get();
                }
            }
            $game_evaluation = $game->get();
            $game_evaluation->map(function ($game_evaluation) use ($string) {
                $game_evaluation-> evaluation = $string;
               return $game_evaluation;
            });


    //REVIEW CODE
            if (isset($skip)) {
                $game = $game->skip($skip);
            }

            if (isset($take)) {
                $game = $game->take($take);
            }

            return response()->json([
                'status' => 200,
                'total' => $total,
                'count' => $game->get()->count(), //non toccare che non funziona + nulla
                //'games' => $game->get(),          //anche qst
                'games' => $game_evaluation,
            ]);
        } catch (\Exception $e) {
            return $e;
        }
    }

    // Mostra un determinato record dellla tabella Games -Kelvin
    public function show($id){

        try{
    //DEVELOPERS FUNCTION
            $game = Games::where('id', $id)->with('Achievements.Images')->with(['DevelopersGames.Developers' => function ($q2){
                $q2->select('id','user_id', 'is_publisher')->with(['User' => function ($q3){
                    $q3->select('id', 'username');
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
            $no_reviews = Reviews::where('game_id', $id)->pluck('is_recommended'); //prendi la colonna is_recommended del singolo gioco

            $cond = count($no_reviews); //conta quante review sono state fatte
            if($cond == 0)
            {
                $positive = 0;
                $negative = 0;
                $ratio = 0;
                $string = 'Error';
                $reviews = 'No Reviews';

            }
            else
            {

                $positive = 0;
                                    // inizializza variabile che verrà usata subito
                $negative = 0;
                for($i = 0; $i < $cond-1; $i++){
                    if($no_reviews[$i] == 1)         //ciclo for che conta quante review sono positive
                    {                             //per fare un rapporto
                        $positive++;
                    }
                    else
                    {
                        $negative++;
                    }
                }
                $ratio=floor(($positive/$cond)*100); //il rapporto
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
                        $string= 'Error'; //riferisci a chri
                    }

                $reviews = Reviews::where('game_id', $id)
                                    ->with(['User'=>  function ($q){
                                        $q->select('id', 'username');
                                    }])
                                    ->get();
            }

    //REVIEWS FUNCTION
            $images = Images::where('game_id', $id)->pluck('image_path');

            $is_dlc = $game->is_dlc;

            $dlc = Games::where('parent_id', $id)
            ->select('id', 'name', 'date', 'base_price', 'is_discounted', 'discounted_price', 'discounted_percentage', 'short_description')
            ->with(['images' => function ($q) {
                $q->select('id', 'game_id', 'image_path')->first();
            }])
            ->get();

            $no_users_ownership = Libraries::where('game_id', $id)
                              ->where('is_owned', true)
                              ->count();

            $pegi_img =images::where('image_path', 'http://localhost:8000/storage/pegi_images/pegi_'.$game->pegi_id.'.jpg')->first();

    //SYSTEM_REQUIREMENTS FUNCTION

            $systems = SystemRequirements::join('system_characteristics as platform', 'system_requirements.platform_id', '=', 'platform.id')
            ->join('system_characteristics as os', 'system_requirements.os_id', '=', 'os.id')
            ->join('system_characteristics as cpu', 'system_requirements.cpu_id', '=', 'cpu.id')
            ->join('system_characteristics as ram', 'system_requirements.ram_id', '=', 'ram.id')
            ->join('system_characteristics as gpu', 'system_requirements.gpu_id', '=', 'gpu.id')
            ->join('system_characteristics as directx', 'system_requirements.directx_id', '=', 'directx.id')
            ->join('system_characteristics as network', 'system_requirements.network_id', '=', 'network.id')
            ->join('system_characteristics as storage', 'system_requirements.storage_id', '=', 'storage.id')
            ->join('system_characteristics as audio', 'system_requirements.audio_id', '=', 'audio.id')
            ->select(
                'system_requirements.*',
                'platform.name as platform_name',
                'os.name as os_name',
                'cpu.name as cpu_name',
                'ram.name as ram_name',
                'gpu.name as gpu_name',
                'directx.name as directx_name',
                'network.name as network_name',
                'storage.name as storage_name',
                'audio.name as audio_name'
            )->where('game_id', $id)->get();

            $windows = $systems->where('platform_id', 1);

            $macOS = $systems->where('platform_id', 2);

            $linux = $systems->where('platform_id', 3);

            $obj['Windows'] = $windows->values();
            $obj['MacOS'] = $macOS->values();
            $obj['Linux + SteamOS'] = $linux->values();

    //SYSTEM_REQUIREMENTS FUNCTION
            return response()->json([
            'status' => 200,
            'game' => $game, //game+dev info output
            'images' => $images,
            'tags' => $tag,
            'positive' => $positive,
            'negative' => $negative,
            'ratio' => $ratio,
            'evaluation' => $string,
            'reviews' => $reviews,
            'dlc' => $dlc,
            'no_users_ownership' => $no_users_ownership,
            'pegi_img'=>$pegi_img,
            'no_users_ownership' => $no_users_ownership,
            'is_dlc' => $is_dlc,
            'dlc' => $dlc,
            'reviews' => $reviews,
            ]);

        }catch(\Exception $e){
            return $e;
        }
    }



    // Elimina un determinato record della tabella Games -Kelvin
    public function destroy ($id){

        try{
            $var = Games::find( $id );
            $var->delete();

            return response()->json([
                'status'=>200,
                'games'=>$var
            ]);

        }catch(\Exception $e){
            return $e;
        }


    }

    // Aggiorna un determinato record della tabella Games -Kelvin
    public function update(Request $request)
    {

        try{
            $user = auth()->User();

            if (!$user) {
                return response()->json(['message' => 'Non autorizzato'], 401);
            }

            if(!$user->hasRoles('developer/publisher', 'superadmin')){
                return response()->json(['message' => 'Non autorizzato, non sei un dev'], 401);
            }

            $imagesController = new ImagesController();
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
            $img_id = $request->input('img_id');

            $game = Games::findOrFail($request->id);

            if ($game->update($request->all()) === false) {
                return response(
                    "unreal {$request->id}",
                    Response::HTTP_BAD_REQUEST
                );
            }

            // Controlla che il gioco non abbia lo stesso nome di un'altro - Salvo
            /*if (Games::where('name', $name)->exists()) {
                return response()->json(['message' => 'Un gioco con lo stesso nome esiste già'], 409);
            }*/

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
            if ($img_id || $request->hasFile('game_imgs')){
                $request->game_id = $request->id;
                $request->game_name = $game->name;
                $imagesController->update($request);
            }

            return response()->json($game, 201);

        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }


    }

    // Aggiunge un record alla tabella Games -Kelvin
    public function store(Request $request) {

        try{
            // Ottieni l'utente autenticato tramite JWT
            $user = auth()->User();

            // Se non c'è un utente autenticato, restituisci un errore
            if (!$user) {
                return response()->json(['message' => 'Non autorizzato'], 401);
            }

            if(!$user->hasRole('developer/publisher')){
                return response()->json(['message' => 'Non autorizzato, non sei un dev'], 401);
            }

            $validatedData = $request->validate([
                'name' => 'required|string|max:100',
                'date'=> 'required|date',
                'is_dlc' => 'required|boolean',
                'parent_id'=> 'integer|nullable',
                'base_price' => 'required|numeric',
                'discounted_price'=> 'nullable|numeric',
                'discounted_percentage'=> 'nullable|integer|min:0|max:100',
                'short_description'=> 'required|string|max:1024',
                'long_description'=> 'required|string|max:8192',
                'pegi_id' => 'required',
            ]);


            // Controlla che il gioco non abbia lo stesso nome di un'altro - Salvo
            if (Games::where('name', $validatedData['name'])->exists()) {
                return response()->json(['message' => 'Un gioco con lo stesso nome esiste già'], 409);
            }

            $game = new Games();
            $game->fill($validatedData);
            $game->save();
            if ($request->hasFile('game_imgs')) {
                $request->game_id = $game->id;
                $request->game_name = $game->name;
                $imagesController = new ImagesController();
                $imagesController->store($request);

            }


            return response()->json($game, 201);;

        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }
    }
}
