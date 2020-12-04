<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use App\Models\Listen;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class PodcastController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        //show json of all of my podcasts
        // create query to get all the podcasts and then do 
        return Podcast::with('listens')->get();
    }

    public function create()
    {
        //shows a view (form) to create a new podcast
        //is this postman ? tinker ? react ? 
        Podcast::factory()->create();
    }

    public function read(Request $request)
    {
        //see the single podcast that you just created
        $podcast = Podcast::find($request['id']);
        return $podcast;
    }

    public function listened(Request $request)
    {
        //true means listened, false means  want to listen
        $listen = Listen::updateOrCreate([
            'user_id' => request('user_id'),
            'podcast_id' => request('podcast_id')
        ], [
            'listened' => true
        ]);
        return Podcast::with('listens')->get();
    }
    public function want(Request $request)
    {
        //true means listened, false means  want to listen
        $listen = Listen::updateOrCreate([
            'user_id' => request('user_id'),
            'podcast_id' => request('podcast_id')
        ], [
            'listened' => false
        ]);
        return Podcast::with('listens')->get();
    }


    public function deletepodcast(Request $request)
    {
        //delete podcasts from the database
        podcast::find($request['id'])->delete();
    }

    public function listenedPodcasts(Request $request)
    {
        $user = $request->user();
        $l = $user->listenedPodcasts()->get();
        return $l->toArray();
    }
    
    public function wantedPodcasts(Request $request)
    {
        $user = $request->user();
        $l = $user->wantedPodcasts()->get();
        return $l->toArray();
    }
}
