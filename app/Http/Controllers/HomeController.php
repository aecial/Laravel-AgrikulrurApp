<?php

namespace App\Http\Controllers;

use App\Models\crops;
use Illuminate\Http\Request;
use App\Models\bids;
use App\Models\auctions;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bids = bids::orderBy('bid_amount', 'desc')->get();

        return view('bidding', compact('bids'));
    }
    public function profile()
    {
        return view('profile');
    }
    public function cropOption()
    {
        $crops = crops::all();
        
        return view('cropOptionPage', compact('crops'));
    }
}
