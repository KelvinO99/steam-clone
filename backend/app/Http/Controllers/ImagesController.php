<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Models\Images;
use App\Models\Games;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\UploadedFile;

class ImagesController extends Controller
{
     // Mostra tutti i record della tabella Images -Salvo
     public function index(){
        $image = Images::get();


        return response()->json([
            'status'=>200,
            'images'=>$image
        ]);


    }

    // Mostra un determinato record dellla tabella Images -Salvo
    public function show($id){
        $image = Images::find($id);

        return response()->json([
            'status'=>200,
            'images'=>$image
        ]);

    }

    // Elimina un determinato record della tabella Images -Salvo
    public function destroy ($id){

        $image = Images::find( $id );
        $image->delete();

        return response()->json([
            'status'=>200,
            'images'=>$image
        ]);
    }

    // Aggiorna un determinato record della tabella Images -Salvo
    public function update(Request $request): Response
    {
       if($request->img_id){
        $image = Images::findOrFail($request->img_id);
        $file = $request->file('game_img');
        $file->storeas();
       }

       if ($request->hasFile('game_imgs')){

        $files = $request->file('game_imgs');
        $game_name = $request->game_name;
        $query = Images::query();
        
        $i = $query->where(game_id == $request->id)->count();
        
        foreach($files as $file){
         if($i == 24)return response()->json(['message'=>'image limit reached',]);
         $image = new Images(); //crea record images -kel
         $filename =$game_name.'_'.$i.'.'.$file->getClientOriginalExtension();
         $path = $file->storeAs( 'game_images/'.$game_name, $filename, 'public');
         $image->game_id = $request->game_id;
         $image->image_path = $path; //salva il record -kel
         $image->save();
         $i++;
        }

        return response($image);
    }

    // Aggiunge un record alla tabella Images -Salvo
    public function store(Request $request) {


        if ($request->hasFile('profile_pic')) {
            $image = new Images(); //crea record images -kel
            $file = $request->file('profile_pic');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('profile_pictures', $filename, 'public');
            $image->image_path = $path; //salva il record -kel
            $image->save();
            return $image;
        }

        if ($request->hasFile('game_imgs')) {
            $files = $request->file('game_imgs');
            $game_name = $request->game_name;
            $i = 0;
            foreach($files as $file){
             if($i == 24)return response()->json(['message'=>'image limit reached',]);

             $image = new Images(); //crea record images -kel
             $filename =$game_name.'_'.$i.'.'.$file->getClientOriginalExtension();
             $path = $file->storeAs( 'game_images/'.$game_name, $filename, 'public');
             $image->game_id = $request->game_id;
             $image->image_path = $path; //salva il record -kel
             $image->save();
             $i++;
            }

            return response()->json(['status'=>200,'message'=>'ok',]);
        }

        return response()->json(['status'=>500, 'messaggio'=>'riferisci a kel',]);

    }
}

