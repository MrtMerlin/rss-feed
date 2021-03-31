<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

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
        $urls = Feed::where('user_id', auth()->user()->id)
            ->pluck('url');

        foreach($urls as $url) {
            if (@simplexml_load_file($url)) {
                $feedToReturn = simplexml_load_file($url);
            } else {
                $feedToReturn = '<p>No Url Entered</p>';
            }
        }

        return view('home')->with(compact('feedToReturn'));
    }
}
