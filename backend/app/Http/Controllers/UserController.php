<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    
    // Elimina un determinato record della tabella User -Salvo
    /*public function destroy ($id){

        $var = User::find( $id );
        $var->delete();
        
        return response()->json([
            'status'=>200,
            'users'=>$var
        ]);
    }*/

    // Aggiorna un determinato record della tabella User -Salvo
    /*public function update(Request $request): Response
    {
        $var = User::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }*/

}
