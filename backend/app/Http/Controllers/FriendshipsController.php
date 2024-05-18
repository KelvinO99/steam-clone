<?php

namespace App\Http\Controllers;

use App\Models\Friendships;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $user = auth()->user();
        $userId = $user->id;

        $senderCheck = Friendships::where('user_sender', $userId) //pending & already friend check
                                      ->where('user_receiver', $id)
                                      ->first();
        $receiverCheck = Friendships::where('user_sender', $id)
        ->where('user_receiver', $userId)
        ->first();

        if(!empty($senderCheck)) $recordIdCheck = $senderCheck->id;
                if(!empty($receiverCheck)) $recordIdCheck = $receiverCheck->id;
                    if(!empty($recordIdCheck)) $recordId = Friendships::find($recordIdCheck);
                        if(!empty($recordId)) $isPending = $recordId->is_pending;
                        if(!empty($recordId)) $userBlockedId = $recordId->user_blocked_id;
                            $friendship = Friendships::findOrFail($recordId);


        if(!empty($userBlockedId))
        {
            if($userBlockedId == $userId)
            {
                return response()->json(['message' => 'This user has blocked you'], 200);
            }
            if($userBlockedId != $id)
            {
                return response()->json(['message' => 'You blocked this user'], 200);
            }
        }
        if(!empty($isPending))
        {
            if($isPending == 1 && $friendship->user_sender == $userId)
            {
                return response()->json(['message' => 'Friend request sent'], 200);
            }
            if($isPending == 1 && $friendship->user_sender == $id)
            {
                return response()->json(['message' => 'This user wanna be friends with you'], 200);
            }
        }
        if(!empty($recordIdCheck))
        {
            return response()->json(['message' => 'Friends'], 200);
        }
        if(empty($recordIdCheck))
        {
            return response()->json(['message' => 'Add friend'], 200);
        }


        // return response()->json([
        //     'status'=>200,
        //     'friendships'=>$var
        // ]);

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

        //problemi: puoi fare decline su una amicizia + to:do is_blocked bidirezionale

        // Se non c'è un utente autenticato, restituisci un errore
        // if (!$auth) {
        //     return response()->json(['message' => 'Non autorizzato'], 401);
        // }

        $user = auth()->user();
        //$user_sender = $request->input("user_sender"); //to:do remove
        $userId = $user->id;
        $user_receiver = $request->input("user_receiver");
        $option = $request->input("option");

        if(!isset($option))
        {

            User::Find($user_receiver); // not found check
            if(empty($user_receiver))
            {
                return response()->json(['message' => 'User does not exist'], 500);
            }

            $senderCheck = Friendships::where('user_sender', $userId) //pending & already friend check
                                      ->where('user_receiver', $user_receiver)
                                      ->first();
            $receiverCheck = Friendships::where('user_sender', $user_receiver)
                                        ->where('user_receiver', $userId)
                                        ->first();

            if(!empty($senderCheck)) $recordIdCheck = $senderCheck->id;
                if(!empty($receiverCheck)) $recordIdCheck = $receiverCheck->id;
                    if(!empty($recordIdCheck)) $recordId = Friendships::find($recordIdCheck);
                        if(!empty($recordId)) $isPending = $recordId->is_pending;
                        if(!empty($recordId)) $isBlocked = $recordId->user_blocked_id;

            if(!empty($senderCheck)||!empty($receiverCheck))
            {
                if(!empty($isBlocked)) return response()->json(['message' => 'You can\'t communicate with this user, you or this user may blocked you'], 200);
                if($isPending==1) return response()->json(['message' => 'Friendship request is pending'], 200);
                else              return response()->json(['message' => 'You\'re already friend with this user'], 200);
            }

            $validatedData = $request->validate([
                //'user_sender' => 'required|max:255',
                'user_receiver' => 'required',
                //'is_pending' => 'required|boolean|max:255',
                //'user_blocked_id' => 'required|boolean|max:255',
            ]);

            $var = new Friendships();
            $var->fill($validatedData);
            $var->user_sender = $request->input('user_sender', $userId);
            $var->is_pending = $request->input('is_pending', 1);
            $var->user_blocked_id = $request->input('user_blocked_id', null);

            $var->save();

            return response()->json($var, 201);
        }
        else
        {
            $senderCheck = Friendships::where('user_sender', $userId) //pending & already friend check
                                    ->where('user_receiver', $user_receiver)
                                    ->first();
            $receiverCheck = Friendships::where('user_sender', $user_receiver)
                                        ->where('user_receiver', $userId)
                                        ->first();
            if(!empty($senderCheck)) $recordId = $senderCheck->id;
                if(!empty($receiverCheck)) $recordId = $receiverCheck->id;
                    $friendship = Friendships::findOrFail($recordId);


            if($option=="accept" && $friendship->user_blocked_id == null) //accept
            {
                //Log::info([$userId,$friendship->user_receiver]);
                if($userId == $friendship->user_receiver && $friendship->is_pending = 1)
                {
                    $friendship->is_pending = 0;
                    $friendship->save();
                    return response()->json(['message' => 'You are now friend with this user'], 200);

                }
                else
                {
                    return response()->json(['message' => 'Illegal operation'], 400);
                }
            }
            if($option=="decline" && $friendship->user_blocked_id == null) //decline
            {
                if($userId == $senderCheck->user_receiver && $friendship->is_pending == 1)
                {
                    $friendship->delete();
                    return response()->json(['message' => 'You declined the friend request'], 200);
                }
                if($userId == $senderCheck->user_sender && $friendship->is_pending == 1)
                {
                    $friendship->delete();
                    return response()->json(['message' => 'You canceled the friend request'], 400);
                }
                else return response()->json(['message' => 'Illegal operation'], 400);
            }
            if($option=="friend" && $friendship->user_blocked_id == null) //call store with 2 params
            {
                //store($request);
            }
            if($option=="unfriend" && $friendship->user_blocked_id == null) //unfriend
            {
                if($friendship->is_pending == 0)
                {
                    $friendship->delete();
                    return response()->json(['message' => 'You are not friend with this user anymore'], 200);
                }
                else
                {
                    return response()->json(['message' => 'Illegal operation'], 400);
                }
            }
            if($option=="block" && $friendship->user_blocked_id == null) //block
            {
                if(!empty($friendship))
                {

                    $friendship->is_pending = 0;
                    $friendship->user_blocked_id = $user_receiver;
                    $friendship->save();
                    return response()->json(['message' => 'You blocked this user'], 200);
                }
                else
                {
                    $friendship = new Friendships();
                    $friendship->user_sender = $userId;
                    $friendship->user_receiver = $user_receiver;
                    $friendship->is_pending = 0;
                    $friendship->user_blocked_id = $user_receiver;
                    $friendship->save();
                    return response()->json(['message' => 'You blocked this user'], 200);
                }
            }
            if($option=="unblock") //unblock
            {
                if($friendship->user_blocked_id != $userId)
                {
                    $friendship->delete();
                    return response()->json(['message' => 'You unblocked this user'], 200);
                }
            }
        }
    }
}
