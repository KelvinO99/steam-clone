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
        
        $query = User::where('id', $user->id)->first();

        if($username) $query->update(['username' => $username]);
        if($password) $query->update(['password' => bcrypt($password)]);
        if($email) $query->update(['email' => $email]);
        if($wallet) $query->increment('wallet', $wallet);
        if ($request->hasFile('profile_pic')) {
            // Validate the file
            $request->validate([
                'profile_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            // Retrieve the profile picture file from the request
            $profilePicFile = $request->file('profile_pic');
            
            // Instantiate the ImagesController and upload the file
            $imgCtrl = new ImagesController();
            $img_id = $imgCtrl->store($profilePicFile);
            
            // Add the image id to the updates
            if($img_id) {
                $updates['img_id'] = $img_id;
            }

        if($user->hasRole('developer/publisher')){
            $pazzia = 'fr';
        }
        return response()->json([
            'status'=>200,
            'users'=>$query,
        ]);

    }
    
    
}
