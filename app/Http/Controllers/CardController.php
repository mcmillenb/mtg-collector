<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CardController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        
        if (empty($query)) {
            return response()->json(['error' => 'Query parameter is required'], 400);
        }

        try {
            $response = Http::get('https://api.scryfall.com/cards/search', [
                'q' => $query,
                'order' => 'name'
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json(['error' => 'Failed to search cards'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'API request failed'], 500);
        }
    }
}
