<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Games;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Games::where('name', 'like', "%$query%")
                       /*->where('is_discounted', 0)
                       ->where('special_offer', 0)*/
                       ->get();

        //return view('search.results', ['results' => $results]);
        return response()->json(['results' => $results]);
    }
}
