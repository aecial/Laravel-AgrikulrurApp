<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auctions;
use App\Models\crops;
use App\Models\notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuctionsControll extends Controller
{
    public function create_auction()
    {
        $crops = crops::all();

        return view('createauction', compact('crops'));
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
            'status' => 'active',
        ]);
        return back()->with('status', 'New Auction has been added');
    }


    public function auctions(Request $request)
    {
        $type = $request->input('type');
        $auctions = auctions::where('crop_id', $type)->get();
        return view('auctionpage', compact('auctions'));
    }
    public function guidelines()
    {
        $cropinfo = crops::all();
        return view('guidelines', compact('cropinfo'));
    }
    public function notifications(Request $request)
    {
        $toUser = $request->input('id');
        $notif = notifications::where('bidder_id', $toUser)->get();
        return view('notifications', compact('notif'));
    }
    public function congratulation()
    {
        return view('congratulation');
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function finish()
    {
        return view('finish');
    }
   /* public function registerUser(Request $request)
    {
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|unique:userdbs',
            'pass'=>'required|min:8|max:12',
            'conpass'=>'required',
            'phonenum'=>'required|min:11|max:11',
            'address'=>'required'
        ]);
        $user = new Userdbs();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->pass = $request->pass;
        $user->phonenum = $request->phonenum;
        $user->address = $request->address;
        $res = $user->save();
        if($res){
            return back()->with('success', 'You have registered successfully');
        }else{
            return back()->with('failed', 'Failed to register T-T. Something went wrong');
        }
    }*/
}
