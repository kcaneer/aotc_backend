<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        return Podcast::all();
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

    public function update(Request $request)
    {
        //edit podcasts already in the database
        $podcast = Podcast::find($request['id']);
        return $podcast;
        $podcast->title = $request['title'];
        $podcast->info = $request['info'];
        $podcast->length = $request['length'];
        $podcast->released = $request['released'];
        $podcast->createdor = $request['creator'];
        $podcast->updated_at = Carbon::now();
        $podcast->save();
    }

    public function deletepodcast(Request $request)
    {
        //delete podcasts from the database
        podcast::find($request['id'])->delete();
    }
}
