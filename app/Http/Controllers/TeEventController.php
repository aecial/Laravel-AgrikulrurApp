<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TestingEvent;
use App\Events\NewMessageEvent;

class TeEventController extends Controller
{
    function testingEvents()
    {
        //event(new TestingEvent);

        $message = 'Hello World!';
        event(new NewMessageEvent($message));
    }
}
