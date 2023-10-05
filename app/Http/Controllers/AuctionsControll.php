<?php

namespace App\Http\Controllers;

use App\Models\bids;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\auctions;
use App\Models\crops;
use App\Models\pending_transactions;
use App\Models\notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

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
            'end_time' => Carbon::now()->addMinutes(2),
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
        $users = User::where('id', $toUser)->get();
        
        foreach($users as $user)
        {

            $user_type = $user->user_type;
            $toThisUser = $user->id;

            if($user_type == 2)
            {
                $notif = notifications::where('bidder_id', $toThisUser)->get();
            
                    return view('notifications', compact('notif'));

            }
            elseif($user_type == 3)
            {
                $notif = notifications::where('creator_id', $toThisUser)->get();
               return view('notifications', compact('notif'))->with('noti', 'autions fetched!');
      
            }

        }


       
       
    }
    public function congratulation(Request $request)
    {
        //$user = $request->input('id');
        $auction_id = $request->input('auction_id');
        return view('congratulation', compact('auction_id'));
    }
    public function checkout(Request $request)
    {
        $auction_id = $request->input('auction_id');
        $auctions = auctions::where('auction_id', $auction_id)->get();
        foreach($auctions as $auction)
        {
            $creator = $auction->user_id;
            $cropname = $auction->crop_id;
            $users = User::where('id', $creator)->get();
            $crops = crops::where('crop_id', $cropname)->get();
            $highestbid = bids::where('auction_id', $auction->auction_id)->get('bid_amount')->max();
            $volume =  $auction->crop_volume;
            $highest = $highestbid->bid_amount;
            $total = $highest * $volume;

            return view('checkout', compact('auctions', 'users', 'crops', 'total'));
        }
        
    }
    public function confirm_payment(Request $request)
    {
        $auction_id = $request->input('auction_id');
        $auctions = auctions::where('auction_id', $auction_id)->get();
        foreach($auctions as $auction)
        {
            $creator = $auction->user_id;
            $cropname = $auction->crop_id;
            $users = User::where('id', $creator)->get();
            $crops = crops::where('crop_id', $cropname)->get();
            $highestbid = bids::where('auction_id', $auction->auction_id)->get('bid_amount')->max();
            $volume =  $auction->crop_volume;
            $highest = $highestbid->bid_amount;
            $total = $highest * $volume;

            return view('ConfirmPayment', compact('auctions', 'users', 'crops', 'total'));
        }
        
    }
    public function finish(Request $request)
    {
        $auction_id = $request->input('auction_id');
        $auctions = auctions::where('auction_id', $auction_id)->get();
        foreach($auctions as $auction)
        {
            $creator = $auction->user_id;
            $auction = $auction->auction_id;
            //$winner_bid = bids::where('auction_id', $auction_id)->where(max('bid_amount'))->get('user_id');
            //$bidder = $winner_bid->user_id;
            $bidder = Auth::user()->id;
            $users = User::where('id', $creator)->get();

            $pend_payment = pending_transactions::create([
                'auction_id' => $auction_id,
                'creator_id' => $creator,
                'bidder_id' => $bidder,
                'creator_status' => 'not_paid',
                'bidder_status' => 'paid',
                'status' => 'pending',
            ]);

            return view('finish', compact('users'));
        }
        
    }
    public function checkout_farmer(Request $request)
    {
        $creator = Auth::user()->id;
        $auction = 14;
        $auction = $request->input('auction_id');
        pending_transactions::where('creator_id', $creator)->where('auction_id', $auction)
        ->update(['creator_status' => 'paid', 'status' => 'completed']);

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
