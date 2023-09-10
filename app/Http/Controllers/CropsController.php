<?php

namespace App\Http\Controllers;

use App\Models\crops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CropsController extends Controller
{
    public function addcrop()
    {
        return view('add_crop');
    }
    public function newCrop(Request $request)
    {
        //dd($request->all());
        $crop_name = $request->crop_name;
        $suggested_price = $request->suggested_price;
        $user = Auth::user();
        
        $new_auction = crops::create([
            'crop_name' => $crop_name,
            'suggested_price' => $suggested_price,
            'user_id' => $user['id'],
        ]);
        return back()->with('status', 'New Auction has been added');
    }
}
