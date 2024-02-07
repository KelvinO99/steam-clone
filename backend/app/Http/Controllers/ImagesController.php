<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ImagesController extends Controller
{
     // Mostra tutti i record della tabella Images -Salvo
     public function index(){
        $var = Images::get();


        return response()->json([
            'status'=>200,
            'images'=>$var
        ]);

        
    }

    // Mostra un determinato record dellla tabella Images -Salvo
    public function show($id){
        $var = Images::find($id);

        return response()->json([
            'status'=>200,
            'images'=>$var
        ]);

    }
    
    // Elimina un determinato record della tabella Images -Salvo
    public function destroy ($id){

        $var = Images::find( $id );
        $var->delete();
        
        return response()->json([
            'status'=>200,
            'images'=>$var
        ]);
    }

    // Aggiorna un determinato record della tabella Images -Salvo
    public function update(Request $request): Response
    {
        $var = Images::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }

    // Aggiunge un record alla tabella Images -Salvo
    public function store(Request $request) {

        $userImg = $request->input("user");
        $achievementImg = $request->input("achievement");
        $gameImg = $request->input("game");

        // Ottieni l'utente autenticato tramite JWT
        $user = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$user) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $request->validate([
            'image' => 'required|image|max:4096', //fa caricare l'immagine allo user -kel
        ]);
        
        $path = $request->file('image')->store('images', 'public'); //salva l'immagine e la fa diventare un path salvabile -kel
        $image = new Images(); //crea record images -kel
        $image->image_path = $path; //salva il record -kel

        $image->save();

        

        return response()->json($image, 201);

    }
}

