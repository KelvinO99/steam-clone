<?php

namespace App\Http\Controllers;

use App\Models\Friendships;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class FriendshipsController extends Controller
{

     public function index(){
        $var = Friendships::get();


        return response()->json([
            'status'=>200,
            'friendships'=>$var
        ]);


    }


    public function show($id){
        $var = Friendships::find($id);

        return response()->json([
            'status'=>200,
            'friendships'=>$var
        ]);

    }


    public function destroy ($id){

        $var = Friendships::find( $id );
        $var->delete();

        return response()->json([
            'status'=>200,
            'friendships'=>$var
        ]);
    }


    public function update(Request $request): Response
    {
        $var = Friendships::findOrFail($request->id);

        $user_sender = $request->input("user_sender");
        $user_receiver = $request->input("user_receiver");
        $choices = [
            'accept' => $request->input('accept'),
            'unfriend' => $request->input('unfriend'),
            'block' => $request->input('block'),
        ];

        $check = 0; //no more than 1 choice check
        foreach ($choices as $choice) {
            if(!empty($choice)) $check++;
        }
        if($check>1) return response()->json(['message' => 'Illegal query'], 400);


        $record = Friendships::where('user_sender', $user_sender) //pending & already friend check
                                  ->where('user_receiver', $user_receiver)
                                  ->first();


        if(!empty($choices[1]))
            if($choices[1]==1)
            {
                if(/*<id dello user loggato>*/ == $record->user_receiver)
                {
                    $record->is_pending = 0;
                    return response()->json(['message' => 'You are now friend with this user'], 200);

                }
            }













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
        // $auth = JWTAuth::parseToken()->authenticate();    TO-FIX

        // condizioni di fallimento:
        // utente non trovato, utente già in pending, utente già amico, utente bloccato (ultime 3 check bidirezionale)


        $user_sender = $request->input("user_sender");
        $user_receiver = $request->input("user_receiver");
        //echo("user_sender".$user_sender);
        //echo("user_receiver".$user_receiver);


        // Se non c'è un utente autenticato, restituisci un errore
        // if (!$auth) {
        //     return response()->json(['message' => 'Non autorizzato'], 401);
        // }

        User::Find($user_receiver); // not found check
        if(empty($user_receiver))
        {
            return response()->json(['message' => 'User does not exist'], 500);
        }

        $senderCheck = Friendships::where('user_sender', $user_sender) //pending & already friend check
                                  ->where('user_receiver', $user_receiver)
                                  ->first();
        $receiverCheck = Friendships::where('user_receiver', $user_receiver)
                                    ->where('user_sender', $user_sender)
                                    ->first();

        if(!empty($senderCheck)) $recordIdCheck = $senderCheck->id;
            if(!empty($receiverCheck)) $recordIdCheck = $receiverCheck->id;
                //if(!empty($recordIdCheck)) echo($recordIdCheck); //debug
                    if(!empty($recordIdCheck)) $recordId = Friendships::find($recordIdCheck);
                        if(!empty($recordId)) $isPending = $recordId->is_pending;

        if(!empty($senderCheck)||!empty($receiverCheck))
        {
            if($isPending==1) return response()->json(['message' => 'Friendship request is pending'], 200);
            else              return response()->json(['message' => 'You\'re already friend with this user'], 200);
        }

        $validatedData = $request->validate([
            'user_sender' => 'required|max:255',
            'user_receiver' => 'required|max:255',
            //'is_pending' => 'required|boolean|max:255',
            //'is_blocked' => 'required|boolean|max:255',
        ]);

        $var = new Friendships();
        $var->fill($validatedData);
        $var->is_pending = $request->input('is_pending', 1);
        $var->is_blocked = $request->input('is_blocked', 0);

        $var->save();

        return response()->json($var, 201);

    }
}
