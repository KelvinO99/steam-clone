<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\ImagesController;
use App\Models\Friendships;
use App\Models\Images;
use App\Models\Libraries;
use App\Models\Reviews;
use App\Models\Roles;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Mostra tutti i record della tabella User -Salvo
    public function index(){

        try{
            $var = User::get();


            return response()->json([
                'status'=>200,
                'users'=>$var
            ]);

        }catch(\Exception $e){
            return $e;
        }
    }

    // Mostra un determinato record dellla tabella User -Salvo
    public function show($id){

        try{
            $user = User::find($id);

            $images = Images::where('user_id', $id)
                            ->get();

            $library_count = Libraries::where('user_id', $id)
                                        ->count();

            $library = Libraries::where('libraries.user_id', $id)
            ->join('games', 'libraries.game_id', '=', 'games.id')
            ->leftJoin('images', 'games.id', '=', 'images.game_id')
            ->select('libraries.time_played', 'games.name', 'images.*')
            ->distinct('games.id')
            ->get();

            $library_most_played_games = Libraries::where('libraries.user_id', $id)
            ->join('games', 'libraries.game_id', '=', 'games.id')
            ->leftJoin('images', 'games.id', '=', 'images.game_id')
            ->select('libraries.time_played', 'games.name', 'images.*')
            ->distinct('games.id')
            ->orderBy('libraries.time_played', 'desc')
            ->take(5)
            ->get();

            $reviews_count = Reviews::where('user_id', $id)
                                     ->count();

            $senderCheck = Friendships::where('user_sender', $id)
            ->join('users', 'friendships.user_sender', '=', 'users.id')
            ->join('images', 'users.id', '=', 'images.user_id')
            ->select('users.id', 'users.username', 'users.level', 'images.image_path')
            ->get();


            $receiverCheck = Friendships::where('user_receiver', $id)
            ->join('users', 'friendships.user_receiver', '=', 'users.id')
            ->join('images', 'users.id', '=', 'images.user_id')
            ->select('users.id', 'users.username', 'users.level', 'images.image_path')
            ->get();

            $friendships = $senderCheck->union($receiverCheck);




            return response()->json([
                'status' => 200,
                'user' => $user,
                'images' => $images,
                'library_count' => $library_count,
                'library' => $library,
                'most_played_games' => $library_most_played_games,
                'reviews_count' => $reviews_count,
                'friendships_count' => $friendships->count(),
                'friendships' => $friendships,
            ]);

        }catch(\Exception $e){
            return $e;
        }


    }

    public function update(Request $request)
{
    try{
        $user = auth()->user();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$user) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $username = $request->input("username");
        $password = $request->input("password");
        $email = $request->input("email");
        $wallet = $request->input("wallet");

        $query = User::where('id', $user->id)->first();

        if ($username) $query->update(['username' => $username]);
        if ($password) $query->update(['password' => bcrypt($password)]);
        if ($email) $query->update(['email' => $email]);
        if ($wallet) $query->increment('wallet', $wallet);

    /* if ($request->hasFile('profile_pic')) {

        $file = app(ImagesController::class)->store($request);
        $query->update(['img_id' => $file]);

            // Genera un nome unico per l'immagine
            $imageName = uniqid('profile_pic_') . '.' . $profile_pic->getClientOriginalExtension();

            // Salva l'immagine nello storage nella directory desiderata
            $profile_pic->storeAs('public/profile_pics', $imageName);

            // Aggiorna il campo img_id nel database con il nome dell'immagine

        }*/
        if ($request->hasFile('profile_pic')) {
            // Here you would pass the part of the request that contains the image to the ImagesController
            $imagesController = new \App\Http\Controllers\ImagesController();
            $image = $imagesController->store($request);
            $query->update(['image_id' => $image->id]) ;
            $query->save();
        }

        return response()->json(['message' => 'Profilo aggiornato con successo',
        'users'=>$user,]);
    }catch(\Exception $e){
        DB::rollBack();
        return $e;
    }

}


}
