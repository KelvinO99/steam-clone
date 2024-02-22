<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        try{
            $query = $request->input('query');

            $results = Games::where('name', 'like', "%$query%")
                        /*->where('is_discounted', 0)
                        ->where('special_offer', 0)*/
                        ->get();

            //return view('search.results', ['results' => $results]);
            return response()->json(['results' => $results]);
        }catch(\Exception $e){
            return $e;
        }

    }
}
