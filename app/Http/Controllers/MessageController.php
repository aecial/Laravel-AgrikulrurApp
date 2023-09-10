<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use Illuminate\Http\Request;
use App\Events\NewMessageEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\bids;

class MessageController extends Controller
{
        
public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $channel = $request->input('channel');
        $bidder = $request->input('bidder');
        $user = Auth::user();

        // Process the message, perform any validations, database operations, etc.

        // Broadcast the event
        //NewMessageEvent::dispatch($messages);
            $bids = bids::create(
            [
            'bid_amount' => $message,
            'user_id' => $user['id'],
            'auction_id' => $channel,
            'crop_type' => "Okra",
            ],
        );
        //return ['status' => 'Message Sent!'];
        if($bids)
        {
            event(new NewMessageEvent($message, $channel, $bidder));
            return response()->json([$message => true]);
        }
        else
        {
            return response()->json(['Message Not Sent' => true]);
        }
    }
public function sendBid(Request $request)
    {
        $on_auction = $request->input('auction_id');
        //$bids = bid::get('bids');
        //$bids = DB::table('bid')->select('bids')->orderBy('bids', 'desc')->first();

        $bids = bids::where('auction_id', $on_auction)->orderBy('bid_amount', 'desc')->get();
        $auctions = auctions::where('auction_id', $on_auction)->get();//->value('auction_id');
        $highestbid = bids::where('auction_id', $on_auction)->get('bid_amount')->max();
        //$highestbid = DB::table('bids')->max('bid_amount');

        return view('bidding', compact('bids','auctions', 'highestbid'));
    }
}

/*
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessageEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\bids;

class MessageController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
        
public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = $user->bids()->create(
            [
            'bid_amount' => $request->input('message'),
            'auction_id' => 123213123,
            'crope_name' => "Okra",
            ]
        );
        return ['status' => 'Message Sent!'];
        $message = $request->input('message');

        // Process the message, perform any validations, database operations, etc.

        // Broadcast the event
        //NewMessageEvent::dispatch($messages);
        $user = auth()->user();
        $bids = bids::create(
            [
            'bid_amount' => $request->input('message'),
            'user_id' => $user['id'],
            'auction_id' => 123213123,
            'crope_name' => "Okra",
            ],
        );
        $message = $request->input('message');
        if($bids)
        {
            event(new NewMessageEvent($message));
            return response()->json([$message => true]);
        }
        else
        {
            return response()->json(['Message Not Sent' => true]);
        }
        
    }
public function sendBid()
    {
        //$bids = bid::get('bids');
        //$bids = DB::table('bid')->select('bids')->orderBy('bids', 'desc')->first();

        $bids = bids::orderBy('bid_amount', 'desc')->get();

        return view('bidding', compact('bids'));
    }
}

*/