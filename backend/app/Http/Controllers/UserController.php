<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\ImagesController;
use App\Models\Roles;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    // Mostra tutti i record della tabella User -Salvo
    public function index(){
        $var = User::get();


        return response()->json([
            'status'=>200,
            'users'=>$var
        ]);

        
    }

    // Mostra un determinato record dellla tabella User -Salvo
    public function show($id){
        $var = User::find($id);

        return response()->json([
            'status'=>200,
            'users'=>$var
        ]);

    }

    public function update(Request $request)
{
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
}
    
    
}
