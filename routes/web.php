<?php

use App\Events\ChatMessageEvent;
use App\Events\PlaygroundEvent;
use App\Http\Controllers\bidsControl;
use App\Http\Controllers\CropsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuctionsControll;
use App\Http\Controllers\testMessageControl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeEventController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/', function () {
//    return view('bidding');
//});
//Route::get('/send-bid' ,[MessageController::class , 'sendBid']);--------------
//Route::get('/bidding', [bidsControl::class, 'bids_res']);

/*Route::get('/first', function () {
    return view('first');
});
Route::get('/second', function () {
    return view('second');
});
*/
//Route::get('/send-message' ,[TeEventController::class , 'testingEvents']);
//Route::get('/send-message', 'App\Http\Controllers\MessageController@sendMessage');

//Route::get('/send-message' ,[MessageController::class , 'sendMessage']);--------------
//Route::post('/send-message', [MessageController::class , 'sendMessage']);

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/crop-options', [App\Http\Controllers\HomeController::class, 'cropOption'])->name('home');

Route::get('/create_auction' ,[AuctionsControll::class , 'create_auction']);
Route::post('/newAuction' ,[AuctionsControll::class , 'newAuction'])->name('newAuction');

Route::get('/send-message' ,[MessageController::class , 'sendMessage']);
Route::get('/send-bid' ,[MessageController::class , 'sendBid']);

Route::get('/addcrop' ,[CropsController::class , 'addcrop']);
Route::post('/newCrop' ,[CropsController::class , 'newCrop'])->name('newCrop');


/*Route::get('/playground', function () {
    event(new App\Events\ChatMessageEvent());

    return null;
});
*/

Route::get('/ws', function () {
    return view('websocket');
});

Route::post('/chat-message', function (\Illuminate\Http\Request $request) {
    event(new PlaygroundEvent($request->message, auth()->user()));
    return response()->json([$request->message => true]);
});

//Route::post('/chat-message', [testMessageControl::class, 'testMessage']);
//Route::get('/chat-message', [testMessageControl::class, 'testMessage']);

//hello
//hello2
