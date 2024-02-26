<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Images;
use App\Models\Games;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;


class ImagesController extends Controller
{
     // Mostra tutti i record della tabella Images -Salvo
     public function index(){

        try{
            $image = Images::get();


            return response()->json([
                'status'=>200,
                'images'=>$image
            ]);

        }catch(\Exception $e){
            return $e;
        }
    }

    // Mostra un determinato record dellla tabella Images -Salvo
    public function show($id){

        try{
            $image = Images::find($id);

            return response()->json([
                'status'=>200,
                'images'=>$image
            ]);

        }catch(\Exception $e){
            return $e;
        }
    }

    // Elimina un determinato record della tabella Images -Salvo
    public function destroy ($id){

        try{
            $image = Images::find( $id );
            $image->delete();

            return response()->json([
                'status'=>200,
                'images'=>$image
            ]);

        }catch(\Exception $e){
            return $e;
        }
    }

    // Aggiorna un determinato record della tabella Images -Salvo
    public function update(Request $request)
    {
        $request->validate([
            'game_name' => 'string|max:255',
            'game_id' => 'integer',
            'profile_pic' => 'nullable|file|image|max:10240', // max 10MB
            'game_imgs.*' => 'nullable|file|image|max:10240', // max 10MB for each game image
        ]);
        try{
        if($request->img_id){
            $image = Images::find($request->img_id);
            if($image->game_id != $request->id) return response()->json([ 'messaggio'=>'immagine non appartiene al gioco',]);
            $game_name = preg_replace('/_+/', '_', strtolower(preg_replace('/[\s\\\/:*?"<>|\0\n\r\t\x0B]+/', '_', $request->game_name)));
            $file = $request->file('game_img');
            $oldFileName = pathinfo($image->image_path, PATHINFO_FILENAME);
            $newFileName = $oldFileName . '.' . $file->getClientOriginalExtension();
            Storage::delete('public/' . $image->image_path);
            $path = $file->storeas('game_images/'.$game_name, $newFileName, 'public');
            $image->update(['image_path'=> $path]);
        }

        if ($request->hasFile('game_imgs')){
            $files = $request->file('game_imgs');
            $game_name = preg_replace('/_+/', '_', strtolower(preg_replace('/[\s\\\/:*?"<>|\0\n\r\t\x0B]+/', '_', $request->game_name)));
            $i = Images::where('game_id', $request->game_id)->count();
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
        }
        return response($image);

        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }

    }
    // Aggiunge un record alla tabella Images -Salvo
    public function store(Request $request) {
        $request->validate([
            'game_name' => 'string|max:255',
            'game_id' => 'integer',
            'profile_pic' => 'nullable|file|image|max:10240', // max 10MB
            'game_imgs.*' => 'nullable|file|image|max:10240', // max 10MB for each game image
        ]);
        try{
            if ($request->hasFile('profile_pic')) {
                $image = new Images(); //crea record images -kel
                $file = $request->file('profile_pic');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('profile_pictures', $filename, 'public');
                $path = 'http://localhost:8000/storage/app/public/game_images/'.$filename;
                $image->image_path = $path; //salva il record -kel
                $image->save();
                return $image;
            }

            if ($request->hasFile('game_imgs')) {
                $files = $request->file('game_imgs');
                $game_name = str_replace(' ', '_',$request->game_name);
                $i = 0;
                foreach($files as $file){
                if($i == 24)return response()->json(['message'=>'image limit reached',]);

                $image = new Images(); //crea record images -kel

                $filename =$game_name.'_'.$i.'.'.$file->getClientOriginalExtension();
                $file->storeAs( 'game_images/'.$game_name, $filename, 'public');
                $path = 'http://localhost:8000/storage/app/public/game_images/'.$filename;
                $image->game_id = $request->game_id;
                $image->image_path = $path; //salva il record -kel
                $image->save();
                $i++;
                }

                return response()->json(['status'=>200,'message'=>'ok',]);
            }

            return response()->json(['status'=>500, 'messaggio'=>'errore',]);

        }catch(\Exception $e){
            Db::rollBack();
            return $e;
        }
    }
}

