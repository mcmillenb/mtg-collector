<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardCollection;

class CollectionController extends Controller
{
    public function index()
    {
        $cards = CardCollection::orderBy('name')->get();
        return response()->json($cards);
    }

    public function store(Request $request)
    {
        $request->validate([
            'card_id' => 'required|string',
            'name' => 'required|string',
            'image_url' => 'nullable|string',
            'type_line' => 'nullable|string',
            'set_name' => 'nullable|string',
            'mana_cost' => 'nullable|string',
        ]);

        $existingCard = CardCollection::where('card_id', $request->card_id)->first();

        if ($existingCard) {
            $existingCard->increment('quantity');
            return response()->json($existingCard);
        }

        $card = CardCollection::create($request->all());
        return response()->json($card, 201);
    }

    public function destroy($id)
    {
        $card = CardCollection::findOrFail($id);
        
        if ($card->quantity > 1) {
            $card->decrement('quantity');
            return response()->json($card);
        } else {
            $card->delete();
            return response()->json(['message' => 'Card removed from collection']);
        }
    }
}
