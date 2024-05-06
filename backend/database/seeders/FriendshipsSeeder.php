<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FriendshipsSeeder extends Seeder
{
   public function run(): void
    {
        // checks

        // 1 caso: utente che ha mandato la richiesta a se stesso
        // 2.a caso: 2 utenti con record uguale
        // 2.b caso: 2 utenti che hanno più record (1,2,1,0) (1,2,0,1)
        // 3 caso: 2 utenti che hanno 2 record con is_sender | is_receiver scambiati

        $no_friendships = 1;

        for($i = 1; $i <= 100; $i++)
        {
            $user_sender =  mt_rand(1, 32); //32
            $user_receiver = mt_rand(1, 32); //32
            $flag = 0; //creazione e reset di flag a 0

            if($i != 1) //il primo ciclo non avrà mai conflitti ed è inutile controllare, in + permetterà di creare il primo record dove si attuerà il compare
            {
                if($user_sender != $user_receiver) // 1 caso
                {


                    for($j = 1; $j <= $i; $j++) // 2.a | 2.b caso : controlla tutti i precedenti record
                    {
                        if($flag == 0) //flag deciderà se la friendship accetta la condizione caso 2.a
                        {
                            dump("inizio ciclo check (2.a) n: ".$j." del ciclo n: ".$i);
                            $friendship = DB::table('friendships')
                            ->where('id', $j)
                            ->select('user_sender', 'user_receiver')
                            ->first();
                            if ($friendship) {
                                $check_sender = $friendship->user_sender;
                                $check_receiver = $friendship->user_receiver;
                            }
                            if($user_sender == $check_sender && $user_receiver == $check_receiver)
                            {
                                $flag = 1;
                                dump("beccato un record già esistente nel check (2.a) n: ".$j."!!!\nnon dovrebbero esserci altri cicli dopo j= ".$j." del ciclo n: ".$i);
                            }
                            else
                            {
                                $flag = 0;
                            }
                        }
                    }

                    if($flag == 0)
                    {
                        dump("sto creando friendship...");
                        $rng_pending = rand(1, 8);
                        $rng_blocked = rand(1, 16);
                        DB::table('friendships')->insert([
                            'user_sender' => $user_sender,
                            'user_receiver' => $user_receiver,
                            'is_pending' => $rng_pending == 1 ? 1 : 0,
                            'is_blocked' => $rng_blocked == 1 ? 1 : 0,
                        ]);
                        dump("ho creato friendship. raw values: "
                        ."id: ".$i." user_sender: ".$user_sender." user_receiver: ".$user_receiver." rng_pending: ".$rng_pending." rng_blocked: ".$rng_blocked);
                        $no_friendships++;
                    }
                }
                else
                {
                    dump("beccato un record con is_sender e is_receiver uguali");
                }
            }
            else
            {
                dump("sto creando la prima friendship...");
                $rng_pending = rand(1, 8);
                $rng_blocked = rand(1, 16);
                DB::table('friendships')->insert([
                    'user_sender' => $user_sender,
                    'user_receiver' => $user_receiver,
                    'is_pending' => $rng_pending == 1 ? 1 : 0,
                    'is_blocked' => $rng_blocked == 1 ? 1 : 0,
                ]);
                dump("ho creato la prima friendship. raw values: "
                ."id: ".$i." user_sender: ".$user_sender." user_receiver: ".$user_receiver." rng_pending: ".$rng_pending." rng_blocked: ".$rng_blocked);
            }
        }
        dump($no_friendships);
        for($i = 1; $i <= $no_friendships; $i++)
        {
            for($j = 1; $j < $no_friendships; $j++)
            {

                $a = DB::table('friendships')
                        ->where('user_sender', $i)
                        ->where('user_receiver', $j)
                        ->first();

                        if ($a) {
                            $a_sender = $a->user_sender;
                            $a_receiver = $a->user_receiver;
                        }
                        else continue;

                $b = DB::table('friendships')
                        ->where('user_sender', $j)
                        ->where('user_receiver', $i)
                        ->first();

                        if ($b) {
                            $b_sender = $b->user_sender;
                            $b_receiver = $b->user_receiver;
                        }
                        else continue;

                if($a_sender == $b_receiver && $a_receiver == $b_sender)
                {
                    DB::table('friendships')
                        ->where('user_sender', $j)
                        ->where('user_receiver', $i)
                        ->delete();

                }
            }
        }
    }
}
