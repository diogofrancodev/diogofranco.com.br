<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DevPing;

class DevPingController extends Controller
{
    public function index()
    {
        $devPings = DevPing::paginate(25);
        
        return view('site.devpings', compact('devPings'));
    }
}
