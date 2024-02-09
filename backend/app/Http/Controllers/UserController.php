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

    public function update(Request $request){
        $user = auth()->User();
        // Se non c'è un utente autenticato, restituisci un errore
        if (!$user) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $username = $request->input("username");
        $password = $request->input("password");
        $email = $request->input("email");
        $wallet = $request->input("wallet");
        $profile_pic = $request->input("profile_pic");
        
        
        $query = User::where('id', $user->id)->first();

        if($username) $query->update(['username' => $username]);
        if($password) $query->update(['password' => bcrypt($password)]);
        if($email) $query->update(['email' => $email]);
        if($wallet) $query->increment('wallet', $wallet);
        if($profile_pic){
            $imgCtrl = new ImagesController();
            $imgCtrl->store($profile_pic);
        } 

        if($user->hasRole('developer/publisher')){
            $pazzia = 'fr';
        }
        return response()->json([
            'status'=>200,
            'users'=>$pazzia,
        ]);

    }
}
