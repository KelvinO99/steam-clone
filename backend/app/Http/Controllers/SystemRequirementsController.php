<?php

namespace App\Http\Controllers;

use App\Models\SystemRequirements;
use App\Utilities\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class SystemRequirementsController extends Controller
{

     public function index(){
        $var = SystemRequirements::get();


        return response()->json([
            'status'=>200,
            'system_requirements'=>$var
        ]);


    }


    public function show($id){
        $list = collect();
        $systems = SystemRequirements::where('game_id', $id)->get();
        //$systems = SystemRequirements::with('platform')->where('game_id', $id)->get();

        $windows = $systems->where('platform_id', 1);

        $macOS = $systems->where('platform_id', 2);

        $linux = $systems->where('platform_id', 3);

        $obj['windows'] = $windows->values();
        $obj['macOS'] = $macOS->values();
        $obj['linux'] = $linux->values();

        // $systems->windows = $windows ;

        // $data = $systems->map(function ($system) {
        //     return [
        //         'platform' => [
        //             'id' => $system->platform_id,
        //         ],
        //         'rank' => $system->rank,
        //         'os_id' => $system->os_id,
        //         'cpu_id' => $system->cpu_id,
        //         'ram_id' => $system->ram_id,
        //         'gpu_id' => $system->gpu_id,
        //         'directx_id' => $system->directx_id,
        //         'network_id' => $system->network_id,
        //         'storage_id' => $system->storage_id,
        //         'audio_id' => $system->audio_id,
        //         'notes_id' => $system->notes_id,
        //         'created_at' => $system->created_at,
        //         'updated_at' => $system->updated_at
        //         ];
        //     });



        return Response::send_response($obj, "Requisiti di sistema recuperati", null, 200);


    }


    public function destroy ($id){

        $var = SystemRequirements::find( $id );
        $var->delete();

        return response()->json([
            'status'=>200,
            'system_requirements'=>$var
        ]);
    }


    public function update(Request $request): Response
    {
        $var = SystemRequirements::findOrFail($request->id);

        if ($var->update($request->all()) === false) {
            return response(
                "not real {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($var);
    }


    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        $var = JWTAuth::parseToken()->authenticate();

        // Se non c'è un utente autenticato, restituisci un errore
        if (!$var) {
            return response()->json(['message' => 'Non autorizzato'], 401);
        }

        $validatedData = $request->validate([
            'PLACEHOLDERCOLUMN' => 'required|max:255',
            'PLACEHOLDERCOLUMN' => 'required|max:255',
        ]);

        $var = new SystemRequirements();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
