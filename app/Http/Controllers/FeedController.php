<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function addFeed ()
    {
        return view('addFeed');
    }

    public function feed(Request $request)
    {
        if ($request->input('feed') != '') {
            $url = $request->input('feed');
        }

        $feedUrl = Feed::where('url', $url)->firstOrCreate();
        $feedUrl->user_id = auth()->user()->id;
        $feedUrl->url = $url;
        $feedUrl->save();

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
