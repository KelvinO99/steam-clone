<?php

namespace App\Http\Controllers;

use App\Models\SystemCharacteristics;
use App\Utilities\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class SystemCharacteristicsController extends Controller
{

     public function index(){
        $system = SystemCharacteristics::get();

        $total = $system->count();

        return Response::send_response($system, "Requisiti di sistema recuperati", null, $total, 200);
    }


    public function show($id){
        $var = SystemCharacteristics::find($id);

        return response()->json([
            'status'=>200,
            'system_characteristics'=>$var
        ]);

    }


    public function destroy ($id){

        $var = SystemCharacteristics::find( $id );
        $var->delete();

        return response()->json([
            'status'=>200,
            'system_characteristics'=>$var
        ]);
    }


    public function update(Request $request): Response
    {
        $var = SystemCharacteristics::findOrFail($request->id);

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
            'type' => 'required|max:255',
            'name' => 'required|max:255',
        ]);

        $var = new SystemCharacteristics();
        $var->fill($validatedData);

        $var->save();

        return response()->json($var, 201);

    }
}
