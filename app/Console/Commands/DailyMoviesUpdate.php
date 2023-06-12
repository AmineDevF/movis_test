<?php

namespace App\Console\Commands;

use App\Models\Movies;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DailyMoviesUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:update_movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'udate information every day';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $popularMovies = Http::withToken(config('services.movdb.token'))
        ->get('https://api.themoviedb.org/3/trending/movie/day?')
        ->json()['results'];

        // dd($popularMovies);

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
    }
}
