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
            foreach ($files as $file) {
                // Create a new image record
                $image = new Images(); // Assuming Images is your model
        
                // Store the file in the 'game_images' directory within the 'public' disk
                // Laravel will automatically generate a unique file name
                $path = $file->store('game_images', 'public');
        
                // Assign the generated path (which includes the generated file name) to your model
                $image->game_id = $request->game_id; // Ensure you validate and sanitize this!
                $image->image_path = $path;
        
                // Save the new image record to the database
                $image->save();
            }
            return response()->json([
                'status'=>200,
                'message'=>'ok',
            ]);
        } 
        
        return response()->json([
            'status'=>500,
            'messaggio'=>'riferisci a kel',
        ]);;

    }
}

