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


    public function update(Request $request)//: Response
    {
        $user = auth()->User();
        //$var = Friendships::findOrFail($request->id);

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
        if($check>1) return response()->json(['message' => 'Illegal operation'], 400);


        $senderCheck = Friendships::where('user_sender', $user_sender) //pending & already friend check
                                  ->where('user_receiver', $user_receiver)
                                  ->first();
        $receiverCheck = Friendships::where('user_sender', $user_receiver)
                                    ->where('user_receiver', $user_sender)
                                    ->first();
        if(!empty($senderCheck)) $recordId = $senderCheck->id;
            if(!empty($receiverCheck)) $recordId = $receiverCheck->id;
                $friendship = Friendships::findOrFail($recordId);





        if(!empty($choices[1]))
        {
            if($choices[1]==1) //accept
            {
                if($user->id = $senderCheck->user_receiver)
                {
                    $senderCheck->is_pending = 0;
                    return response()->json(['message' => 'You are now friend with this user'], 200);

                }
            }
            if($choices[1]==0) //decline
            {
                $friendship->delete();
                return response()->json(['message' => 'You declined the friend request'], 200);
            }
        }
        if(!empty($choices[2]))
        {
            if($choices[2]==1) //unfriend
            {
                $friendship->delete();
                return response()->json(['message' => 'You are not friend with this user anymore'], 200);
            }
            if($choices[2]==0) //call store with 2 params
            {
                //store($request);
            }
        }
        if(!empty($choices[3]))
        {
            if($choices[3]==1) //block
            {
                $senderCheck->is_blocked = 1;
                return response()->json(['message' => 'You blocked this user'], 200);
            }
            if($choices[3]==0) //unblock
            {
                $senderCheck->is_blocked = 1;
                return response()->json(['message' => 'You unblocked this user'], 200);
            }
        }












        // if ($var->update($request->all()) === false) {
        //     return response(
        //         "not real {$request->id}",
        //         Response::HTTP_BAD_REQUEST
        //     );
        // }

        return response("debug");
    }


    public function store(Request $request) {

        // Ottieni l'utente autenticato tramite JWT
        // $auth = JWTAuth::parseToken()->authenticate();    TO-FIX

        // condizioni di fallimento:
        // utente non trovato, utente già in pending, utente già amico, utente bloccato (ultime 3 check bidirezionale)

        // Se non c'è un utente autenticato, restituisci un errore
        // if (!$auth) {
        //     return response()->json(['message' => 'Non autorizzato'], 401);
        // }

        $user = auth()->User();
        $user_sender = $request->input("user_sender");
        $user_receiver = $request->input("user_receiver");
        $option = $request->input("option");

        if(!isset($option))
        {

            User::Find($user_receiver); // not found check
            if(empty($user_receiver))
            {
                return response()->json(['message' => 'User does not exist'], 500);
            }

            $senderCheck = Friendships::where('user_sender', $user_sender) //pending & already friend check
                                      ->where('user_receiver', $user_receiver)
                                      ->first();
            $receiverCheck = Friendships::where('user_sender', $user_receiver)
                                        ->where('user_receiver', $user_sender)
                                        ->first();

            if(!empty($senderCheck)) $recordIdCheck = $senderCheck->id;
                if(!empty($receiverCheck)) $recordIdCheck = $receiverCheck->id;
                    if(!empty($recordIdCheck)) $recordId = Friendships::find($recordIdCheck);
                        if(!empty($recordId)) $isPending = $recordId->is_pending;
                        if(!empty($recordId)) $isBlocked = $recordId->is_blocked;

            if(!empty($senderCheck)||!empty($receiverCheck))
            {
                if($isBlocked==1) return response()->json(['message' => 'You can\'t communicate with this user, you or this user may blocked you'], 200);
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
        else
        {
            $senderCheck = Friendships::where('user_sender', $user_sender) //pending & already friend check
                                    ->where('user_receiver', $user_receiver)
                                    ->first();
            $receiverCheck = Friendships::where('user_sender', $user_receiver)
                                        ->where('user_receiver', $user_sender)
                                        ->first();
            if(!empty($senderCheck)) $recordId = $senderCheck->id;
                if(!empty($receiverCheck)) $recordId = $receiverCheck->id;
                    $friendship = Friendships::findOrFail($recordId);


            if($option=="accept") //accept
            {
                if($user->id == $senderCheck->user_receiver)
                {
                    $senderCheck->is_pending = 0;
                    return response()->json(['message' => 'You are now friend with this user'], 200);

                }
                else
                {
                    return response()->json(['message' => 'Illegal operation'], 400);
                }
            }
            if($option=="decline") //decline
            {
                $friendship->delete();
                return response()->json(['message' => 'You declined the friend request'], 200);
            }
            if($option=="friend") //call store with 2 params
            {
                //store($request);
            }
            if($option=="unfriend") //unfriend
            {
                $friendship->delete();
                return response()->json(['message' => 'You are not friend with this user anymore'], 200);
            }
            if($option=="block") //block
            {
                $senderCheck->is_blocked = 1;
                return response()->json(['message' => 'You blocked this user'], 200);
            }
            if($option=="unblock") //unblock
            {
                $senderCheck->is_blocked = 0;
                return response()->json(['message' => 'You unblocked this user'], 200);
            }
        }
    }
}
