<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuctionsControll extends Controller
{
    public function create_auction()
    {
        return view('createauction');
    }
    public function newAuction(Request $request)
    {
        //dd($request->all());
        $crop_id = $request->crop_id;
        $starting_price = $request->input_price;
        $crop_volume = $request->input_volume;
        $user = Auth::user();
        
        $new_auction = auctions::create([
            'crop_id' => $crop_id,
            'starting_price' => $starting_price,
            'crop_volume' => $crop_volume,
            'user_id' => $user['id'],
        ]);
        return back()->with('status', 'New Auction has been added');
    }
}
