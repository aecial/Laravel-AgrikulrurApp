<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Events\NewMessageEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\bids;
use App\Services\ValidationService; // Import the ValidationService


class MessageController extends Controller
{

public function sendMessage(Request $request)
    {
        $requestData = $request->all();

        $website_info = bids::where([
            ['bid_amount', '=' ,$request->input('message')],
            ['auction_id', '=', $request->input('channel')]
        ])->first();

        if ($website_info != null) {
            return response()->json(['failed']);
        } else {
            
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
                return response()->json(['Bid Not Sent' => true]);
            }
    

            
        }



        /*
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
        }*/
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

        if(!empty($highestbid->bid_amount))
        {
            if($auctions->status = 'closed')
            {
                //return Redirect()->to('bidding')->with('closed', 'This auction is completed!');
                return view('bidding', compact('bids','auctions', 'highestbid'))->with('success', 'highest bid fetched');
            }
            return view('bidding', compact('bids','auctions', 'highestbid'))->with('success', 'highest bid fetched');
            
        }
        else
        {
            return view('bidding', compact('bids','auctions', 'highestbid'))->with('failed', 'No bids Yet!');
        }

        
    }
    
    //Testing Logic
    protected $validationService;

    public function __construct(ValidationService $validationService)
    {
        $this->validationService = $validationService;
    }

    public function showForm()
    {
        return view('message-form');
    }

    public function process(Request $request)
    {
        $validatedData = $this->validationService->validateMessage($request->all());

        // If validation passes, you can continue processing the message
        $message = $validatedData['message'];

        // Process the message (e.g., save it to the database or perform other tasks)
        // You can also return a response or redirect the user to another page

        //return "Message processed: " . $message;
        return response()->json([$message => true]);
    }

    //end testing logic
        
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

/*
        try{

                //dd($request->all());
                $res = $request->validate([
                    'message'=>'required|string|max:255',
                    'channel'=>'required',
                    'bidder'=>'required'
                ]);

                if($res){
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
                        
                if($bids)
                {
                    event(new NewMessageEvent($request->message, $request->channel, $request->bidder));
                    return   response()->json([$request->message => true]);
                                //response()->json([$request->message => true])            
                }
                else
                {
                    return back()->with('failed', 'Failed to register T-T. Something went wrong');
                }

                }
                
                

        }
        catch(QueryException $e) {
            // Log the error for debugging purposes
            \Log::error($e->getMessage());
    
            return response()->json(['success' => false, 'message' => 'Error saving data']);
        }

*/