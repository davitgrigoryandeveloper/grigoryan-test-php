<?php

namespace App\Http\Controllers;

use App\Events\SendMail;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class EventController extends Controller
{
    /**
     * Write code on Method
     *
     * @return void()
     */
    public function index()
    {
        Event::dispatch(new SendMail(1));
        dd('hi');
    }
}
