<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Movie;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMovieRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublicController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index', 'home']),
        ];
    }

    public function homepage()
    {
        return view('welcome');
    }

    public function create()
    {
        $platforms = Platform::all();
        return view('create', compact('platforms'));
    }

    public function store(StoreMovieRequest $request)
    {
        $movie = Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'genre' => $request->genre,
            'release_date' => $request->release_date,
            'language' => $request->language,
            'country' => $request->country,
            'description' => $request->description,
            'cover' => $request->has('cover') ? $request->file('cover')->store('movie-cover', 'public') : 'default/disney.jpg',
            'user_id' => Auth::user()->id,
        ]);
        $movie->platforms()->attach($request->platforms);
        // dal mio oggetto movie entro in platforms tramite la funzione inserita nel modello e faccio attach degli id delle piattaforme che arrivano dalla request che hanno il name di platforms
        return redirect(route('home'))->with('message', 'Film inserito con successo!');
    }

    public function index()
    {
        $movies = Movie::all();
        // dd($movies);
        return view('movies.index', ['movies' => $movies]);
    }

    public function show(Movie $movie)
    {
        return view('movies.show', ['movie' => $movie]);
    }

    public function edit(Movie $movie)
    {
        if (Auth::user() && Auth::user()->id == $movie->user_id) {
            $platforms = Platform::all();
            // Cambia 'movie.edit' in 'movies.edit'
            return view('movies.edit', ['movie' => $movie, 'platforms' => $platforms]);
        }
        return redirect(route('homepage'))->with('denied', 'Accesso negato');
    }

    public function update(StoreMovieRequest $request, Movie $movie)
    {
        if (Auth::user()->id && Auth::user()->id == $movie->user_id) {
            $data = $request->all();
            if ($request->hasFile('cover')) {
                $data['cover'] = $request->file('cover')->store('movie-cover', 'public');
            } else {
                $data['cover'] = $movie->cover;
            }

            $movie->update($data);

            // Aggiorna le piattaforme associate in modo semplice
            $movie->platforms()->sync($request->input('platforms', []));
            return redirect()->route('movies.show', $movie->id)->with('success', 'Film aggiornato con successo!');
        }

        return redirect()->route('index')->with('error', 'Non hai i permessi per modificare questo film.');
    }

    public function delete(Movie $movie)
    {
        if (Auth::user() && Auth::user()->id == $movie->user_id) {
            $movie->platforms()->detach();
            $movie->delete();
            return redirect(route('movie.index'))->with('message', 'Film eliminato con successo');
        }
        return redirect(route('homepage'))->with('denied', 'Accesso negato');
    }

    public function dashboard()
    {
        $movies = Movie::where('user_id', Auth::user()->id)->get();
        return view('auth.dashboard', compact('movies'));
    }
}
