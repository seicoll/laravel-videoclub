<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Chapter;
use App\Favourite;
use Notification;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    //
    public function getIndex()
    {
        //Obtenim totes les pel·lícules
        $movies = Movie::all();
        
        return view('catalog.index',  array('arrayPeliculas'=>$movies));
    }

    public function getShow($id)
    {
        //Obtenim la pel·lícula que té el id=$id
        $movie = Movie::findOrFail($id);
        
        /*$chapters = Chapter::where('movie_id', $id)->get();*/
        $chapters = $movie->chapters;
        
        $dades['id']=$id;
        $dades['pelicula']=$movie;
        $dades['chapters']=$chapters;
        $dades['favourite']=false;
        
        return view('catalog.show', $dades);
    }
    
    public function getCreate()
    {
        return view('catalog.create');
    }
    
    public function postCreate(Request $request)
    {
        $movie = new Movie;
        
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        
        $movie->save();
        
        Notification::success('Pel·lícula creada correctament!');
        return redirect()->back();
        
        /*return redirect()->back()->with('status', 'Pel·lícula creada correctament!');*/
    }
    
    public function getEdit($id)
    {
        //Obtenim la pel·lícula que té el id=$id
        $movie = Movie::findOrFail($id);
        
        return view('catalog.edit',array('pelicula'=>$movie));
    }
    
    public function postFavourite($movie_id)
    {
        //Afegir la películ·la a llista de favorites o la treu si ja hi és
        
        //Obtenim la pel·lícula que té el id=$id
        
        $favourite = Favourite::where('user_id', Auth::id() )->where('movie_id', $movie_id)->first();
        
        
        if ($favourite != null)
        {
            //Si ja està a la llista de favorits
            $favourite->delete();
            
            Notification::success('Pel·lícula eliminada de la llista de favorits.');
            return redirect()->back();
        }
        else
        {
            //Si ja no està a la llista de favorits
            $f = new Favourite();
            
            $f->user_id = Auth::id() ;
            $f->movie_id = $movie_id;
            $f->save();
            
            Notification::success('Pel·lícula afegida a la llista de favorits.');
            return redirect()->back();
        }
        
    }
    
    public function putEdit(Request $request, $id)
    {
        //Obtenim la pel·lícula que té el id=$id
        $movie = Movie::findOrFail($id);
        
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->category_id = $request->category_id;
        
        $movie->save();
        
        Notification::success('Pel·lícula modificada');
        return redirect('catalog/show/'.$id);
        
        /*return redirect('catalog/show/'.$id)->with('status', 'Pel·lícula modificada.');*/
    }
    
    public function putRent($id)
    {
        //Obtenim la pel·lícula que té el id=$id
        $movie = Movie::findOrFail($id);
        
        $movie->rented = true;
        $movie->save();
        
        Notification::success('Pel·lícula llogada!');
        return redirect()->back();
        
        /*return redirect()->back()->with('status', 'Pel·lícula llogada!');*/
        
    }
    
    public function putReturn($id)
    {
        //Obtenim la pel·lícula que té el id=$id
        $movie = Movie::findOrFail($id);
        
        $movie->rented = false;
        $movie->save();
        
        Notification::success('Pel·lícula retornada');
        return redirect()->back();
        
        /*return redirect()->back()->with('status', 'Pel·lícula retornada.');*/
    }
    
    public function deleteMovie($id)
    {
        //Obtenim la pel·lícula que té el id=$id
        $movie = Movie::findOrFail($id);
        
        $movie->delete();
        Notification::success('Pel·lícula eliminada');
        
        return redirect('catalog');
        
        /*return redirect('catalog')->with('status', 'Pel·lícula eliminada.');*/
    }
    
    
    
}
