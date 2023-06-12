<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index()
    {
        // $popularMovies = Http::withToken(config('services.movdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/popular')
        //     ->json()['results'];
       
          $popularMovies = Http::withToken(config('services.movdb.token'))
            ->get('https://api.themoviedb.org/3/trending/movie/day?')
            ->json()['results'];

            foreach($popularMovies as $movie) {

                Movies::updateOrCreate([
    
                    "e_id"=> $movie['id'],
                    "title"=> $movie['title'],
                    "original_language"=> $movie['original_language'],
                    "original_title"=> $movie['original_title'],
                    "overview"=> $movie['overview'],
                    "backdrop_path"=> $movie['backdrop_path'],
                    "poster_path"=> $movie['poster_path'],
                    "media_type"=> $movie['media_type'],
                    "popularity"=> $movie['popularity'],
                    "release_date"=> $movie['release_date'],
                    "vote_average"=> $movie['vote_average'],
                    "vote_count"=> $movie['vote_count'],
                    "adult"=> $movie['adult'],
    
                ]);
            }
           
            // dd($popularMovies);
            $nowPlayingMovies = Http::withToken(config('services.movdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

           $genres = Http::withToken(config('services.movdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $genres,
        );
            return view('movis.index',$viewModel);
    }
    public function show($id)
    {
         $movie = Http::withToken(config('services.movdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();

$viewModel = new MovieViewModel($movie);

return view('movis.show', $viewModel);
}
public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'overview' => 'required',
            'release_date' => 'required|date',
            // 'remake' => 'required',
            ]);

        $movie = new Movies();
        $movie->title = $request->title;
        $movie->overview = $request->overview;
        $movie->backdrop_path = $request->backdrop_path;
       
        $movie->save();

        return redirect()->route('dashboard')->with('success','Success insert movie');

    }
    public function allMovis()
    {
       $movies = Movies::all();
       return view('dashboard',$movies);

    }


}
