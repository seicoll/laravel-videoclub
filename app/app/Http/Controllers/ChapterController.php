<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapter;
use Notification;

class ChapterController extends Controller
{
    //
    
    public function postCreate(Request $request)
    {
        $chapter = new Chapter;
        
        $chapter->title = $request->title;
        $chapter->season = $request->season;
        $chapter->episode = $request->episode;
        $chapter->movie_id = $request->movie_id;
        
        $chapter->save();
        
        Notification::success('Nou capítol afegit!');
        return redirect()->back();
        
        
        /* També es podria fer així
        $chapter = new Chapter;
        ...
        $movie = App\Movie::find($request->movie_id);
        $movie->chapters()->save($chapter);
        */
        
    }
}
