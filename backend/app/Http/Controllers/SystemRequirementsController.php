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

        $systems = SystemRequirements::join('system_characteristics as platform', 'system_requirements.platform_id', '=', 'platform.id')
        ->join('system_characteristics as os', 'system_requirements.os_id', '=', 'os.id')
        ->join('system_characteristics as cpu', 'system_requirements.cpu_id', '=', 'cpu.id')
        ->join('system_characteristics as ram', 'system_requirements.ram_id', '=', 'ram.id')
        ->join('system_characteristics as gpu', 'system_requirements.gpu_id', '=', 'gpu.id')
        ->join('system_characteristics as directx', 'system_requirements.directx_id', '=', 'directx.id')
        ->join('system_characteristics as network', 'system_requirements.network_id', '=', 'network.id')
        ->join('system_characteristics as storage', 'system_requirements.storage_id', '=', 'storage.id')
        ->join('system_characteristics as audio', 'system_requirements.audio_id', '=', 'audio.id')
        ->select(
            'system_requirements.*',
            'platform.name as platform_name',
            'os.name as os_name',
            'cpu.name as cpu_name',
            'ram.name as ram_name',
            'gpu.name as gpu_name',
            'directx.name as directx_name',
            'network.name as network_name',
            'storage.name as storage_name',
            'audio.name as audio_name'
        )->where('game_id', $id)->get();

        $windows = $systems->where('platform_id', 1);

        $macOS = $systems->where('platform_id', 2);

        $linux = $systems->where('platform_id', 3);

        $obj['Windows'] = $windows->values();
        $obj['MacOS'] = $macOS->values();
        $obj['Linux + SteamOS'] = $linux->values();

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
